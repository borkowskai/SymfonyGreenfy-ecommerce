<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use ProxyManager\ProxyGenerator\ValueHolder\MethodGenerator\Constructor;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{

    public function __construct(UserPasswordEncoderInterface $password_encoder) 
    {
        $this->password_encoder = $password_encoder;
    }
        
    
    public function load(ObjectManager $manager)
    {

        foreach ($this->getUserData() as [$firstname, $lastname, $email, $password, $roles])
        {
            $user = new User();
            $user->setFirstname($firstname);
            $user->setLastName($lastname);
            $user->setEmail($email);
            $user->setPassword( $this->password_encoder->encodePassword($user, $password));
            $user->setRoles($roles);

            $manager->persist($user);
        }
        $manager->flush();
    }

    private function getUserData(): array
    {
        return [

            ['iza', 'test', 'iza@gmail.com', 'test', ['ROLE_ADMIN']],
            ['diego', 'test', 'diego@gmail.com', 'test', ['ROLE_USER']],
            ['leal', 'test', 'leal@gmail.com', 'test', ['ROLE_USER']]

        ];
    }
    
}
