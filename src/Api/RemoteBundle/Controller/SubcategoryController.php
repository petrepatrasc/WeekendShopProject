<?php
/**
 * Created by JetBrains PhpStorm.
 * User: petre
 * Date: 9/8/13
 * Time: 3:01 PM
 * To change this template use File | Settings | File Templates.
 */

namespace Api\RemoteBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SubcategoryController extends Controller {

    public function retrieveAllAction() {
        $params['subcategories'] = $this->get('subcategory')->retrieveAll();

        return $this->get('json')->generateSuccessfulResponse($params);
    }

    /**
     * Retrieve the parent of a subcategory.
     */
    public function retrieveParentOfSubcategoryAction() {
        $params = $this->get('json')->decode($this->getRequest());
        $subId = $params['subcategory'];

        $return['category'] = $this->get('subcategory')->findParent($subId);
        return $this->get('json')->generateSuccessfulResponse($return);
    }

    /**
     * Retrieve a single subcategory entity.
     */
    public function retrieveOneAction() {
        $params = $this->get('json')->decode($this->getRequest());
        $subId = $params['subcategory'];

        $return['subcategory'] = $this->get('subcategory')->findOne($subId);
        return $this->get('json')->generateSuccessfulResponse($return);
    }
}