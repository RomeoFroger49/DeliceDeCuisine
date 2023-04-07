<?php

namespace App\Controller\Admin;

use App\Entity\Recette;
use Doctrine\ORM\Mapping\Entity;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TimeField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class RecetteCrudController extends AbstractCrudController
{

    public static function getEntityFqcn(): string
    {
        return Recette::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name'),
            TextField::new('description')->hideOnIndex(),
            TimeField::new('time')->hideOnIndex(),
            DateTimeField::new('createdAt')->onlyOnIndex(),
            TextField::new('imageFile')->setFormType(VichImageType::class)->onlyOnForms(),
            IntegerField::new('prix'),
            AssociationField::new('commentaires')->hideWhenCreating(),
        ];
    }

}
