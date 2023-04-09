<?php

namespace App\Controller;

use App\Entity\Commentaire;
use App\Entity\Recette;
use App\Form\RecetteType;
use App\Repository\CommentaireRepository;
use App\Repository\RecetteRepository;
use App\Service\SearchService;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\CommentaireType;


#[Route('/recette')]
class RecetteController extends AbstractController
{


    #[Route('/', name: 'app_recette_index', methods: ['GET', 'POST'])]
    public function index(RecetteRepository $recetteRepository, Request $request, SearchService $searchService): Response
    {
        $articles = $recetteRepository->findBy([], ['noteMoyenne' => 'DESC']);
        if($request->isMethod('POST') && $request->request->get('Research') != null) {
            $articles = $searchService->search($recetteRepository, $request);
            return $this->render('recette/index.html.twig', [
                'recettesNav' =>  $recetteRepository->findAll(),
                'recettes'=> $articles ,
            ]);
        }

        return $this->render('recette/index.html.twig', [
            'recettesNav' => $recetteRepository->findAll(),
            'recettes' => $articles,
        ]);
    }

    #[Route('/new', name: 'app_recette_new', methods: ['GET', 'POST'])]
    public function new(Request $request, RecetteRepository $recetteRepository): Response
    {
        $recette = new Recette();
        $form = $this->createForm(RecetteType::class, $recette);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $recetteRepository->save($recette, true);

            return $this->redirectToRoute('app_recette_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('recette/new.html.twig', [
            'recette' => $recette,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_recette_show', methods: ['GET', 'POST'])]
    public function show(Recette $recette, Request $request,RecetteRepository $recetteRepository, CommentaireRepository $commentaireRepository, SearchService $searchService): Response
    {
        if($request->isMethod('POST') && $request->request->get('Research') != null) {
            $articles = $searchService->search($recetteRepository, $request);
            return $this->render('recette/index.html.twig', [
                'recettesNav' =>  $recetteRepository->findAll(),
                'recettes'=> $articles,
            ]);
        }
        $recettes_navbar = $recetteRepository->findAll();
        $commentaires = $commentaireRepository->findBy(['recette' => $recette]);
        $test = $this->getUser();
        $commentaire = new Commentaire();
        $commentaire->setRecette($recette);
        $commentaire->setUser($this->getUser());
        $commentaire->setCreatedAt(new \DateTime());
        $form = $this->createForm(CommentaireType::class, $commentaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $commentaireRepository->save($commentaire, true);
            return $this->redirectToRoute('app_home', [], Response::HTTP_SEE_OTHER);
        }
        return $this->render('recette/show.html.twig', [
            'recette' => $recette,
            'user' => $test,
            'recettesNav' => $recettes_navbar,
            'form' => $form->createView(),
            'commentaire' => $commentaire,
            'commentaires' => $commentaires,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_recette_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Recette $recette, RecetteRepository $recetteRepository): Response
    {
        $form = $this->createForm(RecetteType::class, $recette);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $recetteRepository->save($recette, true);

            return $this->redirectToRoute('app_home', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('recette/edit.html.twig', [
            'recette' => $recette,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_recette_delete', methods: ['POST'])]
    public function delete(Request $request, Recette $recette, RecetteRepository $recetteRepository, CommentaireRepository $commentaireRepository): Response
    {
        $recetteRepository->remove($recette, true);

        return $this->redirectToRoute('app_recette_index', [], Response::HTTP_SEE_OTHER);
    }
}
