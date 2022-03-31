<?php

namespace App\Controller;

use App\Entity\NflTeam;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NflTeamController extends AbstractController
{
private $entityManager;

public function __construct(EntityManagerInterface $entityManager){
    $this->entityManager = $entityManager;
}

    /**
     * @Route("/les_equipes_nfl", name="nflTeams")
     */
    public function index(): Response
    {
        $nflteams = $this->entityManager->getRepository(NflTeam::class)->findAll();

        return $this->render('nfl_team/index.html.twig',[
            'nflTeams' => $nflteams,
        ]);
    }
}
