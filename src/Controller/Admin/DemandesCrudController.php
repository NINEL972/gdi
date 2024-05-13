<?php

namespace App\Controller\Admin;

use App\Entity\Demandes;
use App\Entity\Users;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CodeEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;



class DemandesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Demandes::class;
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
            AssociationField::new('demandeur'),
            AssociationField::new('typeDemande'),
            AssociationField::new('typeEtat'),
            TextField::new('cuid'),
            TextField::new('numDemande'),
            TextField::new('cuidTec'),
            DateField::new('deadline'),
            DateField::new('dateSaisie')->setFormTypeOption('disabled', true),
            TextField::new('dernierNiveau'),
            CodeEditorField::new('descriptif')->setNumOfRows(3),
            TextField::new('contrainte'),
            BooleanField::new('pointeurFichier'),
            BooleanField::new('pointeurInfo'),
            BooleanField::new('pointeurInfoLu'),
            
        
        ];
    }
}
