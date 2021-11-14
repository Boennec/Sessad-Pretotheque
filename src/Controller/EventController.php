<?php

namespace App\Controller;

use App\Entity\Event;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EventController extends AbstractController
{

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }


    /**
     * @Route("/", name="home")
     */
    public function showEvent(): Response
    {

        $event = $this->entityManager->getRepository(Event::class)->findAll();

        

        return $this->render('home/index.html.twig', [
            'event' => $event
        ]);
    }
}
 