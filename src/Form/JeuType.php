<?php

namespace App\Form;

use App\Entity\Jeu;
use App\Entity\Category;
use Symfony\Component\Form\AbstractType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\FormBuilderInterface;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class JeuType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('image', VichImageType::class, array(
                'label' => 'Image'
            ))
            ->add('description', CKEditorType::class)
            ->add('categories', ChoiceType::class, $this->categorie())
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Jeu::class,
        ]);
    }
    public function categorie()
    {
       $output= [];
       $categorie = new Category();
       foreach($categorie as $k => $v){
           $output [$v] -> $k;
       }
       return $output;
    }
}
