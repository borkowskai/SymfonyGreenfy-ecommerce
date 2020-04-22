<?php

namespace App\Controller;

use App\Entity\Flower;
use App\Entity\OrderLine;
use App\Service\ServiceTVA;
use App\Repository\FlowerRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class OrderController extends AbstractController
{
    // /**
    //  * @Route("/order/add-orderLine", name="add-orderLine")
    //  */
    // public function addOrderLine(Request $request){


    //     $id =$request->get('id');
    //     $entityManager = $this->getDoctrine()->getManager();
    //     $flower = $entityManager->getRepository(Flower::class)->findOneBy(array("id"=>$id));
       
    //     // // Création de l'entité OrderLine
    //     $orderLine = new OrderLine();
    //     // On lie le produit à l'ligne de l'ordre
    //     $orderLine->setFlower( $flower);
    //     $orderLine->setQuantity(1);
    //     $orderLine->setActualPriceExclVAT($flower->getPriceExclVAT());
    //    // $vatValue = $serviceVat->calculateVAT();
    //    // $priceVAT = ($flower->getPriceExclVAT()) + (($flower->getPriceExclVAT())* ($vatValue))/100.00;
    //     // $orderLine->setActualPriceVAT($priceVAT);


    //     // // Étape 1 : On « persiste » l'entité
    //     $entityManager->persist($orderLine);

    //     // // Étape 2 : On déclenche l'enregistrement
    //     $entityManager->flush();

    //     return $this->render('session/check_out.html.twig');
    //     }


    public function addOrderLine(SessionInterface $session, FlowerRepository $productRepo, ServiceTVA $serviceVat){

        $orderLine = $session->get('orderLine', []);
      
        $entityManager = $this->getDoctrine()->getManager();

        foreach ($orderLine as $id => $quantity) {
            $product = $productRepo->find($id);
            // // Création de l'entité OrderLine
            $orderLineBD = new OrderLine();
            $orderLineBD -> setFlower($product);
            $priceExclVAT = $product->getPriceExclVAT();
            $orderLineBD -> setActualPriceExclVAT ( $priceExclVAT);
            $orderLineBD -> setQuantity($quantity);
            $vatValue = $serviceVat->calculateVAT();
            $priceVAT =   $priceExclVAT + ( $priceExclVAT*$vatValue)/100.00;
            $orderLineBD -> setActualPriceVAT ($priceVAT);
            // // Étape 1 : On « persiste » l'entité
            $entityManager->persist($orderLineBD);
            // // Étape 2 : On déclenche l'enregistrement
            }
        $entityManager->flush();
        return $this->render('order/check_out.html.twig');
    }

    public function addAddress(Request $request)
    {

        $entityManager = $this->getDoctrine()->getManager();
        $address = new CompanyAddress();
        // 2. Création du formulaire du type souhaité
        $form = $this->createForm(
            CompanyAddressType::class,
            $address,
            [
                'action' => $this->generateUrl('add_address'),
                'method' => 'POST'
            ]
        );
        // 3. Analyse de l'objet Request
        $form->handleRequest($request);

        // 4. Vérification: on vient d'un submit ou pas?
        // si oui, on traite le formulaire et on remplit l'entité
        if ($form->isSubmitted() && $form->isValid()) {
     
            // lier l'objet avec la BD
            $entityManager->persist($address);
            // écrire l'objet dans la BD
            $entityManager->flush();

            return new Response("address added"); 
            }
        else{
            return $this->render(
                '/admin/add_product.html.twig',
                ['form' => $form->createView()]
            );
        }
    }
}
