<?php

namespace App\Controller\Admin;

use App\Entity\Recette;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class RecetteCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Recette::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('titre', 'Titre de la recette'),
            TextareaField::new('description', 'Description'),
            ImageField::new('image', 'Image')
                ->setBasePath('uploads/images')
                ->setUploadDir('public/uploads/images')
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setRequired(false),
            AssociationField::new('recetteAllergene', 'Allergènes'),
            SlugField::new('slug', 'Slug')
                ->setTargetFieldName('titre'),
            IntegerField::new('tempsPreparation', 'Temps de préparation'),
            IntegerField::new('tempsCuisson', 'Temps de cuisson'),
            IntegerField::new('tempsRepos', 'Temps de repos'),
            TextareaField::new('ingredients', 'Ingrédients'),
            TextareaField::new('etapes', 'Etapes de préparation'),
            BooleanField::new('estPrivee', 'Recette publiée au public ?')
        ];
    }

}
