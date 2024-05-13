<?php

namespace App\Controller\Admin;
use App\Entity\Users;
use App\Entity\Demandes;
use App\Entity\FichierRecus;
use App\Entity\DemandeEtats;
use App\Entity\DemandeTypes;
use App\Entity\SuiviInfo;
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
            ->setTitle('GDI');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
        yield MenuItem::linkToCrud('Utilisateurs', 'fas fa-list', Users::class);
        yield MenuItem::linkToCrud('Demandes', 'fas fa-list', Demandes::class);
        yield MenuItem::linkToCrud('Fichier reçus', 'fas fa-list', FichierRecus::class);
        yield MenuItem::linkToCrud('Demande Types', 'fas fa-list', DemandeTypes::class);
        yield MenuItem::linkToCrud('Etat de la demande', 'fas fa-list', DemandeEtats::class);
        yield MenuItem::linkToCrud("Suivi d'information", 'fas fa-list', SuiviInfo::class);
}
    } 
