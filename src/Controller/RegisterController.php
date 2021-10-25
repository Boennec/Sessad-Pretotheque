<?php

namespace App\Controller;

use App\Entity\Admin;
use App\Form\RegisterType;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Migrations\Configuration\EntityManager\ExistingEntityManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Security\Core\Validator\Constraints\UserPassword;

class RegisterController extends AbstractController
{
    //on va passer doctrine dans $entityManager dans le constructeur de la fonction, car c'est le manager de Doctrine
    //dont on se sert pour faire passer les informations 
    private $entityManager;
//on veut injecter dans le constructeur l'entitymanager Interface qui prendra entityManager
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager; //dans la propriété privée $entityManager on met dedans $entityManager, chargé de 
                                               // de l'entityManagerInterface
    }


    /**
     * @Route("/inscription", name="register")
     */
    //SF rentre dans la public function index() en embarquant avec lui l'objet request
    public function index(Request $request, UserPasswordHasherInterface $encoder): Response
    {

        $admin = new Admin();
        $form = $this->createForm(RegisterType::class, $admin);
//je demande au formulaire d'écouter la requete entrante, d'analyser un objet requete de SF, pour voir si il y a un $_POST 
//a l'intérieur. On utilise la méthode handleRequest (prise des data dans le $_POST) et on lui passe la requete qu'il y a sur le controller
//on utilise pour cela le mécanisme d'injections de dépendances:
//La méthode handleRequest rentre dans la public function index() en embarquant avec lui l'objet request
//Dans la fonction index, on utilise l'objet Request, la requete http, qui provient du composant httpFoundation.
//On demande de mettre cet objet Request dans la variable $request
//on passe cette variable $request au formulaire
//Ainsi le formulaire est cappable d'écouter la requete.
        $form->handleRequest($request);

        //est ce que le formulaire a été soummis et a été valide par rapport aux contraintes renseignées 
        //dans la fonction builform de RegisterType
        if ($form->isSubmitted() && $form->isValid()) {

            //on veut mettre dans l'objet $admin toutes les données provenant du formulaire
            $admin = $form->getData();

        //dans $password on a $encoder a qui on fait passer la methode d'encodage qui prend les paramètres: 
        //admin et le mot de passe a encoder
            $password = $encoder->encodePassword($admin, $admin->getPassword());

            $admin->setPassword($password);
//on a besoin d'enregistrer les données dans la base de données
//on demande a Doctrine de figer la data (persist)
            $this->entityManager->persist($admin);
//on demande a Doctrine d'expédier dans la bdd les données (flush)
            $this->entityManager->flush();
        }

        return $this->render('register/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
