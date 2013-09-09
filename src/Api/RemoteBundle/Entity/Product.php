<?php
/**
 * Created by JetBrains PhpStorm.
 * User: petre
 * Date: 9/8/13
 * Time: 4:22 PM
 * To change this template use File | Settings | File Templates.
 */

namespace Api\RemoteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Api\RemoteBundle\Entity\ProductRepository")
 * @ORM\Table(name="product")
 */
class Product implements Serializable, EntityManager {

    /**
     * Create a new entity from array elements or update an existing one.
     * @param array $params The parameters that define an entity.
     * @param Product $entity The entity that we want to update.
     * @return Product The entity that was obtained.
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

        if (isset($params['name'])) {
            $entity->setName($params['name']);
        }

        if (isset($params['code'])) {
            $entity->setCode($params['code']);
        }

        if (isset($params['stock'])) {
            $entity->setStock($params['stock']);
        }

        if (isset($params['price'])) {
            $entity->setPrice($params['price']);
        }

        if (isset($params['description'])) {
            $entity->setDescription($params['description']);
        }

        if (isset($params['pictureUrl'])) {
            $entity->setPictureUrl($params['pictureUrl']);
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
        $data['name'] = $this->getName();
        $data['code'] = $this->getCode();
        $data['stock'] = $this->getStock();
        $data['price'] = $this->getPrice();
        $data['description'] = $this->getDescription();
        $data['pictureUrl'] = $this->getPictureUrl();

        return $data;
    }

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=60)
     */
    protected $name;

    /**
     * @ORM\Column(type="string", length=60)
     */
    protected $code;

    /**
     * @ORM\Column(type="integer")
     */
    protected $stock;

    /**
     * @ORM\Column(type="decimal", scale=2)
     */
    protected $price;

    /**
     * @ORM\Column(type="text")
     */
    protected $description;

    /**
     * @ORM\Column(type="text")
     */
    protected $pictureUrl;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $createdAt;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $updatedAt;

    /**
     * @ORM\ManyToOne(targetEntity="Subcategory", inversedBy="products")
     * @ORM\JoinColumn(name="subcategory_id", referencedColumnName="id")
     */
    protected $subcategory;

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
     * @return Product
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
     * Set code
     *
     * @param string $code
     * @return Product
     */
    public function setCode($code)
    {
        $this->code = $code;
    
        return $this;
    }

    /**
     * Get code
     *
     * @return string 
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set stock
     *
     * @param integer $stock
     * @return Product
     */
    public function setStock($stock)
    {
        $this->stock = $stock;
    
        return $this;
    }

    /**
     * Get stock
     *
     * @return integer 
     */
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * Set price
     *
     * @param float $price
     * @return Product
     */
    public function setPrice($price)
    {
        $this->price = $price;
    
        return $this;
    }

    /**
     * Get price
     *
     * @return float 
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Product
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set pictureUrl
     *
     * @param string $pictureUrl
     * @return Product
     */
    public function setPictureUrl($pictureUrl)
    {
        $this->pictureUrl = $pictureUrl;
    
        return $this;
    }

    /**
     * Get pictureUrl
     *
     * @return string 
     */
    public function getPictureUrl()
    {
        return $this->pictureUrl;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Product
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
     * @return Product
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
     * Set subcategory
     *
     * @param \Api\RemoteBundle\Entity\Subcategory $subcategory
     * @return Product
     */
    public function setSubcategory(\Api\RemoteBundle\Entity\Subcategory $subcategory = null)
    {
        $this->subcategory = $subcategory;
    
        return $this;
    }

    /**
     * Get subcategory
     *
     * @return \Api\RemoteBundle\Entity\Subcategory 
     */
    public function getSubcategory()
    {
        return $this->subcategory;
    }
}