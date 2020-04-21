<?php

namespace App\Controller;

use App\Entity\OrderLine;
use App\Repository\FlowerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;




class SessionController extends AbstractController
{

    /**
     * @Route("/session/add/{id}", name="cart_add")
     */
    public function add($id, SessionInterface $session, FlowerRepository $productRepo){
        $orderLine = $session->get('orderLine', []);
        if(!empty($orderLine[$id])){
            $orderLine[$id] ++;
        }
        else{        
            $orderLine[$id] = 1;
        }
        $session->set('orderLine', $orderLine);

        $orderLine = $session->get('orderLine', []);

        $orderLineWithData = [];

        foreach ($orderLine as $id => $quantity) {
            $product = $productRepo->find($id);

            //needed to enter in every line because json doesn't have acces to methods //like twig
            $name = $product->getName();
            $photo = $product->getPhoto();
            $priceExclVAT = $product->getPriceExclVAT();
            //$priceVAT = TODO method service 

            $orderLineWithData[] = [
                'product_name' => $name,
                'quantity' => $quantity,
                'photo' => $photo,
                'priceExclVAT' => $priceExclVAT
            ];
        }

        $orderLineWithData = json_encode($orderLineWithData);

        // $obj = new \stdClass;
        // $obj->name = 'Iza';
        // $obj->lastname = 'Nowak';
        // $obj->age = 18;

        // $json = json_encode($obj);

        return new Response($orderLineWithData);
        //return $this->redirectToRoute('shopping_cart');
    }

    /**
     * @Route("/session/shopping_cart", name="shopping_cart")
     */
    public function shoppingCart (SessionInterface $session, FlowerRepository $productRepo)
    {
        $orderLine = $session->get('orderLine', []);

        $orderLineWithData = [];

        foreach ($orderLine as $id => $quantity) {
            $orderLineWithData[] = [
                'product' => $productRepo->find($id),
                'quantity' => $quantity
            ];
        }

        $total = 0;
        $count = 0;

        foreach ($orderLineWithData as $item) {
            $totalOrderLine = $item['product']->getPriceExclVAT() * $item['quantity'];
            $total += $totalOrderLine;
            $count ++;
        }

        return $this->render('session/shopping_cart.html.twig', [
            'items' => $orderLineWithData,
            'total' => $total,
            'counter' => $count
            ]);
    }

    //needed to show while refresh the website => send the data to main.js
    /**
     * @Route("/all-basket", name="all_basket")
     */

     public function allBasket(SessionInterface $session, FlowerRepository $productRepo){
        $orderLine = $session->get('orderLine', []);

        $orderLineWithData = [];

        foreach ($orderLine as $id => $quantity) {
            $product = $productRepo->find($id);

            $name = $product->getName();
            $photo = $product->getPhoto();
            $priceExclVAT = $product->getPriceExclVAT();
            //$priceVAT = TODO method service 

            $orderLineWithData[] = [
                'product_name' => $name,
                'quantity' => $quantity,
                'photo' => $photo,
                'priceExclVAT' => $priceExclVAT
                
            ];
        }

        $orderLineWithData = json_encode($orderLineWithData);

        return new Response($orderLineWithData);
     }


    /**
     * @Route("/session/remove/{id}", name="cart_remove")
     */
    public function remove($id, SessionInterface $session){
        $orderLine = $session->get('orderLine', []);
        if(!empty($orderLine[$id])){
            unset($orderLine[$id]);
        }
        $session->set('orderLine', $orderLine);

        return $this->redirectToRoute('shopping_cart');
    }


     /**
     * @Route("/session/add_orderLine", name="add_orderLine")
     */
    public function addOrderLine(SessionInterface $session, FlowerRepository $productRepo){


        $orderLine = $session->get('orderLine', []);

        
        $entityManager = $this->getDoctrine()->getManager();

        foreach ($orderLine as $id => $quantity) {
            $product = $productRepo->find($id);

            // // Création de l'entité OrderLine
            $orderLineBD = new OrderLine();
            $orderLineBD -> setFlower($product);
            $orderLineBD -> setActualPriceExclVAT ( $product->getPriceExclVAT());
            $orderLineBD -> setQuantity($quantity);
            //$priceVAT = TODO method service 

            // // Étape 1 : On « persiste » l'entité
            $entityManager->persist($orderLineBD);

            // // Étape 2 : On déclenche l'enregistrement
            

            }

            $entityManager->flush();
            return $this->render('session/check_out.html.twig');
        }

    //  /**
    //  * @Route("/session/qtyUpdate/{id}{quantity}", name="cart_qtyUpdate")
    //  */
    // public function qtyUpdate($id, $quantity, SessionInterface $session, FlowerRepository $productRepo){
    //     $orderLine = $session->get('orderLine', []);
        
    //     foreach ($orderLine as $id => $quantity) {
    //         $orderLineWithData[] = [
    //             'product' => $productRepo->find($id),
    //             'quantity' => $quantity
    //         ];
    //     }
    //     $session->set('orderLine', $orderLine);

    //     return $this->redirectToRoute('shopping_cart');
    // }

















    
     /**
     * @Route("/session/qtyUpdate/{id}{newQty}", name="cart_qtyUpdate")
     */
    public function qtyUpdate($id, $newQty, SessionInterface $session)
    {
        // $id =$request->get('id');
        // $newVal =$request->get('newVal');

        $orderLine = $session->get('orderLine', []);
        $orderLine[$id] = $newQty;

        $session->set('orderLine', $orderLine);

        new Response(json_encode($orderLine));
        // return $this->redirectToRoute('shopping_cart');
    }


}