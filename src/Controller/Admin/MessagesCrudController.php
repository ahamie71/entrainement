<?php

namespace App\Controller\Admin;

use App\Entity\Messages;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class MessagesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Messages::class;
    }
    public function configureFigureCrud(Crud $crud):crud
    {
        return $crud
            ->setEntityLabelInplural('demande de contacts') 
            ->setENtityLabel('demande de contact') ; 

         }
    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
           
            TextField::new('titre'),
            TextField::new('text')
           
        ];
    }
   
}

