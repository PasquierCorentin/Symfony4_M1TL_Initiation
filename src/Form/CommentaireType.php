<?php

namespace App\Form;

use App\Entity\Commentaire;
use App\Entity\Room;
use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class CommentaireType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('contenu')
            // ->add('user', EntityType::class,[
            //     'class'=>User::class,
            //     'choice_label' => 'firstName'
            // ])
            // ->add('room', EntityType::class,[
            //     'class'=>Room::class,
            //     'choice_label' => 'name'
            // ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Commentaire::class,
        ]);
    }
}
