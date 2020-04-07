<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    /**
     * @Route("/add-product", name="add-product")
     */
    public function addProduct()
    {
        return $this->render('admin/add_product.html.twig');
    }
}
