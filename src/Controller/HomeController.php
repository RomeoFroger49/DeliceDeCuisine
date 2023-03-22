<?php

namespace App\Controller;

use App\Repository\RecetteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(RecetteRepository $recetteRepository): Response
    {
        $test = $this->getUser();
        $recette = $recetteRepository->findAll();


        return $this->render('home/index.html.twig', [
            'user' => $test,
            'recettes' => $recette,
        ]);
    }
}
