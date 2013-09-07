<?php
/**
 * Created by JetBrains PhpStorm.
 * User: petre
 * Date: 9/8/13
 * Time: 7:15 AM
 * To change this template use File | Settings | File Templates.
 */

namespace Shop\ContentBundle\Service;


use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Exception;

class JsonResponseService {

    protected $encoder;

    public function __construct() {
        $this->encoder = new JsonEncoder();
    }

    /**
     * Decode the parameters that have come from the API and signal errors appropriately.
     * @param string $params The JSON string received from the API.
     * @return array The array of the JSON parameters received from the API.
     * @throws \Exception Exception with the message in the event that it happens.
     */
    public function decode($params) {
        $decoded = $this->encoder->decode($params, "json");

        if ($decoded['status'] != 100) {
            throw new Exception($decoded['message']);
        }

        return $decoded;
    }
}