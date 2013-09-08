<?php
/**
 * Created by JetBrains PhpStorm.
 * User: petre
 * Date: 9/8/13
 * Time: 8:39 AM
 * To change this template use File | Settings | File Templates.
 */

namespace Shop\ContentBundle\Controller;

use \Exception;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ContentController extends Controller {

    public function homeAction() {
        $response = $this->get('api.call')->makeCall('api_category_retrieve');
        $categories = array();

        try {
            $response = $this->get('json.response')->decode($response);

            $categories = $response['categories'];

        } catch (Exception $e) {
            $formErrors = $e->getMessage();
        }

        return $this->render('ShopContentBundle:Content:home.html.twig', array(
            'categories' => $categories
        ));
    }

    public function aboutAction() {

    }

    public function contactAction() {

    }
}