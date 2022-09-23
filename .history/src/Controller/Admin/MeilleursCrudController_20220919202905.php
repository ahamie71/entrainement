<?php

namespace App\Controller\Admin;

use App\Entity\Meilleurs;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class MeilleursCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Meilleurs::class;
    }

    /*
    public function configureFields(string $pageXName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
