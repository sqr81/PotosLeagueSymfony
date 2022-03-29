<?php

namespace App\Form;

use App\Classe\Search;
use App\Entity\FantasyTeam;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class SearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('string', TextType::class,[
            'label' => false,
            'required' => false,
            'attr' => [
                'placeholder' => 'Votre recherche...',
                'class='=> 'form-control-sm',
            ]
            ])
            ->add('fantasyTeams', EntityType::class,[
                'label' => false,
                'required' => false,
                'class' => FantasyTeam::class,
                'multiple' => true,
                'expanded' => true,
            ])
            ->add ('submit', SubmitType::class,[
                'label' => 'Filtrer',
                'attr' => [
                    'class' => 'btn-block btn-info'
                    ]
     
            ]);

    }

    //une fonction pour configurer les options
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            //on va lier le form à la classe Search
            'data_class' => Search::class,
            //on pass les infos par url
            'method' => 'GET',
            //pas besoin de cryptage
            'csrf_protection' => false,
        ]);
    }

    //pour que l url retournee soit propre
    public function getBlockPrefix()
    {
        return '';
    }
}
