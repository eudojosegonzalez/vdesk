<?php

namespace App\Form;

use App\Entity\Categorias;
use App\Entity\Empresa;
use App\Entity\JobOffers;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class JobOffersType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titulo')
            ->add('descripcion')
            ->add('fecha_publicacion', null, [
                'widget' => 'single_text',
            ])
            ->add('fecha_finalizacion', null, [
                'widget' => 'single_text',
            ])
            ->add('fecha_atencion', null, [
                'widget' => 'single_text',
            ])
            ->add('estado')
            ->add('empresa', EntityType::class, [
                'class' => Empresa::class,
                'choice_label' => 'id',
            ])
            ->add('categoria', EntityType::class, [
                'class' => Categorias::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => JobOffers::class,
        ]);
    }
}
