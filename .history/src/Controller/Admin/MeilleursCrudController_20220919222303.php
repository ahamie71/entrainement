<?php
namespace App\Controller\Admin;
use App\Entity\Meilleurs;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class meilleursCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Meilleurs::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('titre'),
            TextField::new('soustitre'),
            ImageField::new("image")
                ->setBasePath('heros/')
                ->setUploadDir('public/heros')
               -> setUploadedFileNamePattern('[randomhash].[extension]')
        ];
    }

}