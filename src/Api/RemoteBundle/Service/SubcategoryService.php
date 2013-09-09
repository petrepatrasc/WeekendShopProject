<?php
/**
 * Created by JetBrains PhpStorm.
 * User: petre
 * Date: 9/8/13
 * Time: 2:59 PM
 * To change this template use File | Settings | File Templates.
 */

namespace Api\RemoteBundle\Service;

use Api\RemoteBundle\Entity\Subcategory;
use Doctrine\ORM\EntityManager;
use Api\RemoteBundle\Entity\SubcategoryRepository;

class SubcategoryService extends DbInteractionService {

    /**
     * @var SubcategoryRepository
     */
    protected $repo;

    /**
     * Define the Doctrine Entity Manager.
     * @param EntityManager $em The Doctrine Entity Manager.
     */
    public function __construct(EntityManager $em) {
        parent::__construct($em);

        $this->repo = $this->em->getRepository('ApiRemoteBundle:Subcategory');
    }

    /**
     * Retrieves all of the categories currently stored in the database.
     * @return mixed
     */
    public function retrieveAll() {
        $categories = $this->repo->retrieveAll();

        $returnParams = array();
        foreach ($categories as $category) {
            array_push($returnParams, $category->toArray());
        }

        return $returnParams;
    }

    /**
     * Find the parent of a subcategory.
     * @param int $id The ID of the subcategory's parent that should be retrieved.
     * @return array The parent category.
     */
    public function findParent($id) {
        $subcategory = $this->repo->find($id);

        $categoryRepository = $this->em->getRepository('ApiRemoteBundle:Category');
        return $categoryRepository->find($subcategory->getCategory()->getId())->toArray();
    }

    /**
     * Retrieve a single subcategory.
     * @param int $id The ID of the entity that needs to be retrieved.
     * @return array The subcategory.
     */
    public function findOne($id) {
        return $this->repo->find($id)->toArray();
    }
}