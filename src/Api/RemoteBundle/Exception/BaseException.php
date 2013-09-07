<?php
/**
 * Created by JetBrains PhpStorm.
 * User: petre
 * Date: 9/7/13
 * Time: 6:11 PM
 * To change this template use File | Settings | File Templates.
 */

namespace Api\RemoteBundle\Exception;


use Symfony\Component\Serializer\Encoder\JsonEncoder;

class BaseException extends \Exception {

    protected $encoder;
    protected $encodedMessage;

    public function __construct() {
        $this->encoder = new JsonEncoder();
        $this->encodedMessage = $this->encodeMessage();
    }

    protected function encodeMessage() {
        $params['status'] = $this->code;
        $params['message'] = $this->message;
        $params['error'] = true;

        return $this->encoder->encode($params, "json");
    }

    public function __toString() {
        return $this->encodeMessage();
    }
}