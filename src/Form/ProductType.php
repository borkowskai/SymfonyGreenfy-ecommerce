<?php
namespace App\Form;

use PhpParser\Builder;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class ProductType extends AbstractType {
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', TextType::class)
                ->add('description',TextareaType::class)
                ->add('priceExclVAT', NumberType::class)
                ->add('reorderQuantity', IntegerType::class)
                ->add('$reorderLevel', IntegerType::class);

    }
    
}

