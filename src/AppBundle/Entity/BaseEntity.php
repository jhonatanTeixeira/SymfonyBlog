<?php

namespace AppBundle\Entity;

use Gedmo\Mapping\Annotation\Timestampable;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\MappedSuperclass;

/**
 * @MappedSuperclass
 */
abstract class BaseEntity
{
    /**
     * @Column(type="datetime")
     * @Timestampable(on="create")
     * 
     * @var \DateTime
     */
    private $createdAt;
    
    /**
     * @Column(type="datetime")
     * @Timestampable(on="create")
     * 
     * @var \DateTime
     */
    private $updatedAt;
    
    
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    public function setCreatedAt(\DateTime $createdAt)
    {
        $this->createdAt = $createdAt;
        
        return $this;
    }

    public function setUpdatedAt(\DateTime $updatedAt)
    {
        $this->updatedAt = $updatedAt;
        
        return $this;
    }
}
