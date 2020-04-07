<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ModelsController extends AbstractController
{
    /**
     * @Route("/models", name="models")
     */
    public function index()
    {
        return $this->render('models/index.html.twig', [
            'controller_name' => 'ModelsController',
        ]);
    }
}
