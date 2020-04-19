<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class SessionController extends AbstractController
{
    /**
     * @Route("/session", name="session")
     */
    // public function __construct(SessionInterface $session)
    // {
    //     $this->session = $session;
    // }
    public function addItemToSession(Request $request_, SessionInterface $session_)
    {


        if($request_->isXmlHttpRequest()){

            $session_->set('attribute-name', 'attribute-value');
        }
        else{

            
        }
        return $response = new JsonResponse(['data' => 123]);
      
        
    
    }
}
