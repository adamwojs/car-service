<?php

namespace CarService\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use DateTime;

/**
 * Encja reprezentująca usługę.
 *
 * @author Adam Wójs <adam@wojs.pl>
 * 
 * @ORM\Entity
 * @ORM\Table(name="services")
 */
class Service {
    
    /**
     * @var integer Identyfikator encji
     * 
     * @ORM\Id
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\GeneratedValue(strategy="AUTO")
     */           
    private $id;
    
    /**
     * @var string Nazwa usługi
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
     * @var string Treść referencji
     * 
     * @ORM\Column(name="price", type="decimal", precision=8, scale=2)
     */      
    private $price;
    
    /**
     * @var ServiceGroup
     * 
     * @ORM\ManyToOne(targetEntity="ServiceGroup", inversedBy="services")
     * @ORM\JoinColumn(name="group_id", referencedColumnName="id")
     */
    private $group;    
    
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

    public function getPrice() {
        return $this->price;
    }

    public function getGroup() {
        return $this->group;
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

    public function setPrice($price) {
        $this->price = $price;
    }

    public function setGroup(ServiceGroup $group) {
        $this->group = $group;
    }

    public function setCreatedAt(DateTime $createdAt) {
        $this->createdAt = $createdAt;
    }

    public function setUpdatedAt(DateTime $updatedAt) {
        $this->updatedAt = $updatedAt;
    }
}
