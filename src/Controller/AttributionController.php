<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AttributionController extends AbstractController
{
    #[Route('/attribution', name: 'app_attribution')]
    public function index(): Response
    {
        return $this->render('attribution/index.html.twig', [
            'controller_name' => 'AttributionController',
        ]);
    }
}
