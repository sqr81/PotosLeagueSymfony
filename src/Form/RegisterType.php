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

class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add ('firstname', TextType::class,[
                'label' => 'Ton prénom',
                'attr' => [
                    'placeholder' => 'Merci de saisir ton prénom'
                ]
            ])
            ->add('lastname', TextType::class, [
                'label' => 'Ton nom',
                'attr' => [
                    'placeholder' =>  'Merci de saisir ton nom'
                ]
            ]) 
            ->add('email', EmailType::class, [
                'label' => 'Ton email',
                'attr' => [
                    'placeholder' => 'Merci de saisir ton email'
                ]
            ])
            ->add ('nflTeam', TextType::class,[
                'label' => 'Ton équipe NFL préférée',
                'attr' => [
                    'placeholder' => 'Merci de saisir ton équipe NFL préférée'
                ],
            ])
            ->add('password', RepeatedType::class, [ 
                'type' =>PasswordType::class,
                'invalid_message' => 'Les mots de passe doivent être indentiques',
                'label' => 'Mot de passe',
                'required' => true,
                'first_options' => ['label' => 'Mot de passe'],
                'second_options' => ['label' => 'Confirme ton mot de passe'],
                'attr' => [
                'placeholder' =>  'Merci de saisir ton mot de passe']
            ])
            ->add ('submit', SubmitType::class, [
                'label' => "S'inscrire",
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
