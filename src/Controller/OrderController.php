<?php

namespace App\Controller;

use App\Entity\Flower;
use App\Entity\OrderLine;
use App\Entity\TVA;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class OrderController extends AbstractController
{
    /**
     * @Route("/order/add-orderLine", name="add-orderLine")
     */
    public function addOrderLine(Request $request){


        $id =$request->get('id');
        $entityManager = $this->getDoctrine()->getManager();
        $flower = $entityManager->getRepository(Flower::class)->findOneBy(array("id"=>$id));


        // apel a la TVA encore une fois pour eviter la maniplation sur le site 
        $tva = $entityManager->getRepository(TVA::class)->findAll();
        $tvaValue = $tva[0]->getTVAvalue();
       
        // // Création de l'entité OrderLine
        $orderLine = new OrderLine();
        // On lie le produit à l'ligne de l'ordre
        $orderLine->setFlower( $flower);
        $orderLine->setQuantity(1);
        $orderLine->setActualPriceExclVAT($flower->getPriceExclVAT());
        $priceVAT = ($flower->getPriceExclVAT()) + (($flower->getPriceExclVAT())*$tvaValue)/100.00;
        $orderLine->setActualPriceVAT($priceVAT);

        // // Étape 1 : On « persiste » l'entité
        $entityManager->persist($orderLine);

        // // Étape 2 : On déclenche l'enregistrement
        $entityManager->flush();

        return $this->render('front/shopping_cart.html.twig');
        }
}
