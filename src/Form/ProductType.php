<?php
namespace App\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;

// la classe pour avoir une entité comme champ du formulaire
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Color;


class ProductType extends AbstractType {
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', TextType::class)
                ->add('description',TextareaType::class)
                ->add('priceExclVAT', MoneyType::class)
                ->add('reorderQuantity', IntegerType::class)
                ->add('reorderLevel', IntegerType::class)
                ->add('color', EntityType::class,[
                    'class' => Color::class
                ])
                ->add('photo', FileType::class);


    }
    
}

