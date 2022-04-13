<?php

namespace App\Controller;

use App\Entity\Role;
use App\Entity\User;
use App\Form\UserType;
use Doctrine\Persistence\ManagerRegistry ;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\UserRepository;

class UserController extends AbstractController
{
    #[Route('/userliste', name: 'app_userliste')]
    public function index(ManagerRegistry $doctrine, UserRepository $d): Response
    {
        $user = new User();
        $db = $doctrine->getManager();

        $form = $this->createForm(UserType::class, $user, array('action'=>$this->generateUrl('app_useradd')));
        $data['form'] = $form->createView();

        $data['users'] = $db->getRepository(User::class, $user)->findAll();
        $data['roles'] = $db->getRepository(Role::class, $user)->findAll();
       
        
        $data['userrole'] = $d->createQueryBuilder("SELECT * FROM Role");
        //$data['userrole'] = $db->getRepository()

        return $this->render('user/liste.html.twig', $data);
    }

    #[Route('/useradd', name: 'app_useradd')]
    public function add(ManagerRegistry $doctrine, Request $request): Response
    {
        $user = new User();
        $db = $doctrine->getManager();

        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ( $form->isSubmitted() && ($form->isValid())) {
            $user = $form->getData();
            //$user->setUser($this->getUser());
            //$r = $db->getRepository(Role::class)->find($user->getRole()->getId());
            $mdp = "Passer123";
            $mdp_hashed = password_hash($mdp, PASSWORD_DEFAULT);
            $user->setPassword($mdp_hashed);
            $db->persist($user);
            $db->flush();
        }
        
        return $this->redirectToRoute('app_userliste');
    }
}
