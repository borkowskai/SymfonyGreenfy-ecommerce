<?php

namespace App\Controller;

// use App\Entity\TVA;
use App\Entity\Size;
use App\Entity\Color;
use App\Entity\Flower;
use App\Service\ServiceTVA;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

// SELECT: findOneBy
class ShowController extends AbstractController
{
    /**
     * @Route("/show/product", name="show-product")
     */
        public function exempleFindOneBy (Request $request, ServiceTVA $serviceVat){

            $id =$request->get('id');
            $entityManager = $this->getDoctrine()->getManager();
            $product = $entityManager->getRepository(Flower::class)->findOneBy(array("id"=>$id));

            // // apel a la TVA  => modifier par un service
            // $vat = $entityManager->getRepository(TVA::class)->findAll();
            // $vatValue = $vat[0]->getTVAvalue();
          
                $priceExclVAT= $product->getPriceExclVAT();
                $vatValue = $serviceVat->calculateVAT();
                $priceVAT = $priceExclVAT + ($priceExclVAT*$vatValue)/100.00;
                $priceVAT= number_format($priceVAT, 2, '.', '');
                $product->setPriceVAT($priceVAT);

            $vars = ['product' => $product]; 
            return $this->render("/show/product.html.twig",$vars);
        }

        /**
         * @Route("/show/shop", name="show-shop")
         */
        public function showShop (){
            $entityManager = $this->getDoctrine()->getManager();
            $rep = $entityManager->getRepository(Flower::class);

            $rep2 = $entityManager->getRepository(Color::class);

            $rep3 = $entityManager->getRepository(Size::class);

            // Renvoie un array d'objets contenant tous les éléments du tableau
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
            return $this->render("/show/shop.html.twig",$vars);
        }

        // /**
        //  * @Route("/client/recherche/traitement/ajax", options={"expose"=true}, name="traitement_rechercheClientAjax")
        //  */
        // public function rechercheClientAjax(Request $request)
        // {

        //     $clientId = $request->request->get('clientId');
            
        //         $em = $this->getDoctrine()->getManager();
        //         $query = $em->createQuery ('SELECT photo,client FROM App\Entity\Photo photo JOIN photo.client client WHERE client.id = :input');
        //         $query->setParameter('input', $clientId );
        
        //         $client = $query->getArrayResult();

        //         return new JsonResponse($client);
        // }
    
}






