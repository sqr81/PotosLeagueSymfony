<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
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
            TextField::new('firstName')
                ->setLabel('Prénom'),
            TextField::new('lastName')
                ->setLabel('Nom'),
            EmailField::new('email'),
            //TextField::new('nflTeam', 'nfl team'),
            ImageField::new('picture')
                ->setLabel('Photo')
                ->setBasePath('uploads/users')
                ->setUploadDir('public/uploads/users/pictureProfile')
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setRequired(false),
            ImageField::new('country_picture')
                ->setLabel('Pays/Dpt')
                ->setBasePath('uploads/users/location')
                ->setUploadDir('public/uploads/users/location')
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setRequired(false),
            AssociationField::new('nflteam')
            ->setLabel('Fan de'),
            BooleanField::new('isBest')
            ->setLabel('Coach du moment'),
            DateTimeField::new('createdAt',  'Inscrit le :')
            ->setFormat('EEE, d MMM , yyyy'),
        ];
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
        ->setPageTitle('index', 'Utilisateurs');
    }
}
