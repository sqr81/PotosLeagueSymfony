<?php

namespace App\Controller;

use App\Entity\FantasyTeam;
use App\Entity\Header;
use App\Entity\User;
use App\Service\CallApiService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;


class HomeController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager){
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/", name="home")
     */
    public function index(SessionInterface $session, CallApiService $callApiService): Response
    {
        $users = $this->entityManager->getRepository(User::class)->findByIsBest(1);
        $headers = $this->entityManager->getRepository(Header::class)->findAll();
        
        //dd($callApiService->getNflData());
        dd($callApiService->getNflData());

        return $this->render('home/index.html.twig',[
            'users' => $users,
            'headers' => $headers,
            'datas' => $callApiService->getNflData(),
        ]);
    }
    
}
