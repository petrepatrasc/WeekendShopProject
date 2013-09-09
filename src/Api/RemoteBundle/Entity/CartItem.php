<?php
/**
 * Created by JetBrains PhpStorm.
 * User: petre
 * Date: 9/8/13
 * Time: 7:23 PM
 * To change this template use File | Settings | File Templates.
 */

namespace Api\RemoteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use \DateTime;

/**
 * @ORM\Entity(repositoryClass="Api\RemoteBundle\Entity\CartItemRepository")
 * @ORM\Table(name="cart_item")
 */
class CartItem implements Serializable, EntityManager {

    /**
     * Create a new entity from array elements or update an existing one.
     * @param array $params The parameters that define an entity.
     * @param CartItem $entity The entity that we want to update.
     * @return CartItem The entity that was obtained.
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
        $data['product'] = $this->getProduct();
        $data['order'] = $this->getOrder();

        return $data;
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
     * @ORM\Column(type="datetime")
     */
    protected $createdAt;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $updatedAt;

    /**
     * @ORM\ManyToOne(targetEntity="Product")
     * @ORM\JoinColumn(name="product_id", referencedColumnName="id")
     */
    protected $product;

    /**
     * @ORM\ManyToOne(targetEntity="Account", inversedBy="accounts")
     * @ORM\JoinColumn(name="account_id", referencedColumnName="id")
     */
    protected $account;

    /**
     * @ORM\ManyToOne(targetEntity="OrderShop", inversedBy="orderShops")
     * @ORM\JoinColumn(name="order_shop_id", referencedColumnName="id")
     */
    protected $order;

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
     * @return CartItem
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
     * @return CartItem
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
     * @return CartItem
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
     * @return CartItem
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
     * Set product
     *
     * @param \Api\RemoteBundle\Entity\Product $product
     * @return CartItem
     */
    public function setProduct(\Api\RemoteBundle\Entity\Product $product = null)
    {
        $this->product = $product;
    
        return $this;
    }

    /**
     * Get product
     *
     * @return \Api\RemoteBundle\Entity\Product 
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * Set account
     *
     * @param \Api\RemoteBundle\Entity\Account $account
     * @return CartItem
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
     * Set order
     *
     * @param \Api\RemoteBundle\Entity\OrderShop $order
     * @return CartItem
     */
    public function setOrder(\Api\RemoteBundle\Entity\OrderShop $order = null)
    {
        $this->order = $order;
    
        return $this;
    }

    /**
     * Get order
     *
     * @return \Api\RemoteBundle\Entity\OrderShop
     */
    public function getOrder()
    {
        return $this->order;
    }
}