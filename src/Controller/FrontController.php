<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistretionUserType;
use App\Security\FormLoginAuthenticator;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Guard\GuardAuthenticatorHandler;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class FrontController extends AbstractController
{

    /**
     * @Route("/", name="index")
     */
    public function index()
    {     

        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery("SELECT product.name, product.photo, product.priceExclVAT, product.id FROM App\Entity\Flower product ORDER BY product.id DESC");
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
     * @Route("/register", name="register")
     */
    public function register(Request $request, UserPasswordEncoderInterface $password_encoder)
    {

        // 1. Création d'une entité vide
        $user= new User();
        // 2. Création du formulaire du type souhaité
        $registerForm = $this->createForm(
            RegistretionUserType::class,
            $user,
            [
                'action' => $this->generateUrl('register'),
                'method' => 'POST'
            ]
        );

        // 3. Analyse de l'objet Request
        $registerForm->handleRequest($request);

        // 4. Vérification: on vient d'un submit ou pas?
        // si oui, on traite le formulaire et on remplit l'entité
        if ($registerForm->isSubmitted() && $registerForm->isValid()) {
        // Remplissage de l'entité avec les données du formulaire
        //   $livre = $formulaireLivre->getData(); // pas besoin, le submit remplit l'entite

            $entityManager = $this->getDoctrine()->getManager();

            $user->setFirstName($request->request->get('registretion_user')['firstName']);
            $user->setLastName($request->request->get('registretion_user')['lastName']);
            $user->setEmail($request->request->get('registretion_user')['email']);
            $password = $password_encoder->encodePassword($user, $request->request->get('registretion_user')['password']['first']);
            $user->setPassword($password);
            $user->setRoles(['ROLE_USER']);

            $entityManager->persist($user);
            // écrire l'objet dans la BD
            $entityManager->flush();

            // do anything else you need here, like send an email

            return $this->redirectToRoute('app_login');
        }
        else{
            return $this->render(
                '/front/register.html.twig',
                ['registerForm' => $registerForm->createView()]
            );
        }
    }


}
