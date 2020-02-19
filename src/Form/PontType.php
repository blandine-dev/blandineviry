<?php

namespace App\Form;

use App\Entity\Pont;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class PontType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class, [
                'label'=> 'Nom du pont',
                'required' => false,
                'attr'=>[
                    'placeholder' => 'Entrez un nom'
                ]
            ])
            ->add('photo', UrlType::class, [
                'label'=> 'Vue',
                'required' => false,
                'attr'=>[
                    'placeholder' => 'Entrez l\'url de l\'image'
                ]
            ])
            ->add('longueur', TextType::class, [
                'label'=> 'Longueur',
                'required' => false,
                'attr'=>[
                    'placeholder' => 'Entrez la longueur'
                ]
            ])
            ->add('lieu', TextType::class, [
                'label'=> 'Localisation',
                'required' => false,
                'attr'=>[
                    'placeholder' => 'Entrez un lieu'
                ]
            ])
            ->add('architecte', TextType::class, [
                'label'=> 'Architecte',
                'required' => false,
                'attr'=>[
                    'placeholder' => 'Entrez le nom de l\'architecte'
                ]
            ])
            ->add('presentation', TextareaType::class, [
                'label'=> 'Présentation',
                'required' => false,
                'attr'=>[
                    'placeholder' => 'Entrez une présentation'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Pont::class,
        ]);
    }
}
