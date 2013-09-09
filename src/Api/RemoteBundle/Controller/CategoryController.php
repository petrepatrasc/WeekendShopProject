<?php
/**
 * Created by JetBrains PhpStorm.
 * User: petre
 * Date: 9/8/13
 * Time: 2:11 PM
 * To change this template use File | Settings | File Templates.
 */

namespace Api\RemoteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CategoryController extends Controller implements AppKeyAuthenticatedController {

    public function retrieveAllAction() {
        $params['categories'] = $this->get('category')->retrieveAll();

        return $this->get('json')->generateSuccessfulResponse($params);
    }

    /**
     * Retrieve a single category entity.
     */
    public function retrieveOneAction() {
        $params = $this->get('json')->decode($this->getRequest());
        $catId = $params['category'];

        $return['category'] = $this->get('category')->findOne($catId);
        return $this->get('json')->generateSuccessfulResponse($return);
    }
}