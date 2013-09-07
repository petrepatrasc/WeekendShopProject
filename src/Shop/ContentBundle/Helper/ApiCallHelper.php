<?php
/**
 * Created by JetBrains PhpStorm.
 * User: petre
 * Date: 9/7/13
 * Time: 6:49 AM
 * To change this template use File | Settings | File Templates.
 */

namespace Shop\ContentBundle\Helper;

use Symfony\Component\Serializer\Encoder\JsonEncoder as JsonEncoder;

class ApiCallHelper {

    protected $router = null;
    protected $buzz = null;

    /**
     * Constructor for ApiCall class.
     * @param mixed $router The router service that should be passed.
     * @param mixed $buzz The Buzz library for issuing POST requests to the API layer.
     */
    public function __construct($router, $buzz) {
        $this->router   = $router;
        $this->buzz     = $buzz;
    }

    /**
     * Make a call to the API layer, and provides an easy wrapper-method over all of the components.
     * @param string $apiRoute The API route that should be called.
     * @param array $parameters The parameters that you would like to pass.
     * @return string The JSON response from the API layer.
     */
    public function makeCall($apiRoute, $parameters) {
        $url = $this->createAbsoluteUrl($apiRoute);
        $response = $this->callApiLayer($url, $parameters);

        return $response;
    }

    /**
     * Create an absolute URL from a string route.
     * @param string $apiRoute The route that should be transformed into an absolute URL.
     * @return string mixed The absolute route.
     */
    protected function createAbsoluteUrl($apiRoute) {
        return $this->router->generate('api_account_login', array(), true);
    }

    /**
     * Method for calling the API layer.
     * @param string $url The absolute URL for the API layer.
     * @param array $parameters The parameters that should be sent to the API level.
     * @return string The JSON response from the API layer.
     */
    protected function callApiLayer($url, $parameters) {
        $fields = array('json_data' => $this->jsonEncodeParameters($parameters));
        $response = $this->buzz->submit($url, $fields);

        return $response->getContent();
    }

    /**
     * JSON-encode the parameters for the API layer.
     * @param array $parameters The parameters that should be JSON encoded.
     * @return string|\Symfony\Component\Serializer\Encoder\scalar The JSON-encoded parameters.
     */
    protected function jsonEncodeParameters($parameters) {
        $jsonEncoder = new JsonEncoder();

        return $jsonEncoder->encode($parameters, $format = 'json');
    }
}