<?php

namespace App\Form;

use App\Entity\Personnages;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class PersonnageFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('name', TextType::class, [
            'label' => 'Nom',
            'constraints' => [
                new NotBlank([
                    'message' => 'Ce champ ne peut être vide',
                ]),
                new Length([
                    'max' => 50,
                    'min' => 2,
                    'maxMessage' => 'Le nom ne peut dépasser {{ limit }} caractères',
                    'minMessage' => 'Le nom doit avoir au minimum {{ limit }} caractères',
                ]),
            ],
        ])
        ->add('firstname', TextType::class, [
            'label' => 'Prénom',
            'constraints' => [
                new NotBlank([
                    'message' => 'Ce champ ne peut être vide',
                ]),
                new Length([
                    'max' => 50,
                    'min' => 2,
                    'maxMessage' => 'Le prénom ne peut dépasser {{ limit }} caractères',
                    'minMessage' => 'Le prénom doit avoir au minimum {{ limit }} caractères',
                ]),
            ],
        ])
            ->add('submit', SubmitType::class, [
                'label' => 'Valider',
                'validate' => false,
                'attr' => [
                    'class' => 'd-block mx-auto col-2 btn btn-primary'
                ]
            ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Personnages::class,
        ]);
    }
}
