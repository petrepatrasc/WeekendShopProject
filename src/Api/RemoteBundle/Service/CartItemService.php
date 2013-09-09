<?php
/**
 * Created by JetBrains PhpStorm.
 * User: petre
 * Date: 9/8/13
 * Time: 7:44 PM
 * To change this template use File | Settings | File Templates.
 */

namespace Api\RemoteBundle\Service;


use Api\RemoteBundle\Entity\CartItem;
use Api\RemoteBundle\Entity\CartItemRepository;
use Doctrine\ORM\EntityManager;
use \DateTime;

class CartItemService extends DbInteractionService {

    /**
     * @var CartItemRepository
     */
    protected $repo;

    /**
     * @var OrderShopService
     */
    protected $order;

    /**
     * Define the Doctrine Entity Manager.
     * @param EntityManager $em The Doctrine Entity Manager.
     * @param OrderShopService $order The Order Service class.
     */
    public function __construct(EntityManager $em, OrderShopService $order) {
        parent::__construct($em);

        $this->order = $order;
        $this->repo = $this->em->getRepository('ApiRemoteBundle:CartItem');
    }

    /**
     * Add a product to the cart of a user.
     * @param int $accountId The ID of the account that wants the product added.
     * @param int $productId The ID of the product that should be added.
     * @return CartItem The entity that was created.
     */
    public function addToCart($accountId, $productId) {
        // Look for an already existing order from the user, that's still open.
        $orderEntity = $this->order->ensureOrderExists($accountId);

        $accountRepo = $this->em->getRepository('ApiRemoteBundle:Account');
        $criteria = array(
            'id' => $accountId
        );
        $accountEntity = $accountRepo->findOneBy($criteria);

        $productRepo = $this->em->getRepository('ApiRemoteBundle:Product');
        $productEntity = $productRepo->find($productId);

        // Add entry into cart_item.
        $cartItem = new CartItem();
        $cartItem->setClosed(0);
        $cartItem->setAccount($accountEntity);
        $cartItem->setOrder($orderEntity);
        $cartItem->setProduct($productEntity);
        $cartItem->setCreatedAt(new DateTime('now'));
        $cartItem->setUpdatedAt(new DateTime('now'));

        $cartItem = $this->repo->create($cartItem);

        return $cartItem;
    }

    public function getCartItems($accountId) {
        $criteria = array(
            'closed' => 0,
            'account' => $accountId
        );

        $returned = $this->repo->findBy($criteria);

        $items = array();

        foreach($returned as $item) {
            $product = $item->getProduct()->toArray();
            $item = $item->toArray();
            $item['product'] = $product;

            array_push($items, $item);
        }

        return $items;
    }
}