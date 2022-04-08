<?php

namespace App\Controller\Admin;

use App\Entity\FantasyTeam;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;

class FantasyTeamCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return FantasyTeam::class;
    }
   
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name'),
            SlugField::new('slug')
            ->hideOnForm()
            ->setTargetFieldName('name'),
            ImageField::new('picture')
            ->setBasePath('uploads/fantasyTeams')
            ->setUploadDir('public/uploads/fantasyTeams')
            ->setUploadedFileNamePattern('[randomhash].[extension]')
            ->setRequired(false),
 
            AssociationField::new('owner'),
            //AssociationField::new('statistic'),
        ];
    }
    
}
