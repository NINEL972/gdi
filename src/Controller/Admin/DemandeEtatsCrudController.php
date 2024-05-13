<?php

namespace App\Controller\Admin;

use App\Entity\DemandeEtats;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;

class DemandeEtatsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return DemandeEtats::class;
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
            TextField::new('description'),
            TextField::new('avancement'),
           
        ];
    }
}
