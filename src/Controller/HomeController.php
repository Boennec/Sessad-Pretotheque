<?php

namespace App\Controller;

use App\Entity\Event;
use App\Entity\Article;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{

private $entityManager;

public function __construct(EntityManagerInterface $entityManager)
{
    $this->entityManager = $entityManager;
}

    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        $articles = $this->entityManager->getRepository(Article::class)->findByIsVisible(1);
        $events = $this->entityManager->getRepository(Event::class)->findBy([], array('id' => 'DESC'), 1);
        

        return $this->render('home/index.html.twig', [

            'articles' => $articles,
            'events'    => $events
            
        ]);

        

    }


    /**
     * @Route("/charte", name="charte")
     */
    public function showCharte(): response
    {

        return $this->render('home/charte.html.twig');
    }
}
