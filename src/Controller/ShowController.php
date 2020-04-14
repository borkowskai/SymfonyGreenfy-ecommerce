<?php

namespace App\Controller;

use App\Entity\Color;
use App\Entity\Flower;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

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
         * @Route("/show/shop", name="show-shop")
         */
        public function showShop (){
            $entityManager = $this->getDoctrine()->getManager();
            $rep = $entityManager->getRepository(Flower::class);

            $rep2 = $entityManager->getRepository(Color::class);

            // notez que findBy renverra toujours un array même s'il trouve 
            // qu'un objet
            $products = $rep->findAll();
            $colors = $rep2->findAll();
            $vars = ['products' => $products, 'colors' => $colors]; 
            return $this->render("show/shop.html.twig",$vars);
        }


        // // /**
        // //  * @Route("/show/test", name="show-test")
        // //  */
        // //show color findAll
        // public function showColor (){
        //     $entityManager = $this->getDoctrine()->getManager();
        //     $rep = $entityManager->getRepository(Color::class);
            
        //     // notez que findBy renverra toujours un array même s'il trouve 
        //     // qu'un objet
        //     $colors = $rep->findAll();
        //     $vars2 = ['colors' => $colors]; 
        //     return $this->render("show/shop.html.twig",$vars2);
        // }
        
    
}






