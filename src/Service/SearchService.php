<?php

namespace App\Service;

use App\Repository\RecetteRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SearchService extends AbstractController
{

    public function search( RecetteRepository $recetteRepository, Request $request): array
    {
        $search = $request->request->get('Research');
        $name = $recetteRepository->findByExampleField($search);
        $articles = array_unique($name, SORT_REGULAR);


        return $articles ?? $recetteRepository->findAll();
    }
}