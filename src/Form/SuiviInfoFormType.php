<?php

namespace App\Form;

use App\Entity\SuiviInfo;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;


class SuiviInfoFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('numDemande')
            ->add('commentaires')
            ->add('cuidEcrivain')
            ->add('dateInfo')
            ->add('pointeurLu')
            ->add('demandeSuivi')
            ->add('submit',SubmitType::class, ['attr' => ['class' => 'btn btn-danger'],])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => SuiviInfo::class,
        ]);
    }
}
