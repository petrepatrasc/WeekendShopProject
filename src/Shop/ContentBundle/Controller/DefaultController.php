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
            'app_key' => 'bcae1066f80901c8547e013bc7315377f5e47b76'
        );

        $apiResponse = $this->get('api.call')->makeCall('api.account.login', $requestData);

        return new Response($apiResponse);
    }
}
