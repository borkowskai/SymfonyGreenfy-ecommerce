<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PaymentTypeRepository")
 */
class PaymentType
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $paymentType;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     */
    private $paymentLimit;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\CustomerOrder", mappedBy="paymentType")
     */
    private $listOfCustomerOrders;

    public function __construct()
    {
        $this->listOfCustomerOrders = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPaymentType(): ?string
    {
        return $this->paymentType;
    }

    public function setPaymentType(?string $paymentType): self
    {
        $this->paymentType = $paymentType;

        return $this;
    }

    public function getPaymentLimit(): ?string
    {
        return $this->paymentLimit;
    }

    public function setPaymentLimit(?string $paymentLimit): self
    {
        $this->paymentLimit = $paymentLimit;

        return $this;
    }

    /**
     * @return Collection|CustomerOrder[]
     */
    public function getListOfCustomerOrders(): Collection
    {
        return $this->listOfCustomerOrders;
    }

    public function addListOfCustomerOrder(CustomerOrder $listOfCustomerOrder): self
    {
        if (!$this->listOfCustomerOrders->contains($listOfCustomerOrder)) {
            $this->listOfCustomerOrders[] = $listOfCustomerOrder;
            $listOfCustomerOrder->setPaymentType($this);
        }

        return $this;
    }

    public function removeListOfCustomerOrder(CustomerOrder $listOfCustomerOrder): self
    {
        if ($this->listOfCustomerOrders->contains($listOfCustomerOrder)) {
            $this->listOfCustomerOrders->removeElement($listOfCustomerOrder);
            // set the owning side to null (unless already changed)
            if ($listOfCustomerOrder->getPaymentType() === $this) {
                $listOfCustomerOrder->setPaymentType(null);
            }
        }

        return $this;
    }
}
