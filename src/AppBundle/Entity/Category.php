<?php

/**
 * Category entity.
 *
 * @author Vinod Moahn
 *
 * @category Entity
 */
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Entity\Repository\CategoryRepository")
 * @ORM\HasLifecycleCallbacks
 * @ORM\Table(name="Category")
 */
class Category
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
}
