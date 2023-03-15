<?php

namespace App\Controller\Admin;

use App\Entity\Recette;
use Doctrine\ORM\Mapping\Entity;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
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
            TextField::new('description'),
            TimeField::new('time'),
            DateTimeField::new('createdAt')->onlyOnIndex(),
            TextField::new('imageFile')->setFormType(VichImageType::class)->onlyWhenCreating(),
            ImageField::new('file')->setBasePath('uploads/recette_images')->onlyOnIndex(),
        ];
    }

}
