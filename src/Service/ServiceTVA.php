<?php

namespace App\Service;

use App\Entity\TVA;
use Doctrine\ORM\EntityManagerInterface;

class ServiceTVA{

    protected $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function calculateVAT() {
        
            $vat = $this->entityManager->getRepository(TVA::class)->findAll();
            $vatValue = $vat[0]->getTVAvalue();
            return $vatValue;
    }
}