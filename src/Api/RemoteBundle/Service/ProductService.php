<?php
/**
 * Created by JetBrains PhpStorm.
 * User: petre
 * Date: 9/8/13
 * Time: 4:29 PM
 * To change this template use File | Settings | File Templates.
 */

namespace Api\RemoteBundle\Service;


use Api\RemoteBundle\Entity\ProductRepository;
use Doctrine\ORM\EntityManager;

class ProductService extends DbInteractionService {

    /**
     * @var ProductRepository
     */
    protected $repo;

    /**
     * Define the Doctrine Entity Manager.
     * @param EntityManager $em The Doctrine Entity Manager.
     */
    public function __construct(EntityManager $em) {
        parent::__construct($em);

        $this->repo = $this->em->getRepository('ApiRemoteBundle:Product');
    }


    public function retrieveForSubcategory($id) {
        $products = $this->repo->retrieveForSubcategory($id);

        $returned = array();

        foreach($products as $product) {
            array_push($returned, $product->toArray());
        }

        return $returned;
    }

    public function retrieveForCategory($id) {
        $catRepo = $this->em->getRepository('ApiRemoteBundle:Category');
        $category = $catRepo->find($id);

        $subcategories = $category->getSubcategories();
        $products = array();

        foreach($subcategories as $subcategory) {
            $subProducts = $subcategory->getProducts();

            foreach ($subProducts as $prod) {
                array_push($products, $prod->toArray());
            }
        }

        return $products;
    }
}