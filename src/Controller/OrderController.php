<?php

namespace App\Controller;

use App\Entity\Flower;
use App\Entity\OrderLine;
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
        $em = $this->getDoctrine()->getManager();
        $flower = $em->getRepository(Flower::class)->findOneBy(array("id"=>$id));

        // // // $flower->getPhoto();
        // // // $flower->getPriceExclVAT();
        // // $flower->getId();
       
        // // Création de l'entité OrderLine
        $orderLine = new OrderLine();
        // On lie le produit à l'ligne de l'ordre
        $orderLine->setFlower( $flower);
        $orderLine->setQuantity(1);
        $orderLine->setActualPriceExclVAT($flower->getPriceExclVAT());


        // // Étape 1 : On « persiste » l'entité
        $em->persist($orderLine);

        // // Étape 2 : On déclenche l'enregistrement
        $em->flush();

        return $this->render('front/shopping_cart.html.twig');
        }
}
