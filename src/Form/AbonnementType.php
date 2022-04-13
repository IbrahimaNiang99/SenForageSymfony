<?php

namespace App\Form;

use App\Entity\Abonnement;
use App\Entity\Client;
use App\Entity\User;
use Doctrine\ORM\Mapping\Entity;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AbonnementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('dateAbon', DateType::class, array('label'=>"Date d'abonnement", 'attr'=>array('class'=>'form-control mb-2', 'require'=>'require')))
            ->add('users', HiddenType::class)
            ->add('clients',EntityType::class, array('class'=>Client::class, 'attr'=>array('class'=>'form-control mb-2', 'require'=>'require')))
            ->add('description', TextareaType::class, array('label'=>'Description', 'attr'=>array('class'=>'form-control mb-2', 'require'=>'require')))
            //->add('attribution', )
            ->add('Valider', SubmitType::class, array("label"=>"Valider l'abonnement", "attr"=>array("class"=>"btn btn-success mt-4")))

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Abonnement::class,
        ]);
    }
}
