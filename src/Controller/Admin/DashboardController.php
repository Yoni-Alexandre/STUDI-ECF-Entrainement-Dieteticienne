<?php

namespace App\Controller\Admin;

use App\Entity\Allergene;
use App\Entity\Avis;
use App\Entity\Recette;
use App\Entity\RecetteAllergene;
use App\Entity\Regime;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    public function __construct(private AdminUrlGenerator $adminUrlGenerator) {

    }
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $url = $this->adminUrlGenerator
            ->setController(UserCrudController::class)
            ->generateUrl();
        return $this->redirect($url);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Diététicienne-Nutritionniste');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Console d\'administration')->setCssClass('p-3 mb-2 bg-black text-white');
        yield MenuItem::linkToCrud('Utilisateur', 'fa fa-user', User::class);
        yield MenuItem::linkToCrud('Recette', 'fa fa-utensils', Recette::class);
        yield MenuItem::linkToCrud('Allergènes', 'fa fa-triangle-exclamation', Allergene::class);
        yield MenuItem::linkToCrud('Régime', 'fa fa-pen', Regime::class);
        yield MenuItem::linkToDashboard('Visualisation')->setCssClass('p-3 mt-2 mb-2 bg-black text-white');
        yield MenuItem::linkToCrud('Avis des clients', 'fa fa-flag', Avis::class);

    }
}
