<?php

namespace App\Controller;

use App\Repository\RecetteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\BrowserKit\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(RecetteRepository $recetteRepository): Response
    {
        $recettesAll = $recetteRepository->findBy([], ['noteMoyenne' => 'DESC']);

        foreach ($recettesAll as $recettes) {
                $recettes->setNoteMoyenne();
                $recetteRepository->save($recettes, true);
        }

        return $this->render('home/index.html.twig', [
            'user' => $this->getUser(),
            'recettesNav' => $recettesAll,
        ]);
    }


}
