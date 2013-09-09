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
use \Exception;

class ApiCallService {

    protected $router = null;
    protected $buzz = null;
    protected $appKey = null;

    /**
     * @var JsonResponseService
     */
    protected $jsonResponse;

    /**
     * Constructor for ApiCall class.
     * @param mixed $router The router service that should be passed.
     * @param mixed $buzz The Buzz library for issuing POST requests to the API layer.
     * @param string $appKey The Application key from the parameters file.
     */
    public function __construct($router, $buzz, $appKey) {
        $this->router       = $router;
        $this->buzz         = $buzz;
        $this->appKey       = $appKey;
        $this->jsonResponse = new JsonResponseService();
    }

    public function getCategories() {
        $categories = array();
        $response = $this->makeCall('api_category_retrieve');

        try {
            $response = $this->jsonResponse->decode($response);

            $categories = $response['categories'];

        } catch (Exception $e) {
            $formErrors = $e->getMessage();
        }

        return $categories;
    }

    public function getProductsForSubcategory($id) {
        $params = array(
            'subcategory' => $id,
        );

        $products = array();
        $response = $this->makeCall('api_product_retrieve_subcategory', $params);

        try {
            $response = $this->jsonResponse->decode($response);

            $products = $response['products'];
        } catch (Exception $e) {
            $formErrors = $e->getMessage();
        }

        return $products;
    }

    public function getProductsForCategory($id) {
        $params = array(
            'category' => $id,
        );

        $products = array();
        $response = $this->makeCall('api_product_retrieve_category', $params);

        try {
            $response = $this->jsonResponse->decode($response);

            $products = $response['products'];
        } catch (Exception $e) {
            $formErrors = $e->getMessage();
        }

        return $products;
    }

    public function getParentOfSubcategory($id) {
        $params = array(
            'subcategory' => $id
        );

        $category = array();
        $response = $this->makeCall('api_subcategory_find_parent', $params);

        try {
            $response = $this->jsonResponse->decode($response);

            $category = $response['category'];
        } catch (Exception $e) {
            $formErrors = $e->getMessage();
        }

        return $category;
    }

    public function getSubcategory($id) {
        $params = array(
            'subcategory' => $id
        );

        $subcategory = array();
        $response = $this->makeCall('api_subcategory_retrieve_one', $params);

        try {
            $response = $this->jsonResponse->decode($response);

            $subcategory = $response['subcategory'];
        } catch (Exception $e) {
            $formErrors = $e->getMessage();
        }

        return $subcategory;
    }

    public function getCategory($id) {
        $params = array(
            'category' => $id
        );

        $category = array();
        $response = $this->makeCall('api_category_retrieve_one', $params);

        try {
            $response = $this->jsonResponse->decode($response);

            $category = $response['category'];
        } catch (Exception $e) {
            $formErrors = $e->getMessage();
        }

        return $category;
    }

    public function addToCart($params) {
        $response = $this->makeCall('api_cart_add', $params);

        try {
            $response = $this->jsonResponse->decode($response);

        } catch (Exception $e) {
            $formErrors = $e->getMessage();
        }

        return true;
    }

    public function finishOrder($params) {
        $response = $this->makeCall('api_order_finish', $params);

        try {
            $response = $this->jsonResponse->decode($response);
        } catch (Exception $e) {
            $formErrors = $e->getMessage();
        }

        return true;
    }

    public function getCartItems($params) {
        $response = $this->makeCall('api_cart_get_all', $params);
        $items = array();

        try {
            $response = $this->jsonResponse->decode($response);
            $items = $response['items'];
        } catch (Exception $e) {
            $formErrors = $e->getMessage();
        }

        return $items;
    }

    public function getTotalCartPrice($items) {
        $totalPrice = 0;

        foreach ($items as $item) {
            $totalPrice += $item['product']['price'];
        }

        return $totalPrice;
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