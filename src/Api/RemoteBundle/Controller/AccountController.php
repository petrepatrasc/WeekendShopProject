<?php

namespace Api\RemoteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Encoder\JsonEncode;
use Symfony\Component\Serializer\Encoder\JsonEncoder as JsonEncoder;

class AccountController extends Controller
{
    public function indexAction()
    {
        $request = $this->getRequest();

        $data = $request->request->get('json_data');

        $jsonDecoder = new JsonEncoder();

        $jsonData = $jsonDecoder->decode($data, $format = 'json');

        $response = array(
            'status' => 100,
            'message' => 'Details are correct!'
        );

        return new JsonResponse($response);
    }
}
