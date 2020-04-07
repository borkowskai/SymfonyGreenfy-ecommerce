<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TVARepository")
 */
class TVA
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     */
    private $TVAvalue;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTVAvalue(): ?string
    {
        return $this->TVAvalue;
    }

    public function setTVAvalue(?string $TVAvalue): self
    {
        $this->TVAvalue = $TVAvalue;

        return $this;
    }
}
