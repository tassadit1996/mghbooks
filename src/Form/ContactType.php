<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('prenom', TextType::class, [
                'label' => 'Votre prénom',
                'attr' => [
                    'placeholder' =>'Saisir votre prénom',
                   'class'=>'box'
                ],
                'label_attr'=>[
                'class'=>'label'
               ]
            ])
            ->add('nom', TextType::class,[
                'label' => 'Votre nom',
                'attr' => [
                    'placeholder' =>'Saisir votre nom',
                   'class'=>'box'
                ],
                'label_attr'=>[
                'class'=>'label'
               ]
            ])
            ->add('email', EmailType::class,
            [
                'label' => 'Votre email',
                'attr' => [
                    'placeholder' =>'Saisir votre email',
                   'class'=>'box'
                ],
                'label_attr'=>[
                'class'=>'label'
               ]
            ])
            ->add('content', TextareaType::class,[
                'label' => 'Votre message',
                'attr' => [
                    'placeholder' =>'En quoi pouvons-nous vous aider ?',
                   'class'=>'box'
                ],
                'label_attr'=>[
                'class'=>'label'
               ]
            ])
            ->add('submit', SubmitType::class, [
                'label' => "Envoyer",
                'attr'=>[
                    'class'=>'btn-r'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
