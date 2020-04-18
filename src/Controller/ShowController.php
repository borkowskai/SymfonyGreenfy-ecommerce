<?php

namespace App\Controller;

use App\Entity\TVA;
use App\Entity\Size;
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

            $rep3 = $entityManager->getRepository(Size::class);

            // notez que findBy renverra toujours un array même s'il trouve 
            // qu'un objet
            $products = $rep->findAll();

            // apel a la TVA 
            $tva = $entityManager->getRepository(TVA::class)->findAll();
            $tvaValue = $tva[0]->getTVAvalue();

            
            for ( $i=0; $i<count($products); $i++){
                $priceExclVAT= $products[$i]->getPriceExclVAT();
                $priceVAT = $priceExclVAT + ($priceExclVAT*$tvaValue)/100.00;
                $priceVAT= number_format($priceVAT, 2, '.', '');
                $products[$i]->setPriceVAT($priceVAT);
            }
            
            // prends Couleurs
            $colors = $rep2->findAll();

            // prends Couleurs
            $sizes= $rep3->findAll();
            $vars = ['products' => $products, 'colors' => $colors,'sizes' => $sizes]; 
            return $this->render("show/shop.html.twig",$vars);
        }
        
    
}






