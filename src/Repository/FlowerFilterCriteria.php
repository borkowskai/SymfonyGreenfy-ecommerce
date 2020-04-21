<?php

namespace App\Repository;

class FlowerFilterCriteria
{

    private $lowerPrice;

    private $higherPrice;

    private $colorIds;

    private $plantTypeIds;

    public function __construct()
    {
        $this->colorIds = [];
        $this->plantTypeIds = [];
    }

    public function getLowerPrice(): ?float
    {
        return $this->lowerPrice;
    }

    public function setLowerPrice(?float $lowerPrice): self
    {
        $this->lowerPrice = $lowerPrice;

        return $this;
    }

    public function getHigherPrice(): ?float
    {
        return $this->higherPrice;
    }

    public function setHigherPrice(?float $higherPrice): self
    {
        $this->higherPrice = $higherPrice;

        return $this;
    }

    public function getColorIds(): ?array
    {
        return $this->colorIds;
    }

    public function addColorId(?int $colorId): self
    {
        array_push($this->colorIds, $colorId);

        return $this;
    }

    public function getPlantTypeIds(): ?array
    {
        return $this->plantTypeIds;
    }

    public function addPlantTypeId(?int $plantTypeId): self
    {
        array_push($this->plantTypeIds, $plantTypeId);

        return $this;
    }
}