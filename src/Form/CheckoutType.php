<?php

namespace App\Form;

use App\Entity\Checkout;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


class CheckoutType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
                ->add('UserName')
                ->add('LastName')
                ->add('phone')
                ->add('email')
                ->add('Adresse')
                ->add('pays', ChoiceType::class, [
                    'choices'  => [
                        'Maroc' => 'Maroc',
                ],
                ])
                  ->add('ville', ChoiceType::class, [
                'choices'  => [
                    'Marrakech' => 'Marrakech',
                    'Casablanca' => 'Casablanca',
                    'Mohammedia' => 'Mohammedia',
                    'Rabat' => 'Rabat',
                    'salé' => 'salé',
                    'Fes' => 'Fes',
                    'Meknes' => 'Meknes',
                    'Oujda'=> 'Oujda',
                ],
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Checkout::class,
        ]);
    }
}
