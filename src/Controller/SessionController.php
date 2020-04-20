<?php

namespace App\Controller;

use App\Repository\FlowerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;



class SessionController extends AbstractController
{
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

/**
     * @Route("/session/add/{id}", name="cart_add")
     */
    public function add($id, SessionInterface $session){
        $orderLine = $session->get('orderLine', []);
        if(!empty($orderLine[$id])){
            $orderLine[$id] ++;
        }
        else{        
            $orderLine[$id] = 1;
        }
        $session->set('orderLine', $orderLine);
        return $this->redirectToRoute('shopping_cart');
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
}