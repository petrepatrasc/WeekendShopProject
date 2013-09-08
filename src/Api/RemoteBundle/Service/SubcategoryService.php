<?php
/**
 * Created by JetBrains PhpStorm.
 * User: petre
 * Date: 9/8/13
 * Time: 2:59 PM
 * To change this template use File | Settings | File Templates.
 */

namespace Api\RemoteBundle\Service;

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
}