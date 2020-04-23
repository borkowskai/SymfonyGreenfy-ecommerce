<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CustomerOrderRepository")
 */
class CustomerOrder
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $numOrder;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateOrder;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\OrderLine", mappedBy="customerOrder")
     */
    private $listOfOrderLines;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Client", inversedBy="listOfCustomerOrders")
     */
    private $client;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\CompanyAddress", inversedBy="listOfCustomerOrders")
     */
    private $deliveryCustomerAddress;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\PaymentType", inversedBy="listOfCustomerOrders")
     */
    private $paymentType;

    public function __construct()
    {
        $this->listOfOrderLines = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumOrder(): ?string
    {
        return $this->numOrder;
    }

    public function setNumOrder(?string $numOrder): self
    {
        $this->numOrder = $numOrder;

        return $this;
    }

    public function getDateOrder(): ?\DateTimeInterface
    {
        return $this->dateOrder;
    }

    public function setDateOrder(?\DateTimeInterface $dateOrder): self
    {
        $this->dateOrder = $dateOrder;

        return $this;
    }

    /**
     * @return Collection|OrderLine[]
     */
    public function getListOfOrderLines(): Collection
    {
        return $this->listOfOrderLines;
    }

    public function addListOfOrderLine(OrderLine $listOfOrderLine): self
    {
        if (!$this->listOfOrderLines->contains($listOfOrderLine)) {
            $this->listOfOrderLines[] = $listOfOrderLine;
            $listOfOrderLine->setCustomerOrder($this);
        }

        return $this;
    }

    public function removeListOfOrderLine(OrderLine $listOfOrderLine): self
    {
        if ($this->listOfOrderLines->contains($listOfOrderLine)) {
            $this->listOfOrderLines->removeElement($listOfOrderLine);
            // set the owning side to null (unless already changed)
            if ($listOfOrderLine->getCustomerOrder() === $this) {
                $listOfOrderLine->setCustomerOrder(null);
            }
        }

        return $this;
    }

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): self
    {
        $this->client = $client;

        return $this;
    }

    public function getDeliveryCustomerAddress(): ?CompanyAddress
    {
        return $this->deliveryCustomerAddress;
    }

    public function setDeliveryCustomerAddress(?CompanyAddress $deliveryCustomerAddress): self
    {
        $this->deliveryCustomerAddress = $deliveryCustomerAddress;

        return $this;
    }

    public function getPaymentType(): ?PaymentType
    {
        return $this->paymentType;
    }

    public function setPaymentType(?PaymentType $paymentType): self
    {
        $this->paymentType = $paymentType;

        return $this;
    }
}
