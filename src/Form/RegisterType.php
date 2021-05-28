<?php

namespace App\Form;

use App\Entity\Admin;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormTypeInterface;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class, [
                'label' => 'Votre nom',
                'attr'  => [
                    'placeholder' => 'veuillez saisir votre nom'
                ]
            ])
            ->add('prenom', TextType::class, [
                'label' => 'votre prénom',
                'attr'  => [
                    'placeholder' => 'veuillez saisir votre prénom'
                ]
            ])
            ->add('email', EmailType::class, [
                'label' => 'Votre email',
                'attr'  => [
                    'placeholder' => 'veuillez saisir votre email'
                ]
            ])
            ->add('password', RepeatedType::class, [
                'type'  => PasswordType::class,
                'invalid_message' => 'les mots de passe doivent être identiques',
                'label' => 'Votre mot de passe',
                'required' => true,
                'first_options' => [ 'label' => 'Mot de passe' ],
                'second_options' => ['label' => 'Confirmez votre mot de passe']
            ])


            ->add('submit', SubmitType::class, [
                'label' => "S'inscrire"
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
