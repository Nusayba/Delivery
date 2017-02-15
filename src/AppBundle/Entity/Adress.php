<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Adress
 *
 * @ORM\Table(name="adress")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AdressRepository")
 */
class Adress
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="firstName", type="string", length=255)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="lastName", type="string", length=255)
     */
    private $lastName;

    /**
     * @var int
     *
     * @ORM\Column(name="number", type="integer")
     */
    private $number;

    /**
     * @var string
     *
     * @ORM\Column(name="street", type="string", length=255)
     */
    private $street;

    /**
     * @var string
     *
     * @ORM\Column(name="zipCode", type="string", length=255)
     */
    private $zipCode;

    /**
     * @var string
     *
     * @ORM\Column(name="country", type="string", length=255)
     */
    private $country;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=255)
     */
    private $city;
    
    /**
     * @ORM\OneToMany(targetEntity="Delivery", mappedBy="shippingAdress")
     * fr(expedition de commande)
     */
    private $deliveryShipping;
    
    /**
     * @ORM\OneToMany(targetEntity="Delivery", mappedBy="recipientAdress")
     * fr(reception de commande)
     */
    private $deliveryRecipient;
    
    /**
     * @ORM\OneToOne(targetEntity="User", mappedBy="adress")
     *
     */
    private $user;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     *
     * @return Adress
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     *
     * @return Adress
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set number
     *
     * @param integer $number
     *
     * @return Adress
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get number
     *
     * @return int
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set street
     *
     * @param string $street
     *
     * @return Adress
     */
    public function setStreet($street)
    {
        $this->street = $street;

        return $this;
    }

    /**
     * Get street
     *
     * @return string
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * Set zipCode
     *
     * @param string $zipCode
     *
     * @return Adress
     */
    public function setZipCode($zipCode)
    {
        $this->zipCode = $zipCode;

        return $this;
    }

    /**
     * Get zipCode
     *
     * @return string
     */
    public function getZipCode()
    {
        return $this->zipCode;
    }

    /**
     * Set country
     *
     * @param string $country
     *
     * @return Adress
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set city
     *
     * @param string $city
     *
     * @return Adress
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->deliveryShipping = new \Doctrine\Common\Collections\ArrayCollection();
        $this->deliveryRecipient = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Adress
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Add deliveryShipping
     *
     * @param \AppBundle\Entity\Delivery $deliveryShipping
     *
     * @return Adress
     */
    public function addDeliveryShipping(\AppBundle\Entity\Delivery $deliveryShipping)
    {
        $this->deliveryShipping[] = $deliveryShipping;

        return $this;
    }

    /**
     * Remove deliveryShipping
     *
     * @param \AppBundle\Entity\Delivery $deliveryShipping
     */
    public function removeDeliveryShipping(\AppBundle\Entity\Delivery $deliveryShipping)
    {
        $this->deliveryShipping->removeElement($deliveryShipping);
    }

    /**
     * Get deliveryShipping
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDeliveryShipping()
    {
        return $this->deliveryShipping;
    }

    /**
     * Add deliveryRecipient
     *
     * @param \AppBundle\Entity\Delivery $deliveryRecipient
     *
     * @return Adress
     */
    public function addDeliveryRecipient(\AppBundle\Entity\Delivery $deliveryRecipient)
    {
        $this->deliveryRecipient[] = $deliveryRecipient;

        return $this;
    }

    /**
     * Remove deliveryRecipient
     *
     * @param \AppBundle\Entity\Delivery $deliveryRecipient
     */
    public function removeDeliveryRecipient(\AppBundle\Entity\Delivery $deliveryRecipient)
    {
        $this->deliveryRecipient->removeElement($deliveryRecipient);
    }

    /**
     * Get deliveryRecipient
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDeliveryRecipient()
    {
        return $this->deliveryRecipient;
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return Adress
     */
    public function setUser(\AppBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
}
