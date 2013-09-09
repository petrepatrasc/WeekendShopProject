<?php
/**
 * Created by JetBrains PhpStorm.
 * User: petre
 * Date: 9/8/13
 * Time: 4:50 PM
 * To change this template use File | Settings | File Templates.
 */

namespace Shop\ContentBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProductController extends Controller {

    public function categoryAction($name, $id) {
        $categories = $this->get('api.call')->getCategories();
        $products = $this->get('api.call')->getProductsForCategory($id);
        $category = $this->get('api.call')->getCategory($id);



        return $this->render('ShopContentBundle:Product:category.html.twig', array(
            'products' => $products,
            'categories' => $categories,
            'category' => $category
        ));
    }

    public function subcategoryAction($name, $id) {
        $categories = $this->get('api.call')->getCategories();
        $products = $this->get('api.call')->getProductsForSubcategory($id);
        $parentCategory = $this->get('api.call')->getParentOfSubcategory($id);
        $subcategory = $this->get('api.call')->getSubcategory($id);

        return $this->render('ShopContentBundle:Product:subcategory.html.twig', array(
            'products' => $products,
            'categories' => $categories,
            'parentCategory' => $parentCategory,
            'subcategory' => $subcategory
        ));
    }

}