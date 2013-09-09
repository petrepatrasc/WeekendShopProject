<?php
/**
 * Created by JetBrains PhpStorm.
 * User: petre
 * Date: 9/8/13
 * Time: 7:46 PM
 * To change this template use File | Settings | File Templates.
 */

namespace Api\RemoteBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CartItemController extends Controller {

    public function addToCartAction() {
        $params = $this->get('json')->decode($this->getRequest());
        $accountId = $params['accountId'];
        $productId = $params['productId'];

        $return['valid'] = $this->get('cart.item')->addToCart($accountId, $productId);

        return $this->get('json')->generateSuccessfulResponse($return);
    }

    public function getCartItemsAction() {
        $params = $this->get('json')->decode($this->getRequest());
        $accountId = $params['accountId'];

        $return['items'] = $this->get('cart.item')->getCartItems($accountId);

        return $this->get('json')->generateSuccessfulResponse($return);
    }
}