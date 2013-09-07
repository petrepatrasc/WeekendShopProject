<?php
/**
 * Created by JetBrains PhpStorm.
 * User: petre
 * Date: 9/7/13
 * Time: 4:37 PM
 * To change this template use File | Settings | File Templates.
 */

namespace Api\RemoteBundle\Service;


use Api\RemoteBundle\Entity\ApplicationKey;
use Api\RemoteBundle\Entity\ApplicationKeyRepository;
use Doctrine\ORM\EntityManager;

class TokenVerificationService extends DbInteractionService {

    /**
     * @var ApplicationKeyRepository
     */
    protected $repo;

    /**
     * Define the Doctrine Entity Manager.
     * @param EntityManager $em The Doctrine Entity Manager.
     */
    public function __construct(EntityManager $em) {
        parent::__construct($em);

        $this->repo = $this->em->getRepository('ApiRemoteBundle:ApplicationKey');
    }

    /**
     * Validate the application key of a request.
     * @param string $key The application key of a request.
     * @return bool Whether or not the application key is valid.
     */
    public function validateAppKey($key) {
        $criteria = array('value' => $key);

        $entry = $this->repo->findOneBy($criteria);

        if ($entry === null) {
            return false;
        } else if ($entry instanceof ApplicationKey) {
            return true;
        }
    }
}