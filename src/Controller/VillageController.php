<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VillageController extends AbstractController
{
    #[Route('/village', name: 'app_village')]
    public function index(): Response
    {
        return $this->render('village/index.html.twig', [
            'controller_name' => 'VillageController',
        ]);
    }
}
