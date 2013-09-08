<?php
/**
 * Created by JetBrains PhpStorm.
 * User: petre
 * Date: 9/7/13
 * Time: 6:49 AM
 * To change this template use File | Settings | File Templates.
 */

namespace Shop\ContentBundle\Service;

use Symfony\Component\Serializer\Encoder\JsonEncoder as JsonEncoder;

class ApiCallService {

    protected $router = null;
    protected $buzz = null;
    protected $appKey = null;

    /**
     * Constructor for ApiCall class.
     * @param mixed $router The router service that should be passed.
     * @param mixed $buzz The Buzz library for issuing POST requests to the API layer.
     * @param string $appKey The Application key from the parameters file.
     */
    public function __construct($router, $buzz, $appKey) {
        $this->router   = $router;
        $this->buzz     = $buzz;
        $this->appKey   = $appKey;
    }

    /**
     * Make a call to the API layer, and provides an easy wrapper-method over all of the components.
     * @param string $apiRoute The API route that should be called.
     * @param array $parameters The parameters that you would like to pass.
     * @param bool $apiKeyRequired Whether the API key is required for this request or not.
     * @return string The JSON response from the API layer.
     */
    public function makeCall($apiRoute, $parameters = array(), $apiKeyRequired = false) {
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
        return $this->router->generate($apiRoute, array(), true);
    }

    /**
     * Method for calling the API layer.
     * @param string $url The absolute URL for the API layer.
     * @param array $parameters The parameters that should be sent to the API level.
     * @return string The JSON response from the API layer.
     */
    protected function callApiLayer($url, $parameters) {
        $parameters = array_merge($parameters, array('app_key' => $this->appKey));
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