<?php

namespace App\Controller\Admin;

use App\Entity\Admin;
use App\Entity\Event;
use App\Entity\Article;
use App\Entity\Category;
use App\Entity\Emprunteur;
use App\Entity\Reservation;
use App\Entity\CategoryEmprunteur;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\User\User;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        //return $this->render();
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Sessad Pretotheque');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Tableau de bord', 'fa fa-home');
        yield MenuItem::linkToCrud('Administrateur', 'fa fa-user', Admin::class);
        yield MenuItem::linkToCrud('Categories', 'fa fa-list', Category::class);
        yield MenuItem::linkToCrud('Articles', 'fa fa-tag', Article::class);
        yield MenuItem::linkToCrud('Categorie emprunteurs', 'fa fa-bookmark', CategoryEmprunteur::class);
        yield MenuItem::linkToCrud('Emprunteurs', 'fa fa-user-circle-o', Emprunteur::class);
        yield MenuItem::linkToCrud('Emprunt en cours', 'far fa-calendar-alt', Reservation::class);
        yield MenuItem::linkToCrud('Evenement', 'far fa-calendar-alt', Event::class);
        yield MenuItem::linkToRoute('Retour à l\'accueil', 'fa fa-archive', 'home');
    }
}
