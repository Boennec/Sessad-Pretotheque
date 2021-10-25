<?php

namespace App\Controller\Admin;

use App\Entity\Emprunteur;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class EmprunteurCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Emprunteur::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('email'),
            TextField::new('NomFamilleEnfant'),
            TextField::new('PrenomEnfant'),
            TextField::new('NomFamilleParent'),
            TextField::new('NomFamilleSalarieLGO'),
            TextField::new('PrenomSalarieLGO'),
            TextField::new('serviceLGO'),
            TextField::new('structurePartenaire'),
            TextField::new('groupePartenaire'),
            AssociationField::new('CategoryEmprunteur'),

        ];
    }
    
}
