<?php

namespace Shop\ContentBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Encoder\JsonEncoder as JsonEncoder;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $requestData = array(
            'api_key' => 'da39a3ee5e6b4b0d3255bfef95601890afd80709'
        );

        $apiResponse = $this->get('api.call')->makeCall('api.account.login', $requestData);

        return new Response($apiResponse);
    }
}
