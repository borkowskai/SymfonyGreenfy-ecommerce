<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ClientRepository")
 */
class Client
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $firstName;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $lastName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $login;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Order", mappedBy="client")
     */
    private $ListOfOrders;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\CompanyAddress", mappedBy="client")
     */
    private $addresses;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Wish", mappedBy="client")
     */
    private $ListOfWishes;

    public function __construct()
    {
        $this->ListOfOrders = new ArrayCollection();
        $this->addresses = new ArrayCollection();
        $this->ListOfWishes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getLogin(): ?string
    {
        return $this->login;
    }

    public function setLogin(string $login): self
    {
        $this->login = $login;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

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
            $listOfOrder->setClient($this);
        }

        return $this;
    }

    public function removeListOfOrder(Order $listOfOrder): self
    {
        if ($this->ListOfOrders->contains($listOfOrder)) {
            $this->ListOfOrders->removeElement($listOfOrder);
            // set the owning side to null (unless already changed)
            if ($listOfOrder->getClient() === $this) {
                $listOfOrder->setClient(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|CompanyAddress[]
     */
    public function getAddresses(): Collection
    {
        return $this->addresses;
    }

    public function addAddress(CompanyAddress $address): self
    {
        if (!$this->addresses->contains($address)) {
            $this->addresses[] = $address;
            $address->setClient($this);
        }

        return $this;
    }

    public function removeAddress(CompanyAddress $address): self
    {
        if ($this->addresses->contains($address)) {
            $this->addresses->removeElement($address);
            // set the owning side to null (unless already changed)
            if ($address->getClient() === $this) {
                $address->setClient(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Wish[]
     */
    public function getListOfWishes(): Collection
    {
        return $this->ListOfWishes;
    }

    public function addListOfWish(Wish $listOfWish): self
    {
        if (!$this->ListOfWishes->contains($listOfWish)) {
            $this->ListOfWishes[] = $listOfWish;
            $listOfWish->setClient($this);
        }

        return $this;
    }

    public function removeListOfWish(Wish $listOfWish): self
    {
        if ($this->ListOfWishes->contains($listOfWish)) {
            $this->ListOfWishes->removeElement($listOfWish);
            // set the owning side to null (unless already changed)
            if ($listOfWish->getClient() === $this) {
                $listOfWish->setClient(null);
            }
        }

        return $this;
    }
}
