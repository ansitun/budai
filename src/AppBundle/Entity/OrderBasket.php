<?php

/**
 * OrderBasket entity.
 *
 * @author Vinod Moahn
 *
 * @category Entity
 */
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 * @ORM\Table(name="OrderBasket")
 */
class OrderBasket
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @ORM\ManyToOne(targetEntity="Order")
     * @ORM\JoinColumn(name="order_id", referencedColumnName="id", nullable=false)
     */
    private $order;

    /**
     * @ORM\ManyToOne(targetEntity="Product")
     * @ORM\JoinColumn(name="product_id", referencedColumnName="id", nullable=false)
     */
    private $product;
    
    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $quantity;

    /**
     * @ORM\ManyToOne(targetEntity="Status")
     * @ORM\JoinColumn(name="status_id", referencedColumnName="id", nullable=false)
     */
    private $status;
    
    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $last_update_date_time;

    /**
     * @ORM\Column(type="datetime", nullable=false)
     */
    private $created_date_time;
    
    /**
     * @ORM\PreUpdate
     */
    public function onPreUpdate()
    {
        $this->last_update_date_time = new \DateTime();
    }

    /**
     * Set last_update_date_time.
     *
     * @param \DateTime $lastUpdateDateTime
     *
     * @return ProductGroup
     */
    public function setLastUpdateDateTime($lastUpdateDateTime)
    {
        $this->last_update_date_time = $lastUpdateDateTime;

        return $this;
    }

    /**
     * Get last_update_date_time.
     *
     * @return \DateTime
     */
    public function getLastUpdateDateTime()
    {
        return $this->last_update_date_time;
    }

    public function __toString()
    {
        return $this->name;
    }

    /**
     * Set created_date_time.
     *
     * @param \DateTime $createdDateTime
     *
     * @return ProductGroup
     */
    public function setCreatedDateTime($createdDateTime)
    {
        $this->created_date_time = $createdDateTime;

        return $this;
    }

    /**
     * Get created_date_time.
     *
     * @return \DateTime
     */
    public function getCreatedDateTime()
    {
        return $this->created_date_time;
    }

    /**
     * @ORM\PrePersist
     */
    public function onPrePersist()
    {
        $this->created_date_time = new \DateTime();
    }

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
     * Set quantity
     *
     * @param integer $quantity
     *
     * @return OrderBasket
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get quantity
     *
     * @return integer
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set order
     *
     * @param \AppBundle\Entity\Order $order
     *
     * @return OrderBasket
     */
    public function setOrder(\AppBundle\Entity\Order $order)
    {
        $this->order = $order;

        return $this;
    }

    /**
     * Get order
     *
     * @return \AppBundle\Entity\Order
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * Set product
     *
     * @param \AppBundle\Entity\Product $product
     *
     * @return OrderBasket
     */
    public function setProduct(\AppBundle\Entity\Product $product)
    {
        $this->product = $product;

        return $this;
    }

    /**
     * Get product
     *
     * @return \AppBundle\Entity\Product
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * Set status
     *
     * @param \AppBundle\Entity\Status $status
     *
     * @return OrderBasket
     */
    public function setStatus(\AppBundle\Entity\Status $status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return \AppBundle\Entity\Status
     */
    public function getStatus()
    {
        return $this->status;
    }
}
