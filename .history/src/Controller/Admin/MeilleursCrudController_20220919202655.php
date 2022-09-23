<?php

namespace App\Controller\Admin;

use App\Entity\meilleurs;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class MeilleursCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Heros::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('titre'),
            TextField::new('soustitre'),
            ImageField::new("image")
                ->setBasePath('meilleurs/')
                ->setUploadDir('public/heros')
               -> setUploadedFileNamePattern('[randomhash].[extension]')
        ];
    }

}