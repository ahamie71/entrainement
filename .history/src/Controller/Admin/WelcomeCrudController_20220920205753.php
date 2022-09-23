<?php

namespace App\Controller\Admin;

use App\Entity\Welcome;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class WelcomeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Welcome::class;
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
}
