<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class FrontController extends AbstractController
{

    /**
     * @Route("/index", name="index")
     */
    public function index()
    {
        return $this->render('front/index.html.twig');
    }
    /**
     * @Route("/blog-details", name="blog-details")
     */
    public function blogDetails()
    {
        return $this->render('front/blog_details.html.twig');
    }

    /**
     * @Route("/blog", name="blog")
     */
    public function blog()
    {
        return $this->render('front/blog.html.twig');
    }

    /**
     * @Route("/check-out", name="check-out")
     */
    public function checkOut()
    {
        return $this->render('front/check_out.html.twig');
    }


    /**
     * @Route("/contact", name="contact")
     */
    public function contact()
    {
        return $this->render('front/contact.html.twig');
    }

    /**
     * @Route("/faq", name="faq")
     */
    public function faq()
    {
        return $this->render('front/faq.html.twig');
    }


    /**
     * @Route("/login", name="login")
     */
    public function login()
    {
        return $this->render('front/login.html.twig');
    }

    /**
     * @Route("/product", name="product")
     */
    public function product()
    {
        return $this->render('front/product.html.twig');
    }

    /**
     * @Route("/register", name="register")
     */
    public function register()
    {
        return $this->render('front/register.html.twig');
    }

    /**
     * @Route("/shop", name="shop")
     */
    public function shop()
    {
        return $this->render('front/shop.html.twig');
    }

    /**
     * @Route("/shopping-cart", name="shopping-cart")
     */
    
    public function shoppingCart()
    {
        return $this->render('front/shopping_cart.html.twig');
    }
}
