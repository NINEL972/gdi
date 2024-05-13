<?php

namespace App\Controller\Admin;

use App\Entity\SuiviInfo;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;


class SuiviInfoCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return SuiviInfo::class;
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
           
            TextField::new('numDemande'),
            TextField::new('commentaires'),
            TextField::new('cuidEcrivain'),
            DateField::new('dateInfo'),
            BooleanField::new('pointeurLu'),
            
        ];
    }

}
