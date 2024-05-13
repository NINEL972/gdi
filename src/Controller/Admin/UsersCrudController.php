<?php

namespace App\Controller\Admin;

use App\Entity\Users;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;


class UsersCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Users::class;
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
            TextField::new('cuid')->setColumns(1),
            TextField::new('prenom')->setColumns(1),
            TextField::new('nom')->setColumns(1),
            FormField::addrow(),
            TextField::new('service')->setColumns(3),
            FormField::addrow(),
            TextField::new('emailpro')->setColumns(3),
            FormField::addrow(),
            TextField::new('emailteam')->setColumns(3),
        ];
    }
}
