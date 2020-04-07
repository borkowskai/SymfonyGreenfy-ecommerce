<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PlantTypeRepository")
 */
class PlantType
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=200, nullable=true)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=200, nullable=true)
     */
    private $plantFamily;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Flower", mappedBy="plantType")
     */
    private $ListOfFlowers;

    public function __construct()
    {
        $this->ListOfFlowers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getPlantFamily(): ?string
    {
        return $this->plantFamily;
    }

    public function setPlantFamily(?string $plantFamily): self
    {
        $this->plantFamily = $plantFamily;

        return $this;
    }

    /**
     * @return Collection|Flower[]
     */
    public function getListOfFlowers(): Collection
    {
        return $this->ListOfFlowers;
    }

    public function addListOfFlower(Flower $listOfFlower): self
    {
        if (!$this->ListOfFlowers->contains($listOfFlower)) {
            $this->ListOfFlowers[] = $listOfFlower;
            $listOfFlower->setPlantType($this);
        }

        return $this;
    }

    public function removeListOfFlower(Flower $listOfFlower): self
    {
        if ($this->ListOfFlowers->contains($listOfFlower)) {
            $this->ListOfFlowers->removeElement($listOfFlower);
            // set the owning side to null (unless already changed)
            if ($listOfFlower->getPlantType() === $this) {
                $listOfFlower->setPlantType(null);
            }
        }

        return $this;
    }
}
