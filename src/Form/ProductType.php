<?php
namespace App\Form;



use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

// la classe pour avoir une entité comme champ du formulaire
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Size;
use App\Entity\Color;
use App\Entity\PlantType;
use App\Repository\SizeRepository;
use App\Repository\ColorRepository;
use App\Repository\PlantTypeRepository;

class ProductType extends AbstractType {
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', TextType::class)
                ->add('description',TextareaType::class,[
                    'data' => 'The largest genera are Bulbophyllum (2,000 species), Epidendrum (1,500 species), Dendrobium (1,400 species) and Pleurothallis (1,000 species). It also includes Vanilla (the genus of the vanilla plant), the type genus Orchis, and many commonly cultivated plants such as Phalaenopsis and Cattleya',
                ])
                ->add('priceExclVAT', MoneyType::class)
                ->add('reorderQuantity', IntegerType::class, ['data'=>'10'])//ausi possible dans twig  'value' : '10'
                ->add('reorderLevel', IntegerType::class)
                ->add('color', EntityType::class,[
                    'class' => Color::class, 
                    'query_builder' => function(ColorRepository $er){
                        return $er->createQueryBuilder('generic')->orderBy('generic.name');
                    },
                    'choice_label' => function ($x)
                    {
                        return strtoupper($x->getName());
                    }
                ])
                ->add('size', EntityType::class,[
                    'class' => Size::class,
                    'query_builder' => function(SizeRepository $er){
                        return $er->createQueryBuilder('generic')->orderBy('generic.id');
                    },
                    'choice_label' => function ($x)
                    {
                        return strtoupper($x->getName());
                    }
                ])
                ->add('plantType', EntityType::class,[
                    'class' => PlantType::class,
                    'query_builder' => function(PlantTypeRepository $er){
                        return $er->createQueryBuilder('generic')->orderBy('generic.name');
                    },
                    'choice_label' => function ($x)
                    {
                        return strtoupper($x->getName());
                    }
                ])
                ->add('photo', FileType::class);


    }
    
}

