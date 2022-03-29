<?php

namespace App\Controller\Admin;

use App\Entity\NflTeam;
use App\Entity\FantasyTeam;
use App\Entity\User;
use App\Entity\Header;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Potos League');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Utilisateurs', 'fas fa-user', User::class);
        yield MenuItem::linkToCrud('Equipes fantasy', 'fas fa-users', FantasyTeam::class);
        yield MenuItem::linkToCrud('Equipes NFL', 'fa fa-heart', NflTeam::class);
        yield MenuItem::linkToCrud('Header', 'fa fa-desktop', Header::class);
    }
}
