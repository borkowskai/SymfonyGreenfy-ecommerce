<?php

namespace App\Controller;

use DateTime;
use App\Entity\Order;
use App\Entity\Flower;
use App\Entity\OrderLine;
use App\Entity\PaymentType;
use App\Service\ServiceTVA;
use App\Entity\CompanyAddress;
use App\Entity\CustomerOrder;
use App\Form\CompanyAddressType;
use App\Repository\FlowerRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class OrderController extends AbstractController
{

    public function addOrderLine(SessionInterface $session, FlowerRepository $productRepo, ServiceTVA $serviceVat){

        $orderLine = $session->get('orderLine', []);
      
        $ordersList = [];

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
            $ordersList += $orderLineBD ;
            }

        return $ordersList;
    }

    /**
     * @Route("/order/check_out", name="check_out")
     */
    public function checkOut(Request $request)
    {
        $order = new CustomerOrder();


        // ------------------- adding address ---------------------
        $address = new CompanyAddress();
        // 2. Création du formulaire du type souhaité
        $form = $this->createForm(
            CompanyAddressType::class,
            $address,
            [
                'action' => $this->generateUrl('check_out'),
                'method' => 'POST'
            ]
        );
        // 3. Analyse de l'objet Request
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

        // ------------------- openning DB ---------------------
            $entityManager = $this->getDoctrine()->getManager();

            $entityManager->persist($address);
            $order->setDeliveryCustomerAddress($address);
            //$listOfOrders= [];
            //$listOfOrders = addOrderLine();
            //$order->addListOfOrderLine($listOfOrders);


            $date = new DateTime();
            $uniqueNumber = md5(uniqid());
            $order->setNumOrder($uniqueNumber);
            $order->setDateOrder($date);
            $payment= new PaymentType();
            $payment->setPaymentType('paypal');
            $entityManager->persist($payment);
            $order->setPaymentType($payment);
            $entityManager->persist($order);
            
            $entityManager->flush();
    
            return Response('order added');
        }
        else{
            return $this->render(
                '/order/check_out.html.twig',
                ['form' => $form->createView()]
            );
        }
    }
}
