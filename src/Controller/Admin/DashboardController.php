<?php

namespace App\Controller\Admin;
use App\Entity\Client;
use App\Entity\Messages;
use App\Entity\User;
use App\Entity\Welcome;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name:'admin')]
    public function index(): Response
    {
        
         return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Entrainement');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Client', 'fas fa-user', Client::class);
        yield MenuItem::linkToCrud('utilisateurs', 'fas fa-user', User::class);
        yield MenuItem::linkToCrud('demande de contact', 'fas fa-envelope', Messages::class);
        yield MenuItem::linkToCrud('WELCOME', ' fa-thin fa-hand-wave ', Welcome::class);
    }
}

