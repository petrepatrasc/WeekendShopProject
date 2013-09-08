<?php
/**
 * Created by JetBrains PhpStorm.
 * User: petre
 * Date: 9/7/13
 * Time: 5:28 PM
 * To change this template use File | Settings | File Templates.
 */

namespace Shop\ContentBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use \Exception;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Session\Session;

class AccountController extends Controller {

    public function indexAction() {
        $session = new Session();
        $loggedIn = $session->get('loggedIn');

        if ($loggedIn) {
            return $this->render('ShopContentBundle:Account:index_user.html.twig');
        }

        return $this->render('ShopContentBundle:Account:index.html.twig');
    }

    public function logoutAction() {
        $this->get('session')->invalidate();
        $this->get('session')->getFlashBag()->add('success', 'You have been successfully logged out!');

        return $this->redirect($this->generateUrl('shop_content_homepage'));
    }

    public function loginAction() {
        $request = $this->getRequest();
        $formErrors = null;

        if ($request->getMethod() == 'POST') {
            $params = array(
                'username' => $request->get('username'),
                'password' => sha1($request->get('password'))
            );

            $response = $this->get('api.call')->makeCall('api_account_login', $params);

            try {
                $response = $this->get('json.response')->decode($response);

                $this->handleSessionForLogin($response);

                return $this->redirect($this->generateUrl('shop_account_index'));
            } catch (Exception $e) {
                $formErrors = $e->getMessage();
            }
        }

        return $this->render('ShopContentBundle:Account:login_form.html.twig', array('form_errors' => $formErrors));
    }

    /**
     * Handle valid session login in a separate method.
     * @param array $response The response received for the API call.
     */
    protected function handleSessionForLogin($response) {
        $session = $this->get('session');
        $session->start();

        $session->set('username', $response['username']);
        $session->set('api_key', $response['apiKey']);
        $session->set('fullName', $response['fullName']);
        $session->set('email', $response['email']);
        $session->set('createdAt', $response['createdAt']);
        $session->set('updatedAt', $response['updatedAt']);
        $session->set('loggedIn', true);

        $session->getFlashBag()->add('success', 'You have successfully logged in!');
    }

    public function registerAction() {
        $request = $this->getRequest();
        $formErrors = null;

        if ($request->getMethod() == 'POST') {
            $params = array(
                'username' => $request->get('username'),
                'password' => sha1($request->get('password')),
                'fullName' => $request->get('fullName'),
                'email'    => $request->get('email')
            );

            $response = $this->get('api.call')->makeCall('api_account_register', $params);

            try {
                $response = $this->get('json.response')->decode($response);

                return $this->render('ShopContentBundle:Account:register_success.html.twig', $params);
            } catch (Exception $e) {
                var_dump($e);
            }
        }

        return $this->render('ShopContentBundle:Account:register.html.twig', array('form_errors' => $formErrors));
    }
}