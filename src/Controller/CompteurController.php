<?php

namespace App\Controller;

use App\Entity\Attribution;
use App\Entity\Compteur;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CompteurController extends AbstractController
{
    #[Route('/compteurliste', name: 'app_compteurliste')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $compteur = new Compteur();
        $db = $doctrine->getManager();
        $data['compteurs'] = $db->getRepository(Compteur::class, $compteur)->findAll();
        return $this->render('compteur/liste.html.twig', $data);
    }

    #[Route('/getIdCompteur', name: 'app_getIdCompteur')]
    public function getIdCompteur(ManagerRegistry $doctrine): Response
    {
        
            $id = $_GET['id'];
            //echo $id; die();
            $compteur = new Compteur();
            $db = $doctrine->getManager();
            $data['compteurs'] = $db->getRepository(Compteur::class, $compteur)->findAll();
            $data['id'] = $id;
            return $this->render('compteur/liste.html.twig', $data);
    }
}
