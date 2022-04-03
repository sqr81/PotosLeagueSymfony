<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;


class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            //IdField::new('id'),
            TextField::new('firstName'),
            TextField::new('lastName'),
            EmailField::new('email'),
            //TextField::new('nflTeam', 'nfl team'),
            ImageField::new('picture')
                ->setBasePath('uploads/users')
                ->setUploadDir('public/uploads/users')
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setRequired(false),
                ImageField::new('country_picture')
                ->setBasePath('uploads/users/location')
                ->setUploadDir('public/uploads/users/location')
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setRequired(false),
            AssociationField::new('nflTeams'),
            BooleanField::new('isBest'),
            DateTimeField::new('createdAt',  'Inscrit le :'),
        ];
        
    }
   
}
