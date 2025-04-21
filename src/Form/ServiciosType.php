<?php

namespace App\Form;

use App\Entity\Servicios;
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


class ServiciosType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add(
                'nombre',
                TextType::class,
                [
                    'label' => 'Nombre del Servicio',
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
                    'label' => 'Estado del Servicio',
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
            ->add('metodos_pago', ChoiceType::class, [
                'choices' => $options['metodos_disponibles'], // Pasaremos los métodos disponibles como opción
                'choice_value' => 'id', // El valor que se enviará al formulario (el ID del método)
                'choice_label' => 'descripcion', // Lo que se mostrará al usuario (el nombre del método)
                'multiple' => true, // Permite seleccionar múltiples opciones
                'expanded' => true, // Muestra checkboxes en lugar de un select (opcional)
                'label' => 'Métodos de Pago Aceptados',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Servicios::class,
            'metodos_disponibles' => [], // Opción para pasar los métodos disponibles
        ]);

        // Asegúrate de que la opción 'metodos_disponibles' sea un array
        $resolver->setAllowedTypes('metodos_disponibles', 'array');
    }
}
