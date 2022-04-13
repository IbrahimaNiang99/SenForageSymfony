<?php

namespace App\Form;

use App\Entity\Role;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('prenom', TextType::class, array('label'=>'Prénom', 'attr'=>array('class'=>'form-control mb-2', 'require'=>'require') ))
            ->add('nom', TextType::class, array('label'=>'Nom', 'attr'=>array('class'=>'form-control mb-2', 'require'=>'require') ))
            ->add('email', EmailType::class, array('label'=>'Adresse email', 'attr'=>array('class'=>'form-control mb-2', 'require'=>'require')))
            ->add('password', TextType::class, array('label'=>'Mot de passe par défaut', 'attr'=>array('class'=>'form-control mb-2','value'=>'passer123', 'disabled'=>'disabled', 'require'=>'require') ) )
            //->add('roles', EntityType::class, ['class'=>Role::class, 'mapped' => false, 
            //'attr'=>array('class'=>'form-control')])
            ->add('Valider', SubmitType::class, array("label"=>"Ajouter", "attr"=>array("class"=>"btn btn-success mt-4")))

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
