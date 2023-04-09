<?php

namespace App\Form;

use App\Entity\Cooperatif;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CooperatifType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Nom_Cooperatif')
            ->add('Nom_Gerant')
            ->add('telephone')
            ->add('ville')
            ->add('email')
            ->add('image_profil')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Cooperatif::class,
        ]);
    }
}
