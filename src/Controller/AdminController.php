<?php

namespace App\Controller;

use App\Entity\Flower;
use App\Form\ProductType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
     * @Route("/admin/add-product-form", name="add_product_form")
     */
    public function addProductForm(Request $request)
    {
        // possible mais pas propre dans Symfony
        // $name = $request->get('name');
        // $name = $request->get('description');

        // 1. Création d'une entité vide
        $product = new Flower();
        // 2. Création du formulaire du type souhaité
        $productForm = $this->createForm(
            ProductType::class,
            $product,
            [
                'method' => 'POST',
                'action' => $this->generateUrl('add_product_form')
            ]
        );
        // 3. Analyse de l'objet Request
        $productForm->handleRequest($request);

        // 4. Vérification: on vient d'un submit ou pas?
        // si oui, on traite le formulaire et on remplit l'entité
        if ($productForm->isSubmitted() && $productForm->isValid()) {
            // Remplissage de l'entité avec les données du formulaire
            // $product = $productForm->getData();  // pas besoin, le submit remplit l'entite déjà

            // Rendu d'une vue où on affiche les données
            // Normalement on faire CRUD ici ou une autre opération...
            return $this->render(
                '/admin/includes/add_product_form.html.twig',
                ['product' => $product]
            );
        }
        else{
            return $this->render(
                '/admin/includes/add_product_form.html.twig',
                ['productForm' => $productForm->createView()]
            );
        }
    }
}
