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

class AccountController extends Controller {

    public function loginAction() {
        $request = $this->getRequest();
        $formErrors = null;

        if ($request->getMethod() == 'POST') {
            $params = array(
                'username' => $request->get('username'),
                'password' => sha1($request->get('password'))
            );

            $response = $this->get('api.call')->makeCall($this->generateUrl('api_account_login'), $params);

            try {
                $response = $this->get('json.response')->decode($response);
            } catch (Exception $e) {
                $formErrors = $e->getMessage();
            }
        }

        return $this->render('ShopContentBundle:Account:login_form.html.twig', array('form_errors' => $formErrors));
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
            } catch (Exception $e) {
                $formErrors = $e->getMessage();
            }
        }

        return $this->render('ShopContentBundle:Account:register.html.twig', array('form_errors' => $formErrors));
    }
}