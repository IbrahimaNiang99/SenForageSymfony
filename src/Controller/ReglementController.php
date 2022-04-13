<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ReglementController extends AbstractController
{
    #[Route('/reglement', name: 'app_reglement')]
    public function index(): Response
    {
        return $this->render('reglement/index.html.twig', [
            'controller_name' => 'ReglementController',
        ]);
    }
}
