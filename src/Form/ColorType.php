<?php
namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ColorType extends AbstractType {
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        //not used yet
        //TODO iftimeallow
        $builder
                // ->add('name', TextType::class)
                ->add ('name', ChoiceType::class, [
                    'choices' => [
                        'red' => 'red',
                        'blue' => 'blue',
                        'yellow' => 'yellow'
                    ],
                    // les combinaisons de ces paramètres détermineront le type de
                    // liste de choix : liste, liste déroulante, checkbox ou
                    // radiobuttons
                    'expanded' => false,
                    'multiple' => true
            ])


                ->add('similarColor', TextType::class);
    }
}