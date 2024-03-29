<?php

namespace App\Controller\Admin;

use App\Entity\Commentaire;
use App\Entity\Recette;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('DeliceDeCuisine');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToRoute('Home Site', 'fa fa-globe', 'app_home');
        yield MenuItem::linkToCrud('User', 'fa fa-user', User::class);
        yield MenuItem::linkToCrud('Recette','fa fa-utensils', Recette::class);
        yield  MenuItem::linkToCrud('Commentaire','fa fa-comment', Commentaire::class);
    }
}
