<?php

namespace App\Controller;

use App\Entity\Client;
use App\Form\ClientType;
use Doctrine\Persistence\ManagerRegistry as PersistenceManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ClientController extends AbstractController
{
    #[Route('/clientliste', name: 'app_clientliste')]
    public function index(PersistenceManagerRegistry $doctrine): Response
    {
        $db = $doctrine->getManager();
        $client = new Client();
        $form = $this->createForm(ClientType::class, $client, array('action'=>$this->generateUrl('app_clientadd')));
        $data['form'] = $form->createView();
        $data['clients'] = $db->getRepository(Client::class)->findAll();
        return $this->render('client/liste.html.twig', $data);
    }




    
    #[Route('/clientadd', name: 'app_clientadd')]
    public function add(PersistenceManagerRegistry $doctrine, Request $request): Response
    {
        $client = new Client();
        $db = $doctrine->getManager();
        $form = $this->createForm(ClientType::class, $client);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            
            $client = $form->getData();
            $client->setUsers($this->getUser());
            $db->persist($client);
            $db->flush();
        }
        return $this->redirectToRoute('app_clientliste');
    }
}
