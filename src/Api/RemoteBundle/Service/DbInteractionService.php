<?php
/**
 * Created by JetBrains PhpStorm.
 * User: petre
 * Date: 9/7/13
 * Time: 3:08 PM
 * To change this template use File | Settings | File Templates.
 */

namespace Api\RemoteBundle\Service;

use Doctrine\ORM\EntityManager;


class DbInteractionService {

    /**
     * @var EntityManager
     */
    protected $em;

    /**
     * Define the Doctrine Entity Manager.
     * @param EntityManager $em The Doctrine Entity Manager.
     */
    public function __construct(EntityManager $em) {
        $this->em = $em;
    }
}