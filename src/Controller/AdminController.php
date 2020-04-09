<?php

namespace App\Controller;

use App\Entity\Flower;
use App\Form\ProductType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

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
                'action' => $this->generateUrl('add_product_form'),
                'method' => 'POST'
            ]
        );
        // 3. Analyse de l'objet Request
        $productForm->handleRequest($request);

        // 4. Vérification: on vient d'un submit ou pas?
        // si oui, on traite le formulaire et on remplit l'entité
        if ($productForm->isSubmitted() && $productForm->isValid()) {
        // Remplissage de l'entité avec les données du formulaire
        //   $livre = $formulaireLivre->getData(); // pas besoin, le submit remplit l'entite


            // traiter le formulaire

            // obtenir le fichier (objet)
            // obtenir le fichier (pas un "string" mais un objet de la class UploadedFile)
            $file= $product->getPhoto();

            // générer un nom unique de fichier
            // ex: 4342KL345K.txt
            $fileNameServer = md5(uniqid()) . "." . $file->guessExtension();
            // il va tous seul creer un folder
            $file ->move ('dossierFichiers', $fileNameServer);          

            // stocker l'objet dans la BD, ou faire update
            $entityManager = $this->getDoctrine()->getManager();
            // $product->setPhoto($fileNameServer);

            // lier l'objet avec la BD
            $entityManager->persist($product);
            // écrire l'objet dans la BD
            $entityManager->flush();

            return new Response("Product added"); 
            }
        else{
            return $this->render(
                '/admin/includes/add_product_form.html.twig',
                ['productForm' => $productForm->createView()]
            );
        }
    }
}
