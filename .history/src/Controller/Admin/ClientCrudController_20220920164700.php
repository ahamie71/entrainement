<?php

namespace App\Controller\Admin;
use App\Entity\Client;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ClientCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Client::class;
    }
    public function configureFigureCrud(Crud $crud):crud
    {
        return $crud
            ->setEntityLabelInplural('Client') 
            ->setENtityLabel('CLient') ; 
         }
    
    public function configureFields(string $pageName): iterable
    {
        return [
            
            TextField::new('name'),
            TextField::new('prenom'),
            TextField::new('email'),
            TextField::new('telephone'),
            TextField::new('password'),
        ];
    }
    
}
