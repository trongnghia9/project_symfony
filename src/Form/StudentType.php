<?php

namespace App\Form;

use App\Entity\Classroom;
use App\Entity\Student;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class StudentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Name', null, [
                'attr' => ['placeholder' => 'Enter your name'],
            ])
            ->add('Dob', DateType::class, ['years' => range(2023, 1900)])
            ->add('Gender')
            ->add('Email')
            ->add('Adress')
            ->add('Class', EntityType::class, [
                'class' => Classroom::class,
                'choice_label' => 'Name'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Student::class,
        ]);
    }
}
