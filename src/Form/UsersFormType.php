<?php

namespace App\Form;

use App\Entity\Users;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UsersFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('cuid',TextType::class,[
              'attr'=> ['minlength' => 8,'maxlength' => 8],
              'help'=> 'le cuid doit etre de la forme abcd1234'  
            ])
            ->add('nom',TextType::class)
            ->add('prenom',TextType::class)
            ->add('mail',EmailType::class)
            ->add('mailteams',EmailType::class)
            ->add('service',TextType::class)
            ->add('niveau',TextType::class)
            ->add('submit',SubmitType::class, ['attr' => ['class' => 'btn btn-danger'],]
            );
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Users::class,
        ]);
    }
}
