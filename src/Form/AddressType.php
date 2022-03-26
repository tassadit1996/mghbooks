<?php

namespace App\Form;

use App\Entity\Adress;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AddressType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label'=> 'Quel nom souhaitez vous donner à votre adresse?',
                'attr' => [
                    'placeholder' => 'Nommez votre adresse',
                    'class'=>'box'
                ],
                'label_attr'=>[
                    'class'=>'label'
                ]
            ])
            ->add('firstname', TextType::class, [
                'label'=> 'Votre prénom',
                'attr' => [
                    'placeholder' => 'Saisir votre prénom',
                    'class'=>'box'
                ],
                'label_attr'=>[
                    'class'=>'label'
                ]
            ])
            ->add('lastname', TextType::class, [
                'label'=> 'Votre nom',
                
                'attr' => [
                    'placeholder' => 'Saisir votre nom',
                    'class'=>'box'
                ],
                'label_attr'=>[
                    'class'=>'label'
                ]
            ])
            ->add('company', TextType::class, [
                'label'=> 'Votre société',
                'required'=>false,
                'attr' => [
                    'placeholder' => '(facultatif) Saisir votre société',
                    'class'=>'box'
                ],
                'label_attr'=>[
                    'class'=>'label'
                ]
            ])
            ->add('address', TextType::class, [
                'label'=> 'Votre adresse',
                'attr' => [
                    'placeholder' => 'Saisir votre adresse',
                    'class'=>'box'
                ],
                'label_attr'=>[
                    'class'=>'label'
                ]
            ])
            ->add('postal', TextType::class, [
                'label'=> 'Votre code postal',
                'attr' => [
                    'placeholder' => 'Saisir votre code postal',
                    'class'=>'box'
                ],
                'label_attr'=>[
                    'class'=>'label'
                ]
            ])
            ->add('city', TextType::class, [
                'label'=> 'Votre ville',
                'attr' => [
                    'placeholder' => 'Saisir votre ville',
                    'class'=>'box'
                ],
                'label_attr'=>[
                    'class'=>'label'
                ]
            ])
            ->add('country', CountryType::class, [
                'label'=> 'Votre pays',
                'attr' => [
                    'placeholder' => 'Saisir votre pays',
                    'class'=>'box'
                ],
                'label_attr'=>[
                    'class'=>'label'
                ]
            ])
            ->add('phone', TelType::class, [
                'label'=> 'Votre téléphone',
                'attr' => [
                    'placeholder' => 'Saisir votre téléphone',
                    'class'=>'box'
                ],
                'label_attr'=>[
                    'class'=>'label'
                ]
            ])
            ->add('submit', SubmitType::class, [
                'label'=>'Valider'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Adress::class,
        ]);
    }
}
