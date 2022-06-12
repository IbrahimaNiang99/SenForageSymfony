<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserRoleController extends AbstractController
{
    #[Route('/user/role', name: 'app_user_role')]
    public function index(): Response
    {
        return $this->render('user_role/index.html.twig', [
            'controller_name' => 'UserRoleController',
        ]);
    }
}
