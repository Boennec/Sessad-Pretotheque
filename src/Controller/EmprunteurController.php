<?php

namespace App\Controller;

use App\Entity\Emprunteur;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EmprunteurController extends AbstractController
{

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    /**
     * @Route("/les-emprunteurs", name="emprunteurs")
     */
    public function index(): Response
    {

        $emprunteurs = $this->entityManager->getRepository(Emprunteur::class)->findAll();

        

        return $this->render('emprunteur/index.html.twig', [

            'emprunteurs' => $emprunteurs

        ]);
    }
}
