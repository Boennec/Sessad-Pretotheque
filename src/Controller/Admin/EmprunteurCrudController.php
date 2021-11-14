<?php

namespace App\Controller\Admin;

use App\Entity\Emprunteur;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Notifier\Message\EmailMessage;

class EmprunteurCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Emprunteur::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            EmailField::new('email'),
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
