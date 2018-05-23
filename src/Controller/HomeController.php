<?php

namespace App\Controller;

use App\Entity\Users;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller
{
    /**
     * @Route("/", name="home")
     */
    public function home()
    {

    // Création d'un nouvel utilisateur :
    $gege = new Users();
    $gege->setFirstname('gérad');
    $gege->setName('bouchard');
    $gege->setMail('mail');
    $gege->setPseudo('gégé');
    $gege->setPassword('motdepassegégé');

    // On récupère l'EntityManager
    $em = $this->getDoctrine()->getManager();

    // Étape 1 : On « persiste » l'entité
    $em->persist($gege);

    // Étape 2 : On « flush » tout ce qui a été persisté avant
    $em->flush();


    return $this->render('home/index.html.twig', [
        'controller_name' => 'HomeController',
    ]);
    }
}
