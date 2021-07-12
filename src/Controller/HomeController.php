<?php

namespace App\Controller;

use App\Entity\Article;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

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

        

        return $this->render('home/index.html.twig', [

            'articles' => $articles
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
