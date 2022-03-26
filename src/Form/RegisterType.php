<?php

namespace App\Form;

use App\Entity\User;
use phpDocumentor\Reflection\Type;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname', TextType::class, [
                'label'=> 'Votre nom',
                'attr' => [
                    'placeholder' => 'Saisir votre nom',
                    'class'=>'box'
                ],
                'label_attr'=>[
                    'class'=>'label'
                ]
            ])
            ->add('lastname', TextType::class, [
                'label' => 'Votre prénom',
                'attr' => [
                    'placeholder' =>'Saisir votre prénom',
                   'class'=>'box'
                ],
                'label_attr'=>[
                'class'=>'label'
               ]
            ])

            ->add('email', EmailType::class,[
                'label'=>'Votre email',
                'attr' => [
                    'placeholder' =>'Saisir votre email',
                    'class'=>'box'
                ],
                'label_attr'=>[
                    'class'=>'label'
                ]
            ] )
            ->add('password', RepeatedType::class, [
                'label' => 'Votre mot de passe',
                'invalid_message'=>'le mot de passe et la cofirmation doivent etre identique',
                'type'=>PasswordType::class,
                'required'=>true,
                'first_options'=>[
                    'label'=>'Votre mot de passe',
                    'attr' => [
                        'placeholder' =>'Saisir votre mot de passe',
                    'class'=>'box'
                    ],
                    'label_attr'=>[
                        'class'=>'label'
                    ]
                ],
                'second_options'=>[
                    'label'=>'Confirmez votre mot de passe',
                    'attr' => [
                        'placeholder' =>'Confirmer votre mot de passe',
                        'class'=>'box'
                        ],
                    'label_attr'=>[
                        'class'=>'label'
                    ]
                ]
            ])
            ->add('submit', SubmitType::class, [
                'label' => "S'inscrire",
                'attr'=>[
                    'class'=>'btn-r'
                ]
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
