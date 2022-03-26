<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ChangePasswordType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, [
                'disabled' =>true,
                'label' => 'Mon adresse email',
                'label_attr'=>[
                    'class'=>'label'
                ],
                'attr'=> [
                    'class'=>'box'
                ]
            ])
            ->add('lastname', TextType::class, [
                'disabled'=>true,
                'label' => 'Mon nom',
                'label_attr'=>[
                    'class'=>'label'
                ],
                'attr'=> [
                    'class'=>'box'
                ]
            ])
            ->add('firstname', TextType::class, [
                'disabled'=>true,
                'label' => 'Mon prénom',
                'label_attr'=>[
                    'class'=>'label'
                ],
                'attr'=> [
                    'class'=>'box'
                ]
            ])
            ->add('old_password', PasswordType::class, [
                'label' => 'Mon mot de passe actuel',
                'label_attr'=>[
                    'class'=>'label'
                ],
                'mapped'=>false,
                'attr'=> [
                    'placeholder'=>'Veuillez saisir votre mot de passe actuel',
                    'class'=>'box'
                ]
            ])
            ->add('new_password', RepeatedType::class, [
                'type'=>PasswordType::class,
                'mapped'=>false,
                'invalid_message'=>'le mot de passe et la cofirmation doivent etre identique',
                'label' => 'Mon nouveau mot de passe',
                'required'=>true,
                'first_options'=>[
                    'label'=>'Mon nouveau mot de passe',
                    'label_attr'=>[
                        'class'=>'label'
                    ],
                    'attr' => [
                        'placeholder' =>'Saisir votre nouveau mot de passe',
                        'class'=>'box']
                    ],
                'second_options'=>[
                    'label'=>'Confirmez mon nouveau mot de passe',
                    'label_attr'=>[
                        'class'=>'label'
                    ],
                    'attr' => [
                        'placeholder' =>'Confirmer votre nouveau mot de passe',
                        'class'=>'box']]
            ])
            ->add('submit', SubmitType::class, [
                'label' => "Mettre à jour"
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
