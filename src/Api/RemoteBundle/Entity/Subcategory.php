<?php
/**
 * Created by JetBrains PhpStorm.
 * User: petre
 * Date: 9/8/13
 * Time: 2:49 PM
 * To change this template use File | Settings | File Templates.
 */

namespace Api\RemoteBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use \DateTime;

/**
 * @ORM\Entity(repositoryClass="Api\RemoteBundle\Entity\SubcategoryRepository")
 * @ORM\Table(name="subcategory")
 */
class Subcategory implements Serializable, EntityManager {

    public function __construct() {
        $this->products = new ArrayCollection();
    }

    /**
     * Create a new entity from array elements or update an existing one.
     * @param array $params The parameters that define an entity.
     * @param Subcategory $entity The entity that we want to update.
     * @return Subcategory The entity that was obtained.
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

        if (isset($params['category'])) {
            $entity->setCategory($params['category']);
        }

        return $entity;
    }

    /**
     * Transform an entity into an array.
     * @return array The array representing the fields of the entity.
     */
    public function toArray() {
        $data = array();

        $data['category'] = $this->getCategory();
        $data['id'] = $this->getId();
        $data['createdAt'] = $this->getCreatedAt();
        $data['updatedAt'] = $this->getUpdatedAt();
        $data['name'] = $this->getName();

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
     * @ORM\Column(type="datetime")
     */
    protected $createdAt;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $updatedAt;

    /**
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="subcategory")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     */
    protected $category;

    /**
     * @ORM\OneToMany(targetEntity="Product", mappedBy="subcategory")
     */
    protected $products;


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
     * @return Subcategory
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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Subcategory
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
     * @return Subcategory
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
     * Set category
     *
     * @param \Api\RemoteBundle\Entity\Category $category
     * @return Subcategory
     */
    public function setCategory(\Api\RemoteBundle\Entity\Category $category = null)
    {
        $this->category = $category;
    
        return $this;
    }

    /**
     * Get category
     *
     * @return \Api\RemoteBundle\Entity\Category 
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Add products
     *
     * @param \Api\RemoteBundle\Entity\Product $products
     * @return Subcategory
     */
    public function addProduct(\Api\RemoteBundle\Entity\Product $products)
    {
        $this->products[] = $products;
    
        return $this;
    }

    /**
     * Remove products
     *
     * @param \Api\RemoteBundle\Entity\Product $products
     */
    public function removeProduct(\Api\RemoteBundle\Entity\Product $products)
    {
        $this->products->removeElement($products);
    }

    /**
     * Get products
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProducts()
    {
        return $this->products;
    }
}