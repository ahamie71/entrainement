<?php

namespace App\Controller\Admin;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use App\Entity\Client;
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
    /*
    public function configureFields(string $pageName): iterable
    {
        return [
                IdField::new('id'),
                 TextField::new('nom'),
                 TextField::new('prenom'),
                 TextField::new('email'),
                
                
        ];
    }
    
}
