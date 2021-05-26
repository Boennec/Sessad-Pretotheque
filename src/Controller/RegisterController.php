<?php

namespace App\Controller;

use App\Entity\Admin;
use App\Form\RegisterType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RegisterController extends AbstractController
{
    /**
     * @Route("/inscription", name="register")
     */
    public function index(): Response
    {

        $admin = new Admin();
        $form= $this->createForm(RegisterType::class, $admin);


        return $this->render('register/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
