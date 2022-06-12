<?php

namespace App\Form;

use App\Entity\Role;
use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('prenom', TextType::class, array('label'=>"Prénom de l'utilisateur", 'attr'=>array('class'=>'form-control mb-3', 'require'=>'require')))
            ->add('nom', TextType::class, array('label'=>"Nom de l'utilisateur", 'attr'=>array('class'=>'form-control mb-3', 'require'=>'require')))
            ->add('email', TextType::class, array('label'=>'Adresse email', 'attr'=>array('class'=>'form-control mb-3', 'require'=>'require')))
            ->add('password', TextType::class, array('label'=>'Mot de passe par défaut','attr'=>array('class'=>'form-control', 'value'=>'passer123', 'disabled'=>'disabled')))
            //->add('roles', EntityType::class, array( 'class' => Role::class , 'attr'=>array('class'=>'form-control mb-3')))
            ->add('roles')
            ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
