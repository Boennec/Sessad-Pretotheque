<?php

namespace App\Controller;

use App\Classe\Search;
use App\Entity\Article;
use App\Form\SearchType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    /**
     * @Route("/les-articles", name="articles")
     */
    public function index(): Response
    {
        $articles = $this->entityManager->getRepository(Article::class)->findAll();

        $search = new Search;
        $form = $this->createForm(SearchType::class, $search);


        return $this->render('article/index.html.twig', [
            'articles' => $articles,
            'form'     => $form->createView()
        ]);
    }


    /**
     * @Route("/article/{slug}", name="article")
     */
    public function show($slug): Response
    {

        

        $article = $this->entityManager->getRepository(Article::class)->findOneBySlug($slug);

        if (!$article) {

            return $this->redirectToRoute('articles');
        }


        return $this->render('article/show.html.twig', [
            'article' => $article
        ]);
    }
}





/**
     * @Route("/Un-article/{slug}", name="article")
     */
    //public function show($slug): Response
        // {

         //   $article = $this->entityManager->getRepository(Article::class)->findOneBySlug($slug);
       // if (!$article) {
        //    return $this->redirectToRoute('articles');
       // }
