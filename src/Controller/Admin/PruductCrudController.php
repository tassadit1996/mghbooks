<?php

namespace App\Controller\Admin;

use App\Entity\Pruduct;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class PruductCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Pruduct::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
           TextField::new('name'),
           SlugField::new('slug')->setTargetFieldName('name'),
           ImageField::new('illustration')
               ->setBasePath('uploads/files/')
               ->setUploadDir('public/uploads/files')
               ->setUploadedFileNamePattern('[randomhash].[extension]')
               ->setRequired(false),
           TextField::new('subtitle'),
           TextareaField::new('description'),
           MoneyField::new('price')->setCurrency('EUR'),
           AssociationField::new('category')

        ];
    }

    private function setUploadedFileNamePattern(string $string)
    {
    }

}
