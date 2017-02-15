<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Delivery
 *
 * @ORM\Table(name="delivery")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DeliveryRepository")
 */
class Delivery
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
     * @ORM\Column(name="statement", type="string", length=255)
     * fr(etat de la commande)
     * valeursAcceptées(enAttente, enCours, Livré)
     */
    private $statement;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateHoursDelivery", type="datetime")
     * fr(date et heure de livraison)
     */
    private $dateHoursDelivery;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateHoursOrder", type="datetime")
     * fr(date et heure de la commande)
     */
    private $dateHoursOrder;

    /**
     * @var float
     *
     * @ORM\Column(name="nbKm", type="float")
     */
    private $nbKm;
    
    /**
     * @ORM\ManyToOne(targetEntity="Adress", inversedBy="deliveryShipping")
     * @ORM\JoinColumn(name="adress_delivery_shipping")
     * fr(adresse d'expédition)
     */
    private $shippingAdress;
    
    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="deliveries")
     * @ORM\JoinColumn(name="delivery_deliveryman")
     * fr(livreur)
     */
    private $deliveryMan;
    
    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="orders")
     * @ORM\JoinColumn(name="user_order")
     * fr(client)
     */
    private $customer;
    
    /**
     * @ORM\ManyToOne(targetEntity="Adress", inversedBy="deliveryRecipient")
     * @ORM\JoinColumn(name="recipient_adress_delivery")
     * fr(adresse de destination)
     */
    private $recipientAdress;


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
     * Set statement
     *
     * @param string $statement
     *
     * @return Delivery
     */
    public function setStatement($statement)
    {
        $this->statement = $statement;

        return $this;
    }

    /**
     * Get statement
     *
     * @return string
     */
    public function getStatement()
    {
        return $this->statement;
    }

    /**
     * Set dateHoursDelivery
     *
     * @param \DateTime $dateHoursDelivery
     *
     * @return Delivery
     */
    public function setDateHoursDelivery($dateHoursDelivery)
    {
        $this->dateHoursDelivery = $dateHoursDelivery;

        return $this;
    }

    /**
     * Get dateHoursDelivery
     *
     * @return \DateTime
     */
    public function getDateHoursDelivery()
    {
        return $this->dateHoursDelivery;
    }

    /**
     * Set dateHoursOrder
     *
     * @param \DateTime $dateHoursOrder
     *
     * @return Delivery
     */
    public function setDateHoursOrder($dateHoursOrder)
    {
        $this->dateHoursOrder = $dateHoursOrder;

        return $this;
    }

    /**
     * Get dateHoursOrder
     *
     * @return \DateTime
     */
    public function getDateHoursOrder()
    {
        return $this->dateHoursOrder;
    }

    /**
     * Set nbKm
     *
     * @param float $nbKm
     *
     * @return Delivery
     */
    public function setNbKm($nbKm)
    {
        $this->nbKm = $nbKm;

        return $this;
    }

    /**
     * Get nbKm
     *
     * @return float
     */
    public function getNbKm()
    {
        return $this->nbKm;
    }

    /**
     * Set shippingAdress
     *
     * @param \AppBundle\Entity\Adress $shippingAdress
     *
     * @return Delivery
     */
    public function setShippingAdress(\AppBundle\Entity\Adress $shippingAdress = null)
    {
        $this->shippingAdress = $shippingAdress;

        return $this;
    }

    /**
     * Get shippingAdress
     *
     * @return \AppBundle\Entity\Adress
     */
    public function getShippingAdress()
    {
        return $this->shippingAdress;
    }

    /**
     * Set deliveryMan
     *
     * @param \AppBundle\Entity\User $deliveryMan
     *
     * @return Delivery
     */
    public function setDeliveryMan(\AppBundle\Entity\User $deliveryMan = null)
    {
        $this->deliveryMan = $deliveryMan;

        return $this;
    }

    /**
     * Get deliveryMan
     *
     * @return \AppBundle\Entity\User
     */
    public function getDeliveryMan()
    {
        return $this->deliveryMan;
    }

    /**
     * Set customer
     *
     * @param \AppBundle\Entity\User $customer
     *
     * @return Delivery
     */
    public function setCustomer(\AppBundle\Entity\User $customer = null)
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * Get customer
     *
     * @return \AppBundle\Entity\User
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * Set recipientAdress
     *
     * @param \AppBundle\Entity\Adress $recipientAdress
     *
     * @return Delivery
     */
    public function setRecipientAdress(\AppBundle\Entity\Adress $recipientAdress = null)
    {
        $this->recipientAdress = $recipientAdress;

        return $this;
    }

    /**
     * Get recipientAdress
     *
     * @return \AppBundle\Entity\Adress
     */
    public function getRecipientAdress()
    {
        return $this->recipientAdress;
    }
}
