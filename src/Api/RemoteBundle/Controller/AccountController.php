<?php

namespace Api\RemoteBundle\Controller;

use Api\RemoteBundle\Exception\Account\NotFoundException;
use Api\RemoteBundle\Service\AccountService;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Serializer\Encoder\JsonEncoder as JsonEncoder;
use Symfony\Component\HttpFoundation\Response;

class AccountController extends Controller implements AppKeyAuthenticatedController
{
    public function loginAction() {
        $params = $this->get('json')->decode($this->getRequest());
        $username = $params['username'];
        $password = $params['password'];

        try {
            $valid = $this->get('account')->loginWithUsernameAndPassword($username, $password);
        } catch (NotFoundException $e) {
            return new Response($e);
        }
    }

    public function registerAction() {
        $params = $this->get('json')->decode($this->getRequest());

        // validate data from API call.
        $params['createdAt'] = date('Y-m-d H:i:s');
        $params['updatedAt'] = date('Y-m-d H:i:s');
        $params['apiKey'] = sha1($this->generateRandomString(20));

        $this->get('account')->register($params);

        return $this->get('json')->generateSuccessfulResponse();
    }

    protected function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }
}
