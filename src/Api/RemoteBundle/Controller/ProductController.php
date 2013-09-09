<?php
/**
 * Created by JetBrains PhpStorm.
 * User: petre
 * Date: 9/8/13
 * Time: 4:35 PM
 * To change this template use File | Settings | File Templates.
 */

namespace Api\RemoteBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProductController extends Controller {

    public function retrieveForSubcategoryAction() {
        $params = $this->get('json')->decode($this->getRequest());
        $subcategoryId = $params['subcategory'];

        $param['products'] = $this->get('product')->retrieveForSubcategory($subcategoryId);

        return $this->get('json')->generateSuccessfulResponse($param);
    }

    public function retrieveForCategoryAction() {
        $params = $this->get('json')->decode($this->getRequest());
        $categoryId = $params['category'];

        $return['products'] = $this->get('product')->retrieveForCategory($categoryId);

        return $this->get('json')->generateSuccessfulResponse($return);
    }


}