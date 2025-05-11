<?php

namespace App\Form;

use App\Entity\Car;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CarType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nom de la voiture',
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Description',
            ])
            ->add('dailyPrice', MoneyType::class, [
                'label' => 'Prix journalier',
            ])
            ->add('monthlyPrice', MoneyType::class, [
                'label' => 'Prix mensuel',
            ])
            ->add('seats', ChoiceType::class, [
                'label' => 'Nombre de places',
                'choices' => array_combine(range(1, 9), range(1, 9)),
            ])
            ->add('manual', ChoiceType::class, [
                'label' => 'Boîte de vitesse',
                'choices' => [
                    'Manuelle' => true,
                    'Automatique' => false,
                ],
            ]);
        ;
    }


    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Car::class,
        ]);
    }
}
