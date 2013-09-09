<?php
/**
 * Created by JetBrains PhpStorm.
 * User: petre
 * Date: 9/8/13
 * Time: 2:09 PM
 * To change this template use File | Settings | File Templates.
 */

namespace Api\RemoteBundle\Service;

use Doctrine\ORM\EntityManager;
use Api\RemoteBundle\Entity\CategoryRepository;


class CategoryService extends DbInteractionService {

    /**
     * @var CategoryRepository
     */
    protected $repo;

    /**
     * Define the Doctrine Entity Manager.
     * @param EntityManager $em The Doctrine Entity Manager.
     */
    public function __construct(EntityManager $em) {
        parent::__construct($em);

        $this->repo = $this->em->getRepository('ApiRemoteBundle:Category');
    }

    /**
     * Retrieves all of the categories currently stored in the database.
     * @return mixed
     */
    public function retrieveAll() {
        $categories = $this->repo->retrieveAll();

        $returnParams = array();
        foreach ($categories as $category) {
            $subcategories = $category->getSubcategories();

            $subHolder = array();

            foreach ($subcategories as $subcategory) {
                array_push($subHolder, $subcategory->toArray());
            }

            $category = $category->toArray();
            $category['subcategories'] = $subHolder;

            array_push($returnParams, $category);
        }

        return $returnParams;
    }

    /**
     * Retrieve a single category.
     * @param int $id The ID of the entity that needs to be retrieved.
     * @return array The category.
     */
    public function findOne($id) {
        return $this->repo->find($id)->toArray();
    }
}