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
}