<?php
/**
 * Created by JetBrains PhpStorm.
 * User: petre
 * Date: 9/7/13
 * Time: 5:21 PM
 * To change this template use File | Settings | File Templates.
 */

namespace Api\RemoteBundle\Service;


use Api\RemoteBundle\Exception\ResponseCode;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Encoder\JsonEncoder;

class JsonProcessorService {

    protected $encoder;

    public function __construct() {
        $this->encoder = new JsonEncoder();
    }

    /**
     * Decode POST data that has arrived from an application.
     * @param Request $data The data that has been sent.
     * @return array Array containing the decoded JSON data.
     */
    public function decode($data) {
        return $this->encoder->decode($data->get('json_data'), "json");
    }

    public function generateSuccessfulResponse($scriptData = array()) {
        $params['status'] = ResponseCode::SUCCESS;
        $params['message'] = "Operation successful!";
        $params = array_merge($params, $scriptData);

        return new JsonResponse($params);
    }
}