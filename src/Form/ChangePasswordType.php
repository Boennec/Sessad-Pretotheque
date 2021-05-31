<?php

namespace App\Form;

use App\Entity\Admin;
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
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class, [
                'disabled' => true,
                'label'    => 'Mon adresse email'
            ])
            ->add('nom', TextType::class, [
                'disabled' => true,
                'label'    => 'Mon nom'
            ])
            ->add('prenom', TextType::class, [
                'disabled' => true,
                'label'    => 'mon prénom'
            ])

            ->add('old_password', PasswordType::class, [
                'mapped'  => false, 
                'label'   => 'Mon mot de passe actuel', 
                'attr'    => [
                    'placeholder' => 'Veuillez saisir votre mot de passe actuel'
                ]
            ])
            ->add('new_password', RepeatedType::class, [
                'type'            => PasswordType::class,
                'mapped'          => false,
                'invalid_message' => 'les mots de passe doivent être identiques',
                'label'           => 'Mon nouveau mot de passe',
                'required'        => true,
                'first_options'   => [ 
                    'label' => 'Mon nouveau mot de passe',
                    'attr'  => [
                        'placeholder' => 'Merci de saisir votre nouveau mot de passe'
                    ]
                 ],
                'second_options'  => [
                    'label' => 'Confirmez votre nouveau mot de passe',
                    'attr'  => [
                        'placeholder' => 'Merci de confirmer votre nouveau mot de passe'
                    ]
                ]
            ])

            ->add('submit', SubmitType::class, [
                'label' => "Mettre à jour"
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Admin::class,
        ]);
    }
}
