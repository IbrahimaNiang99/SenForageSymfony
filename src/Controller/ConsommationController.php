<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ConsommationController extends AbstractController
{
    #[Route('/consommation', name: 'app_consommation')]
    public function index(): Response
    {
        return $this->render('consommation/index.html.twig', [
            'controller_name' => 'ConsommationController',
        ]);
    }
}
