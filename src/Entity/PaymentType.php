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
     * @ORM\OneToMany(targetEntity="App\Entity\Order", mappedBy="payment")
     */
    private $ListOfOrders;

    public function __construct()
    {
        $this->ListOfOrders = new ArrayCollection();
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
     * @return Collection|Order[]
     */
    public function getListOfOrders(): Collection
    {
        return $this->ListOfOrders;
    }

    public function addListOfOrder(Order $listOfOrder): self
    {
        if (!$this->ListOfOrders->contains($listOfOrder)) {
            $this->ListOfOrders[] = $listOfOrder;
            $listOfOrder->setPayment($this);
        }

        return $this;
    }

    public function removeListOfOrder(Order $listOfOrder): self
    {
        if ($this->ListOfOrders->contains($listOfOrder)) {
            $this->ListOfOrders->removeElement($listOfOrder);
            // set the owning side to null (unless already changed)
            if ($listOfOrder->getPayment() === $this) {
                $listOfOrder->setPayment(null);
            }
        }

        return $this;
    }
}
