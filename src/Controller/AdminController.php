<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin/add-product", name="add-product")
     */
    public function addProduct()
    {
        return $this->render('admin/add_product.html.twig');
    }
    /**
     * @Route("/admin/traitment_formulaire", name="traitement_formulaire")
     */
    public function addProductTraitement()
    {
        // TODO
        return null;
    }
}
