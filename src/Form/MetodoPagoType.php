<?php

namespace App\Form;

use App\Entity\MetodoPago;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class MetodoPagoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add(
                'descripcion',
                TextType::class,
                [
                    'label' => 'Nombre del tipo de pago',
                    'required' => true,
                    'attr' => [
                        'size' => '150',
                        'class' => 'form-control',
                    ],
                ],
            )
            ->add(
                'estado',
                ChoiceType::class,
                [
                    'label' => 'Estado del Método de Pago',
                    'required' => true,
                    'multiple' => false,
                    'expanded' => false,
                    'choices' => [
                        'Activo' => '1',
                        'Inactivo' => '0',
                    ],
                    'attr' => [
                        'class' => 'form-control',
                    ],
                ],
            )
            ->add(
                'Referencia',
                TextType::class,
                [
                    'label' => 'Wallet o Monedero para el pago',
                    'required' => false,
                    'attr' => [
                        'size' => '150',
                        'class' => 'form-control',
                    ],
                ],
            )
            ->add(
                'descuento',
                ChoiceType::class,
                [
                    'label' => 'Este tipo de pago aplica descuentos',
                    'required' => true,
                    'multiple' => false,
                    'expanded' => false,
                    'choices' => [
                        'Si' => '1',
                        'No' => '0',
                    ],
                    'attr' => [
                        'class' => 'form-control',
                    ],
                ],
            )
            ->add(
                'porcentaje',
                NumberType::class,
                [
                    'label' => 'Indique que porcentaje de descuento desa aplicar',
                    'required' => true,
                    'attr' => [
                        'class' => 'form-control',
                    ],
                ],
            )
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => MetodoPago::class,
        ]);
    }
}
