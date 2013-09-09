<?php
/**
 * Created by JetBrains PhpStorm.
 * User: petre
 * Date: 9/7/13
 * Time: 12:57 PM
 * To change this template use File | Settings | File Templates.
 */

namespace Api\RemoteBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use DateTime;

/**
 * @ORM\Entity(repositoryClass="Api\RemoteBundle\Entity\AccountRepository")
 * @ORM\Table(name="account")
 */
class Account implements Serializable, EntityManager {

    public function __construct() {
        $this->orders = new ArrayCollection();
    }

    /**
     * Create a new entity from array elements or update an existing one.
     * @param array $params The parameters that define an entity.
     * @param Account $entity The entity that we want to update.
     * @return Account The entity that was obtained.
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

        if (isset($params['username'])) {
            $entity->setUsername($params['username']);
        }

        if (isset($params['password'])) {
            $entity->setPassword($params['password']);
        }

        if (isset($params['email'])) {
            $entity->setEmail($params['email']);
        }

        if (isset($params['fullName'])) {
            $entity->setFullName($params['fullName']);
        }

        if (isset($params['apiKey'])) {
            $entity->setApiKey($params['apiKey']);
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
        $data['username'] = $this->getUsername();
        $data['password'] = $this->getPassword();
        $data['email'] = $this->getEmail();
        $data['fullName'] = $this->getFullName();
        $data['apiKey'] = $this->getApiKey();

        return $data;
    }

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $createdAt;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $updatedAt;

    /**
     * @ORM\Column(type="string", length=80)
     */
    protected $username;

    /**
     * @ORM\Column(type="string", length=120)
     */
    protected $password;

    /**
     * @ORM\Column(type="string", length=160)
     */
    protected $email;

    /**
     * @ORM\Column(type="string", length=160)
     */
    protected $fullName;

    /**
     * @ORM\Column(type="string", length=160)
     */
    protected $apiKey;

    /**
     * @ORM\OneToMany(targetEntity="OrderShop", mappedBy="order_shop")
     */
    protected $orders;

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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Account
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
     * @return Account
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
     * Set username
     *
     * @param string $username
     * @return Account
     */
    public function setUsername($username)
    {
        $this->username = $username;
    
        return $this;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return Account
     */
    public function setPassword($password)
    {
        $this->password = $password;
    
        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Account
     */
    public function setEmail($email)
    {
        $this->email = $email;
    
        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set fullName
     *
     * @param string $fullName
     * @return Account
     */
    public function setFullName($fullName)
    {
        $this->fullName = $fullName;
    
        return $this;
    }

    /**
     * Get fullName
     *
     * @return string 
     */
    public function getFullName()
    {
        return $this->fullName;
    }

    /**
     * Set apiKey
     *
     * @param string $apiKey
     * @return Account
     */
    public function setApiKey($apiKey)
    {
        $this->apiKey = $apiKey;
    
        return $this;
    }

    /**
     * Get apiKey
     *
     * @return string 
     */
    public function getApiKey()
    {
        return $this->apiKey;
    }

    /**
     * Add orders
     *
     * @param \Api\RemoteBundle\Entity\OrderShop $orders
     * @return Account
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