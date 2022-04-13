<?php

namespace App\Controller;

use App\Entity\Abonnement;
use App\Form\AbonnementType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AbonnementController extends AbstractController
{
    #[Route('/abonnementliste', name: 'app_abonnementliste')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $abon = new Abonnement();
        $db = $doctrine->getManager();
        $form = $this->createForm(AbonnementType::class, $abon, array('action'=>$this->generateUrl('app_abonnement_add')));
        $data['form'] = $form->createView();
        $data['abonnements'] = $db->getRepository(Abonnement::class)->findAll();

        return $this->render('abonnement/liste.html.twig', $data);
    }



    #[Route('/abonnementadd', name: 'app_abonnement_add')]
    public function add(ManagerRegistry $doctrine, Request $request): Response
    {
        $abon = new Abonnement();
        $db = $doctrine->getManager();
        $form = $this->createForm(AbonnementType::class, $abon);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            
            $abon = $form->getData();
            $abon->setUsers($this->getUser());
            $db->persist($abon); 
            $db->flush();
        }
        
        return $this->redirectToRoute('app_abonnementliste');
    }
}
