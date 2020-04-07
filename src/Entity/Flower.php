<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FlowerRepository")
 */
class Flower
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=200)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $photo;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     */
    private $priceExclVAT;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     */
    private $priceVAT;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $reorderQuantity;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $reorderLevel;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Color", inversedBy="ListOfFlowers")
     */
    private $color;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Size", inversedBy="ListOfFlowers")
     */
    private $size;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\DailyInventory", mappedBy="flower")
     */
    private $dailyInventory;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\PlantType", inversedBy="ListOfFlowers")
     */
    private $plantType;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\OrderLine", mappedBy="flower")
     */
    private $ListOfOrderLines;

    public function __construct()
    {
        $this->dailyInventory = new ArrayCollection();
        $this->ListOfOrderLines = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(?string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    public function getPriceExclVAT(): ?string
    {
        return $this->priceExclVAT;
    }

    public function setPriceExclVAT(?string $priceExclVAT): self
    {
        $this->priceExclVAT = $priceExclVAT;

        return $this;
    }

    public function getPriceVAT(): ?string
    {
        return $this->priceVAT;
    }

    public function setPriceVAT(?string $priceVAT): self
    {
        $this->priceVAT = $priceVAT;

        return $this;
    }

    public function getReorderQuantity(): ?int
    {
        return $this->reorderQuantity;
    }

    public function setReorderQuantity(?int $reorderQuantity): self
    {
        $this->reorderQuantity = $reorderQuantity;

        return $this;
    }

    public function getReorderLevel(): ?int
    {
        return $this->reorderLevel;
    }

    public function setReorderLevel(?int $reorderLevel): self
    {
        $this->reorderLevel = $reorderLevel;

        return $this;
    }

    public function getColor(): ?Color
    {
        return $this->color;
    }

    public function setColor(?Color $color): self
    {
        $this->color = $color;

        return $this;
    }

    public function getSize(): ?Size
    {
        return $this->size;
    }

    public function setSize(?Size $size): self
    {
        $this->size = $size;

        return $this;
    }

    /**
     * @return Collection|DailyInventory[]
     */
    public function getDailyInventory(): Collection
    {
        return $this->dailyInventory;
    }

    public function addDailyInventory(DailyInventory $dailyInventory): self
    {
        if (!$this->dailyInventory->contains($dailyInventory)) {
            $this->dailyInventory[] = $dailyInventory;
            $dailyInventory->setFlower($this);
        }

        return $this;
    }

    public function removeDailyInventory(DailyInventory $dailyInventory): self
    {
        if ($this->dailyInventory->contains($dailyInventory)) {
            $this->dailyInventory->removeElement($dailyInventory);
            // set the owning side to null (unless already changed)
            if ($dailyInventory->getFlower() === $this) {
                $dailyInventory->setFlower(null);
            }
        }

        return $this;
    }

    public function getPlantType(): ?PlantType
    {
        return $this->plantType;
    }

    public function setPlantType(?PlantType $plantType): self
    {
        $this->plantType = $plantType;

        return $this;
    }

    /**
     * @return Collection|OrderLine[]
     */
    public function getListOfOrderLines(): Collection
    {
        return $this->ListOfOrderLines;
    }

    public function addListOfOrderLine(OrderLine $listOfOrderLine): self
    {
        if (!$this->ListOfOrderLines->contains($listOfOrderLine)) {
            $this->ListOfOrderLines[] = $listOfOrderLine;
            $listOfOrderLine->setFlower($this);
        }

        return $this;
    }

    public function removeListOfOrderLine(OrderLine $listOfOrderLine): self
    {
        if ($this->ListOfOrderLines->contains($listOfOrderLine)) {
            $this->ListOfOrderLines->removeElement($listOfOrderLine);
            // set the owning side to null (unless already changed)
            if ($listOfOrderLine->getFlower() === $this) {
                $listOfOrderLine->setFlower(null);
            }
        }

        return $this;
    }
}
