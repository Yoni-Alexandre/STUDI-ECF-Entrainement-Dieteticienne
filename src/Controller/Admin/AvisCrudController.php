<?php

namespace App\Controller\Admin;

use App\Entity\Avis;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class AvisCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Avis::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
//            Fonctionnalité pour éviter que l'admin puisse modifier les avis et en créer des faux
            FormField::addPanel('Informations sur l\'avis'),
            TextField::new('user', 'Utilisateur')->setFormTypeOption('disabled', true),
            TextareaField::new('commentaire')->setFormTypeOption('disabled', true),
            IntegerField::new('note')->setFormTypeOption('disabled', true),
        ];
    }

}
