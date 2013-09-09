<?php
/**
 * Created by JetBrains PhpStorm.
 * User: petre
 * Date: 9/8/13
 * Time: 7:43 PM
 * To change this template use File | Settings | File Templates.
 */

namespace Api\RemoteBundle\Service;

use Api\RemoteBundle\Entity\OrderShop;
use Api\RemoteBundle\Entity\OrderShopRepository;
use Doctrine\ORM\EntityManager;
use \DateTime;

class OrderShopService extends DbInteractionService {

    /**
     * @var OrderShopRepository
     */
    protected $repo;

    /**
     * Define the Doctrine Entity Manager.
     * @param EntityManager $em The Doctrine Entity Manager.
     */
    public function __construct(EntityManager $em) {
        parent::__construct($em);

        $this->repo = $this->em->getRepository('ApiRemoteBundle:OrderShop');
    }

    public function finishOrder($accountId) {
        $criteria = array(
            'account' => $accountId,
            'closed' => 0
        );

        // Close down the cart items first.
        $itemRepo = $this->em->getRepository('ApiRemoteBundle:CartItem');
        $items = $itemRepo->findBy($criteria);


        foreach($items as $item) {
            $item->setClosed(1);
        }

        $order = $this->repo->findOneBy($criteria);
        $order->setClosed(1);

        $this->em->flush();

        return true;
    }

    /**
     * Ensure that an open order exists for an account.
     * @param int $accountId The ID of the account that should be used for linking.
     */
    public function ensureOrderExists($accountId) {
        $criteria = array(
            'account' => $accountId,
            'closed' => 0
        );

        $order = $this->repo->findOneBy($criteria);

        if ($order === null) {
            // Get account for linking.
            $accountService = $this->em->getRepository('ApiRemoteBundle:Account');
            $criteria = array(
                'id' => $accountId
            );
            $account = $accountService->findOneBy($criteria);

            // Create Order entity and persist it.
            $orderEntity = new OrderShop();
            $orderEntity->setAccount($account);
            $orderEntity->setClosed(0);
            $orderEntity->setCreatedAt(new DateTime('now'));
            $orderEntity->setUpdatedAt(new DateTime('now'));

            $order = $this->repo->create($orderEntity);
        }

        return $order;
    }
}