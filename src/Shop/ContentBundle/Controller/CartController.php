<?php
/**
 * Created by JetBrains PhpStorm.
 * User: petre
 * Date: 9/8/13
 * Time: 8:09 PM
 * To change this template use File | Settings | File Templates.
 */

namespace Shop\ContentBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CartController extends Controller {

    public function addAction($name, $id) {
        $session = $this->get('session');

        if ($session->get('loggedIn') !== true) {
            return $this->redirect($this->generateUrl('shop_account_index'));
        }

        $params['productId'] = $id;
        $params['accountId'] = $session->get('accountId');

        $valid = $this->get('api.call')->addToCart($params);

        if ($valid) {
            $session->getFlashBag()->add('cart', 'You have added the product to your cart.');
        }

        return $this->redirect($this->generateUrl('shop_cart_index'));
    }

    public function displayAction() {
        $session = $this->get('session');

        if ($session->get('loggedIn') !== true) {
            return $this->redirect($this->generateUrl('shop_account_index'));
        }

        $params['accountId'] = $session->get('accountId');
        $items = $this->get('api.call')->getCartItems($params);
        $categories = $this->get('api.call')->getCategories();
        $totalPrice = $this->get('api.call')->getTotalCartPrice($items);

        return $this->render('ShopContentBundle:Cart:display.html.twig', array(
            'categories' => $categories,
            'items' => $items,
            'totalPrice' => $totalPrice
        ));
    }

    public function checkoutAction() {
        $session = $this->get('session');

        if ($session->get('loggedIn') !== true) {
            return $this->redirect($this->generateUrl('shop_account_index'));
        }

        $params['accountId'] = $session->get('accountId');
        $this->get('api.call')->finishOrder($params);

        $session->getFlashBag()->add('success', 'You have successfully checked out your order!');

        return $this->redirect($this->generateUrl('shop_account_index'));
    }
}