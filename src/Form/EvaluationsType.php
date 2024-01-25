<?php

namespace App\Form;

use App\Entity\Announcements;
use App\Entity\Evaluations;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EvaluationsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('comment')
            ->add('note')
            ->add('evaluator', EntityType::class, [
                'class' => User::class,
'choice_label' => 'id',
            ])
            ->add('evaluated_user', EntityType::class, [
                'class' => User::class,
'choice_label' => 'id',
            ])
            ->add('announcement', EntityType::class, [
                'class' => Announcements::class,
'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Evaluations::class,
        ]);
    }
}