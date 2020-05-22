<?php

namespace App\Controller;

use DateTime;
use App\Entity\Client;
use App\Entity\OrderLine;
use App\Entity\PaymentType;
use App\Service\ServiceTVA;
use App\Entity\CustomerOrder;
use App\Entity\CompanyAddress;
use App\Form\CompanyAddressType;
use App\Repository\FlowerRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class OrderController extends AbstractController
{
    /**
     * @Route("/order/check_out", name="check_out")
     */
    public function checkOut(Request $request, SessionInterface $session, FlowerRepository $productRepo, ServiceTVA $serviceVat)
    {
        $order = new CustomerOrder();
        $client = new Client();

        $entityManager = $this->getDoctrine()->getManager();

            // ------------------- adding customer ----------------
            // $clientData = $this->getUser();
            // $clientData->getFirstName();
            // $clientData->getLastName();
            // dd($client);
            // //$entityManager->persist($client);

        // ------------------- adding orderLines ---------------------
        $orderLine = $session->get('orderLine', []);

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

            $entityManager->persist($orderLineBD);
            $order->addListOfOrderLine($orderLineBD);
            }


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

            $entityManager->persist($address);
            $order->setDeliveryCustomerAddress($address);


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
            //$session->clear();
            //$session->set('orderLine', []);
            
            return $this->redirectToRoute('payment');
        }
        else{
            return $this->render(
                '/order/check_out.html.twig',
                ['form' => $form->createView()]
            );
        }
    }

    /**
     * @Route("/order/payment", name="payment")
     */
    public function payment(SessionInterface $session, FlowerRepository $productRepo, ServiceTVA $serviceVat)
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
        $totalVAT = 0;
        $count = 0;
        $vatValue = $serviceVat->calculateVAT();

        foreach ($orderLineWithData as $item) {
            $priceExclVAT = $item['product']->getPriceExclVAT();
            $totalOrderLine =  $priceExclVAT* $item['quantity'];
            $totalOrderLineVAT = ($priceExclVAT +($priceExclVAT*$vatValue)/100.00 )* $item['quantity'];
            $total += $totalOrderLine;
            $totalVAT += $totalOrderLineVAT;
            $count ++;
        }
        $total = number_format( $total, 2, '.', '');
        $totalVAT= number_format( $totalVAT, 2, '.', '');

        return $this->render('order/payment.html.twig', [
            'items' => $orderLineWithData,
            'total' => $total,
            'totalVAT' => $totalVAT,
            'counter' => $count
            ]);
       
    }

    /**
     * @Route("/order/order_done", name="order_done")
     */
    public function orderDone()
    {
            return $this->render('order/order_done.html.twig');
    }
}
