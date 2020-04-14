<?php

namespace App\Controller;

use App\Entity\Flower;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

// SELECT: findOneBy
class ShowController extends AbstractController
{
    /**
     * @Route("/show/product", name="show-product")
     */
        public function exempleFindOneBy (){
            // obtenir le entity manager
            $entityManager = $this->getDoctrine()->getManager();
            // obtenir le repository
            $rep = $entityManager->getRepository(Flower::class);
            
            // on obtient l'objet, le filtre est envoyé sous la forme d'un array
            $product = $rep->findOneBy (array('name'=>'Lady\'s Slipper Orchid'));
            
            // on stocke le résultat dans un array associatif 
            // pour l'envoyer à la vue comme d'habitude
            $vars = ['product'=> $product];
            
            // on renvoie l'objet à la vue, rien ne change ici
            return $this->render ("/show/product.html.twig", $vars);
        }

        /**
         * @Route("/show/shop", name="show-product")
         */
        public function showShop (){
            $entityManager = $this->getDoctrine()->getManager();
            $rep = $entityManager->getRepository(Flower::class);
            
            // notez que findBy renverra toujours un array même s'il trouve 
            // qu'un objet
            $products = $rep->findAll();
            $vars = ['products' => $products]; 
            return $this->render("show/shop.html.twig",$vars);
        }
        
    
}






