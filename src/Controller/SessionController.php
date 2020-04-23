<?php

namespace App\Controller;

use App\Repository\FlowerRepository;
use App\Service\ServiceTVA;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;




class SessionController extends AbstractController
{

    /**
     * @Route("/session/add/{id}", name="cart_add")
     */
    public function add($id, SessionInterface $session, FlowerRepository $productRepo, ServiceTVA $serviceVat){
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
            $vatValue = $serviceVat->calculateVAT();
            $priceVAT = $priceExclVAT + ($priceExclVAT*$vatValue)/100.00;
            // $product->setPriceVAT($priceVAT);

            $orderLineWithData[] = [
                'product_name' => $name,
                'quantity' => $quantity,
                'photo' => $photo,
                'priceExclVAT' => $priceExclVAT,
                'priceVAT' => $priceVAT,
            ];
        }

        $orderLineWithData = json_encode($orderLineWithData);

        // exemple json Simple
        // $obj = new \stdClass;
        // $obj->name = 'Iza';
        // $obj->lastname = 'Nowak';
        // $obj->age = 18;

        // $json = json_encode($obj);


        //besoin de reponse a JSON
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

     public function allBasket(SessionInterface $session, FlowerRepository $productRepo, ServiceTVA $serviceVat){
        $orderLine = $session->get('orderLine', []);

        $orderLineWithData = [];

        foreach ($orderLine as $id => $quantity) {
            $product = $productRepo->find($id);

            $name = $product->getName();
            $photo = $product->getPhoto();
            $priceExclVAT = $product->getPriceExclVAT();
            $vatValue = $serviceVat->calculateVAT();
            $priceVAT = $priceExclVAT + ($priceExclVAT*$vatValue)/100.00;

            $orderLineWithData[] = [
                'product_name' => $name,
                'quantity' => $quantity,
                'photo' => $photo,
                'priceExclVAT' => $priceExclVAT,
                'priceVAT' => $priceVAT
                
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
     * @Route("/session/qtyUpdate/{id}/{newQty}", name="cart_qtyUpdate")
     */
    public function qtyUpdate($id, $newQty, SessionInterface $session, FlowerRepository $productRepo, ServiceTVA $serviceVat)
    {
        $orderLine = $session->get('orderLine', []);
        $orderLine[$id] = $newQty;

        $session->set('orderLine', $orderLine);

        return $this->redirectToRoute('shopping_cart');
    }


}