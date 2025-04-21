<?php

namespace App\Form;

use App\Entity\Empresa;
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

class EmpresaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email',
            TextType::class,
                [
                    'label' => 'Email de la Empresa',
                    'required' => true,
                    'attr' => [
                        'size' => '150',
                        'class' => 'form-control',
                    ],
                ],            
            )
            ->add('password',
            PasswordType::class,
                [
                    'label' => 'Contraseña de Acceso',
                    'required' => true,
                    'attr' => [
                        'size' => '150',
                        'class' => 'form-control',
                    ],
                ],            
            
            )
            ->add('nombre',
            TextType::class,
                [
                    'label' => 'Nombre de la Empresa',
                    'required' => true,
                    'attr' => [
                        'size' => '50',
                        'class' => 'form-control',
                    ],
                ],
            )
            ->add('roles',
            ChoiceType::class,
            [
                'label' => 'Rol del Usuario',
                'required' => true,
                'multiple' => false,
                'expanded' => false,
                'choices' => [
                    'Usuario' => "['ROLE_USER']",                  
                ],
                'attr' => [
                    'class' => 'form-control',
                ],
            ],              
            )
            ->add('nivel',
            ChoiceType::class,
            [
                'label' => 'Nivel de acceso',
                'required' => true,
                'multiple' => false,
                'expanded' => false,
                'choices' => [
                    'Empresa' => '25',
                   ],
                'attr' => [
                    'class' => 'form-control',
                ],
            ],            
            )
            ->add('activo',
            ChoiceType::class,
            [
                'label' => 'Estado',
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
            ->add('contacto',
            TextType::class,
                [
                    'label' => 'Persona de Contacto',
                    'required' => true,
                    'attr' => [
                        'size' => '50',
                        'class' => 'form-control',
                    ],
                ],            
            )
            ->add('telefono')
            ->add('telefonocontacto')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Empresa::class,
        ]);
    }
}
