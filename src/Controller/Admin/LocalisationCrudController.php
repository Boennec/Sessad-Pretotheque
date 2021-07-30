<?php

namespace App\Controller\Admin;

use App\Entity\Localisation;
use Doctrine\DBAL\Types\DateTimeType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\Validator\Constraints\DateTime;

class LocalisationCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Localisation::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nom'),
            TextField::new('prenom'),
            TextField::new('nomEnfant'),
            TextField::new('prenomEnfant'),
            TextField::new('etablissement'),
            TextField::new('posteOccupe'),
            EmailField::new('email'),
            DateTimeField::new('dateDebut'),
            DateTimeField::new('dateFin'),

            AssociationField::new('article')
        ];
    }
}
