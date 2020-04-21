<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class FrontController extends AbstractController
{

    /**
     * @Route("/", name="index")
     */
    public function index()
    {     

        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery("SELECT product.name, product.photo, product.priceExclVAT  FROM App\Entity\Flower product ORDER BY product.id DESC");
        $products = $query->setMaxResults(4)->getResult();
    
        // notez que findBy renverra toujours un array même s'il trouve 
        // qu'un objet
        $vars = ['products' => $products]; 
    
        return $this->render('front/index.html.twig', $vars);
    }

    /**
     * @Route("/about_us", name="about")
     */
    public function about()
    {
        return $this->render('front/about.html.twig');
    }

    /**
     * @Route("/contact", name="contact")
     */
    public function contact()
    {
        return $this->render('front/contact.html.twig');
    }




    /**
     * @Route("/login", name="login")
     */
    public function login()
    {
        return $this->render('front/login.html.twig');
    }


    /**
     * @Route("/register", name="register")
     */
    public function register()
    {
        return $this->render('front/register.html.twig');
    }


}
