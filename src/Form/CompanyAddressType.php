<?php
namespace App\Form;



use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

// la classe pour avoir une entité comme champ du formulaire
use App\Entity\Client;

class CompanyAddressType extends AbstractType {
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('companyName', TextType::class)
                ->add('street', TextType::class)
                ->add('streetNumber', IntegerType::class)
                ->add('appartNumber', TextType::class)
                ->add('zipcode', TextType::class)
                ->add('city', TextType::class)
                ->add('country', TextType::class)
                ->add('phone', TextType::class);
    }
    
}

