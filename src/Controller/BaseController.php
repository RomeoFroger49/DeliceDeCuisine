<?php

namespace App\Controller;

use App\Repository\RecetteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BaseController extends AbstractController
{
    #[Route('/base', name: 'app_base')]
    public function index( RecetteRepository $recetteRepository): Response
    {
        $recette = $recetteRepository->findAll();

        return $this->render('base/index.html.twig', [
            'recettes' => $recette,
        ]);
    }
}
