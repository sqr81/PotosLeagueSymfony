<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use App\Entity\NflTeam;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class NflTeamCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return NflTeam::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            //IdField::new('id'),
            TextField::new('name'),
            TextField::new('city'),
            ImageField::new('picture')
                ->setBasePath('uploads/nflTeams')
                ->setUploadDir('public/uploads/nflTeamss')
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setRequired(false),
            AssociationField::new('users'),
        ];
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
        ->setPaginatorPageSize(17);
    }
    
}


