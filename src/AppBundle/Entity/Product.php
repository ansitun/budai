<?php

/**
 * Product entity.
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
 */
class Product
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $name;

    /**
     * @ORM\Column(type="text", length=65530, nullable=true)
     */
    private $description;

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
     * @ORM\Column(type="decimal", scale=2, precision=10, nullable=true)
     */
    private $price;
    
    /**
     * @ORM\Column(type="decimal", scale=2, precision=10, nullable=true)
     */
    private $discount_price;
    
    /**
     * @ORM\Column(type="decimal", scale=2, precision=10, nullable=true)
     */
    private $tax;
        
    /**
     * @ORM\Column(name="sku", type="string", length=100, nullable=false)
     */
    private $sku;
    
    /**
     * @ORM\Column(type="text", length=65530, nullable=true)
     */
    private $key_words;
    
    /**
     * @ORM\Column(type="string", nullable=true, length=511)
     */
    private $image_url;

    /**
     * @ORM\Column(type="string", nullable=true, length=511)
     */
    private $thumbnail_url;
    
    /**
     * @ORM\Column(type="boolean", nullable=false)
     */
    private $show_in_banner = false;

    /**
     * Constructor.
     */
    public function __construct()
    {
        
    }

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name.
     *
     * @param string $name
     *
     * @return ProductGroup
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description.
     *
     * @param string $description
     *
     * @return ProductGroup
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set status.
     *
     * @param \AppBundle\Entity\Status $status
     *
     * @return ProductGroup
     */
    public function setStatus(\AppBundle\Entity\Status $status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status.
     *
     * @return \AppBundle\Entity\Status
     */
    public function getStatus()
    {
        return $this->status;
    }

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
     * Set price
     *
     * @param string $price
     *
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
     * @return string
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set discountPrice
     *
     * @param string $discountPrice
     *
     * @return Product
     */
    public function setDiscountPrice($discountPrice)
    {
        $this->discount_price = $discountPrice;

        return $this;
    }

    /**
     * Get discountPrice
     *
     * @return string
     */
    public function getDiscountPrice()
    {
        return $this->discount_price;
    }

    /**
     * Set tax
     *
     * @param string $tax
     *
     * @return Product
     */
    public function setTax($tax)
    {
        $this->tax = $tax;

        return $this;
    }

    /**
     * Get tax
     *
     * @return string
     */
    public function getTax()
    {
        return $this->tax;
    }

    /**
     * Set sku
     *
     * @param string $sku
     *
     * @return Product
     */
    public function setSku($sku)
    {
        $this->sku = $sku;

        return $this;
    }

    /**
     * Get sku
     *
     * @return string
     */
    public function getSku()
    {
        return $this->sku;
    }

    /**
     * Set keyWords
     *
     * @param string $keyWords
     *
     * @return Product
     */
    public function setKeyWords($keyWords)
    {
        $this->key_words = $keyWords;

        return $this;
    }

    /**
     * Get keyWords
     *
     * @return string
     */
    public function getKeyWords()
    {
        return $this->key_words;
    }

    /**
     * Set imageUrl
     *
     * @param string $imageUrl
     *
     * @return Product
     */
    public function setImageUrl($imageUrl)
    {
        $this->image_url = $imageUrl;

        return $this;
    }

    /**
     * Get imageUrl
     *
     * @return string
     */
    public function getImageUrl()
    {
        return $this->image_url;
    }

    /**
     * Set thumbnailUrl
     *
     * @param string $thumbnailUrl
     *
     * @return Product
     */
    public function setThumbnailUrl($thumbnailUrl)
    {
        $this->thumbnail_url = $thumbnailUrl;

        return $this;
    }

    /**
     * Get thumbnailUrl
     *
     * @return string
     */
    public function getThumbnailUrl()
    {
        return $this->thumbnail_url;
    }

    /**
     * Set showInBanner
     *
     * @param boolean $showInBanner
     *
     * @return Product
     */
    public function setShowInBanner($showInBanner)
    {
        $this->show_in_banner = $showInBanner;

        return $this;
    }

    /**
     * Get showInBanner
     *
     * @return boolean
     */
    public function getShowInBanner()
    {
        return $this->show_in_banner;
    }
}
