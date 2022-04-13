<?php

namespace App\Form;

use App\Entity\Client;
use App\Entity\Village;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, array('label'=>'Prénom & nom du client', 'attr'=>array('class'=>'form-control mb-3', 'require'=>'require')))
            ->add('adresse', TextType::class, array('label'=>'Adresse', 'attr'=>array('class'=>'form-control mb-3', 'require'=>'require')))
            ->add('telephone', TextType::class, array('label'=>'N° téléphone', 'attr'=>array('class'=>'form-control mb-3', 'require'=>'require')))
            ->add('users', HiddenType::class)
            ->add('villages', EntityType::class, array( 'class'=>Village::class, 'attr'=>array('class'=>'form-control mb-3','require'=>'require')))
            ->add('Valider', SubmitType::class, array("label"=>"Ajouter", "attr"=>array("class"=>"btn btn-success mt-4")))
        
            ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Client::class,
        ]);
    }
}
