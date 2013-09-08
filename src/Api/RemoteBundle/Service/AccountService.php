<?php
/**
 * Created by JetBrains PhpStorm.
 * User: petre
 * Date: 9/7/13
 * Time: 3:05 PM
 * To change this template use File | Settings | File Templates.
 */

namespace Api\RemoteBundle\Service;
use Api\RemoteBundle\Entity\Account;
use Api\RemoteBundle\Exception\Account\NotFoundException;
use Doctrine\ORM\EntityManager;
use Api\RemoteBundle\Entity\AccountRepository;

class AccountService extends DbInteractionService{

    /**
     * @var AccountRepository
     */
    protected $repo;

    /**
     * Define the Doctrine Entity Manager.
     * @param EntityManager $em The Doctrine Entity Manager.
     */
    public function __construct(EntityManager $em) {
        parent::__construct($em);

        $this->repo = $this->em->getRepository('ApiRemoteBundle:Account');
    }

    /**
     * Register an account on the system.
     * @param array $params The parameters that are required for registering an account on the system.
     * @return Account $account The Account entity that has been registered.
     */
    public function register($params) {
        $account = Account::makeFromArray($params);

        return $this->repo->create($account);
    }

    /**
     * Find an Account via their username and password.
     * @param string $username The username associated to the Account.
     * @param string $password The password associated to the Account.
     * @return Account|null
     */
    public function loginWithUsernameAndPassword($username, $password) {
        $account = $this->repo->findByUsernameAndPassword($username, $password);

        if ($account === null) {
            throw new NotFoundException();
        }

        return $account;
    }

}