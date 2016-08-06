<?php

/**
 * Status entity.
 *
 * @author Vinod Mohan
 *
 * @category Entity
 */
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Index as Index;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Entity\Repository\StatusRepository")
 * @ORM\Table(indexes={@Index(name="status_idx", columns={"string_value", "value"})})
 * @ORM\HasLifecycleCallbacks()
 * @ORM\Table(name="Status")
 */
class Status
{
    /**
     * @ORM\Id
     * @ORM\Column(type="smallint")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100, nullable=false)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=4, nullable=false)
     */
    private $value;

    /**
     * @ORM\Column(type="string", length=20, nullable=false)
     */
    private $string_value;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $last_update_date_time;

    /**
     * @ORM\Column(type="datetime", nullable=false)
     */
    private $created_date_time;

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
     * @return GeneralState
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
     * Set value.
     *
     * @param int $value
     *
     * @return GeneralState
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value.
     *
     * @return int
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set string_value.
     *
     * @param string $stringValue
     *
     * @return GeneralState
     */
    public function setStringValue($stringValue)
    {
        $this->string_value = $stringValue;

        return $this;
    }

    /**
     * Get string_value.
     *
     * @return string
     */
    public function getStringValue()
    {
        return $this->string_value;
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
     * @return GeneralState
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

    /**
     * Set created_date_time.
     *
     * @param \DateTime $createdDateTime
     *
     * @return GeneralState
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
