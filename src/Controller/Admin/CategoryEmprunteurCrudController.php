<?php

namespace App\Controller\Admin;

use App\Entity\CategoryEmprunteur;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class CategoryEmprunteurCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return CategoryEmprunteur::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            
            TextField::new('name')
            
        ];
    }
    
}
