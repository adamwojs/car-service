<?php

namespace CarService\AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use DateTime;

/**
 * Encja reprezentująca grupę usług.
 *
 * @author Adam Wójs <adam@wojs.pl>
 * 
 * @ORM\Entity
 * @ORM\Table(name="services_groups")
 */
class ServiceGroup {
    
    /**
     * @var integer Identyfikator encji
     * 
     * @ORM\Id
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\GeneratedValue(strategy="AUTO")
     */           
    private $id;
    
    /**
     * @var string Nazwa grupy
     * 
     * @ORM\Column(name="name", type="string")
     */      
    private $name;    
    
    /**
     * @var string Opis usługi
     * 
     * @ORM\Column(name="description", type="text")
     */      
    private $description;    
    
    /**
     * @var ArrayCollection
     * 
     * @ORM\OneToMany(targetEntity="Service", mappedBy="group")
     */
    private $services;    
    
    /**
     * @var DateTime Stempel czasu reprezentujący datę utworzenia rekordu.
     * 
     * @ORM\Column(name="created_at", type="datetime")
     */       
    private $createdAt;
    
    /**
     * @var DateTime Stempel czasu reprezentujący datę ostatniej modyfikacji rekordu.
     * 
     * @ORM\Column(name="updated_at", type="datetime")
     */     
    private $updatedAt;
    
    public function __construct() {
        $this->createdAt = new DateTime();
        $this->updatedAt = new DateTime();
        $this->services  = new ArrayCollection();
    }    
    
    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getServices() {
        return $this->services;
    }

    public function getCreatedAt() {
        return $this->createdAt;
    }

    public function getUpdatedAt() {
        return $this->updatedAt;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function setServices(ArrayCollection $services) {
        $this->services = $services;
    }

    public function setCreatedAt(DateTime $createdAt) {
        $this->createdAt = $createdAt;
    }

    public function setUpdatedAt(DateTime $updatedAt) {
        $this->updatedAt = $updatedAt;
    }
    
    public function __toString() {
        return (string) $this->getName();
    }    
}
