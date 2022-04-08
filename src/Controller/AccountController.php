<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AccountController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager){
        $this->entityManager=$entityManager;
    }

    /**
     * @Route("/account", name="account")
     */
    public function index(Request $request): Response
    {
        //$users = $this->entityManager->getRepository(User::class)->findAll();
        return $this->render('account/index.html.twig', [
           // 'users' =>$users,
        ]);
    }
}
