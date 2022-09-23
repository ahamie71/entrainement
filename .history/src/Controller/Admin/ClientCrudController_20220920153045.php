<?php

namespace App\Controller\Admin;

use App\Entity\client;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ClientCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return client::class;
    }

    public function configureCrud(Crud $crud):Crud
    {
        return $crud
             ->setEntityLabelInplural('Client')
             ->setEntityLabelInsingular('Client');
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
?>
