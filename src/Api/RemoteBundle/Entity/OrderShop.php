<?php
/**
 * Created by JetBrains PhpStorm.
 * User: petre
 * Date: 9/8/13
 * Time: 7:34 PM
 * To change this template use File | Settings | File Templates.
 */

namespace Api\RemoteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use \DateTime;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="Api\RemoteBundle\Entity\OrderShopRepository")
 * @ORM\Table(name="order_shop")
 */
class OrderShop implements Serializable, EntityManager {

    /**
     * Create a new entity from array elements or update an existing one.
     * @param array $params The parameters that define an entity.
     * @param OrderShop $entity The entity that we want to update.
     * @return OrderShop The entity that was obtained.
     */
    public static function makeFromArray($params, $entity = null) {
        if ($entity === null) {
            $entity = new self;
        }

        if (isset($params['createdAt'])) {
            $entity->setCreatedAt(new DateTime($params['createdAt']));
        }

        if (isset($params['updatedAt'])) {
            $entity->setUpdatedAt(new DateTime($params['updatedAt']));
        } else {
            $entity->setUpdatedAt(new DateTime('now'));
        }

        if (isset($params['closed'])) {
            $entity->setClosed($params['closed']);
        }

        return $entity;
    }

    /**
     * Transform an entity into an array.
     * @return array The array representing the fields of the entity.
     */
    public function toArray() {
        $data = array();

        $data['id'] = $this->getId();
        $data['createdAt'] = $this->getCreatedAt();
        $data['updatedAt'] = $this->getUpdatedAt();
        $data['closed'] = $this->getClosed();
        $data['account'] = $this->getAccount();
        $data['cartItems'] = $this->getCartItems();

        return $data;
    }

    public function __construct() {
        $this->cartItems = new ArrayCollection();
    }

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="integer")
     */
    protected $closed;

    /**
     * @ORM\ManyToOne(targetEntity="Account")
     * @ORM\JoinColumn(name="account_id", referencedColumnName="id")
     */
    protected $account;

    /**
     * @ORM\OneToMany(targetEntity="CartItem", mappedBy="order")
     */
    protected $cartItems;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $createdAt;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $updatedAt;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return OrderShop
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set closed
     *
     * @param integer $closed
     * @return OrderShop
     */
    public function setClosed($closed)
    {
        $this->closed = $closed;
    
        return $this;
    }

    /**
     * Get closed
     *
     * @return integer 
     */
    public function getClosed()
    {
        return $this->closed;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return OrderShop
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    
        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return OrderShop
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    
        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set account
     *
     * @param \Api\RemoteBundle\Entity\Account $account
     * @return OrderShop
     */
    public function setAccount(\Api\RemoteBundle\Entity\Account $account = null)
    {
        $this->account = $account;
    
        return $this;
    }

    /**
     * Get account
     *
     * @return \Api\RemoteBundle\Entity\Account 
     */
    public function getAccount()
    {
        return $this->account;
    }

    /**
     * Add cartItems
     *
     * @param \Api\RemoteBundle\Entity\CartItem $cartItems
     * @return OrderShop
     */
    public function addCartItem(\Api\RemoteBundle\Entity\CartItem $cartItems)
    {
        $this->cartItems[] = $cartItems;
    
        return $this;
    }

    /**
     * Remove cartItems
     *
     * @param \Api\RemoteBundle\Entity\CartItem $cartItems
     */
    public function removeCartItem(\Api\RemoteBundle\Entity\CartItem $cartItems)
    {
        $this->cartItems->removeElement($cartItems);
    }

    /**
     * Get cartItems
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCartItems()
    {
        return $this->cartItems;
    }

    /**
     * Add orders
     *
     * @param \Api\RemoteBundle\Entity\OrderShop $orders
     * @return OrderShop
     */
    public function addOrder(\Api\RemoteBundle\Entity\OrderShop $orders)
    {
        $this->orders[] = $orders;
    
        return $this;
    }

    /**
     * Remove orders
     *
     * @param \Api\RemoteBundle\Entity\OrderShop $orders
     */
    public function removeOrder(\Api\RemoteBundle\Entity\OrderShop $orders)
    {
        $this->orders->removeElement($orders);
    }

    /**
     * Get orders
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getOrders()
    {
        return $this->orders;
    }
}