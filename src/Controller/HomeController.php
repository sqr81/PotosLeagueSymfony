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
        $bestUsers = $this->entityManager->getRepository(User::class)->findByIsBest(1);
        $headers = $this->entityManager->getRepository(Header::class)->findAll();
        $fantasyTeam = $this->entityManager->getRepository(FantasyTeam::class)->findOneByOwner($bestUsers);
        //dd($callApiService->getNflData());
        //dd($callApiService->getNflData([]));
        //dd($callApiService->getTeamSeasonData());
        //dd($callApiService->getNflStandings());
        
        return $this->render('home/index.html.twig',[
            'bestUsers' => $bestUsers,
            'headers' => $headers,
            'fantasyTeam' => $fantasyTeam,
            'datas' => $callApiService->getNflNewsDatas(),
            'dataBySeason' =>$callApiService->getTeamSeasonData(),
            'standings' => $callApiService->getNflStandings(),            
        ]);
    }
    
}
