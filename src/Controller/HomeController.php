<?php

namespace App\Controller;

use App\Repository\RecetteRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(PaginatorInterface $paginator,Request $request,RecetteRepository $recetteRepository): Response
    {
        $recettesAll = $recetteRepository->findBy([], ['noteMoyenne' => 'DESC']);

        foreach ($recettesAll as $recettes) {
                $recettes->setNoteMoyenne();
                $recetteRepository->save($recettes, true);
        }
        if($request->isMethod('POST') && $request->request->get('Research') != null) {
            $search = $request->request->get('Research');
            $name = $recetteRepository->findByExampleField($search);
            $articles = array_unique($name, SORT_REGULAR);
            return $this->render('recette/index.html.twig', [
                'recettesNav' =>  $recetteRepository->findAll(),
                'recettes'=> $articles ?? $recetteRepository->findAll(),
            ]);
        }

        return $this->render('home/index.html.twig', [
            'recettesNav' => $recettesAll,
        ]);
    }


}
