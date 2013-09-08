<?php
/**
 * Created by JetBrains PhpStorm.
 * User: petre
 * Date: 9/8/13
 * Time: 8:39 AM
 * To change this template use File | Settings | File Templates.
 */

namespace Shop\ContentBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ContentController extends Controller {

    public function homeAction() {
        return $this->render('ShopContentBundle:Content:home.html.twig');
    }

    public function aboutAction() {

    }

    public function contactAction() {

    }
}