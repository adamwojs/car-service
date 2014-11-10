<?php

namespace CarService\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use DateTime;

/**
 * Encja reprezentująca opinie klienta.
 *
 * @author Adam Wójs <adam@wojs.pl>
 * 
 * @ORM\Entity
 * @ORM\Table(name="testimonials")
 */
class Testimonial {

    const STATUS_VERIFICATION = 'verification';
    const STATUS_REJECTED = 'rejected';
    const STATUS_ACCEPTED = 'acepted';
    
    /**
     * @var integer Identyfikator encji
     * 
     * @ORM\Id
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\GeneratedValue(strategy="AUTO")
     */            
    private $id;

    /**
     * @var string Treść referencji
     * 
     * @ORM\Column(name="testimonial", type="text")
     */    
    private $testimonial;

    /**
     * @var string Podpis klienta
     * 
     * @ORM\Column(name="customer_name", type="string")
     */    
    private $customerName;

    /**
     * @var string Adres e-mail klienta.
     * 
     * @ORM\Column(name="customer_email", type="string")
     */    
    private $customerEmail;
    
    /**
     * @var string Status referencji
     * 
     * @ORM\Column(name="status", type="string", length=16)
     */        
    private $status;
    
    /**
     * @var DateTime Stempel czasu reprezentujący datę utworzenia referencji.
     * 
     * @ORM\Column(name="created_at", type="datetime")
     */        
    private $createdAt;
    
    /**
     * @var DateTime Stempel czasu reprezentujący datę ostatniej modyfikacji referencji.
     * 
     * @ORM\Column(name="updated_at", type="datetime")
     */        
    private $updatedAt;
    
    public function __construct() {
        $this->status = self::STATUS_VERIFICATION;
        $this->createdAt = new DateTime();
        $this->updatedAt = new DateTime();
    }
    
    public function getId() {
        return $this->id;
    }

    public function getTestimonial() {
        return $this->testimonial;
    }

    public function getCustomerName() {
        return $this->customerName;
    }

    public function getCustomerEmail() {
        return $this->customerEmail;
    }

    public function getStatus() {
        return $this->status;
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

    public function setTestimonial($testimonial) {
        $this->testimonial = $testimonial;
    }

    public function setCustomerName($customerName) {
        $this->customerName = $customerName;
    }

    public function setCustomerEmail($customerEmail) {
        $this->customerEmail = $customerEmail;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function setCreatedAt(DateTime $createdAt) {
        $this->createdAt = $createdAt;
    }

    public function setUpdatedAt(DateTime $updatedAt) {
        $this->updatedAt = $updatedAt;
    }
}
