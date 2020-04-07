<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DailyInventoryRepository")
 */
class DailyInventory
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $dailyLevel;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateOfInventory;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Flower", inversedBy="dailyInventory")
     */
    private $flower;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDailyLevel(): ?int
    {
        return $this->dailyLevel;
    }

    public function setDailyLevel(?int $dailyLevel): self
    {
        $this->dailyLevel = $dailyLevel;

        return $this;
    }

    public function getDateOfInventory(): ?\DateTimeInterface
    {
        return $this->dateOfInventory;
    }

    public function setDateOfInventory(?\DateTimeInterface $dateOfInventory): self
    {
        $this->dateOfInventory = $dateOfInventory;

        return $this;
    }

    public function getFlower(): ?Flower
    {
        return $this->flower;
    }

    public function setFlower(?Flower $flower): self
    {
        $this->flower = $flower;

        return $this;
    }
}
