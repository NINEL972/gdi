<?php

namespace App\Controller\Admin;

use App\Entity\FichierRecus;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CodeEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Form\Type\FileUploadType;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;

class FichierRecusCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return FichierRecus::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */

    public function configureFields(string $pageName): iterable
    {
        return [
            ImageField::new('nomFichier')->setUploadDir(''),
            TextField::new('cuidecrivain'),
            BooleanField::new('pointeurFichier'),
            DateField::new('dateFichier'),
        ];
    }
}
