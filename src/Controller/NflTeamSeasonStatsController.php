<?php

namespace App\Controller;

use App\Service\CallApiService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NflTeamSeasonStatsController extends AbstractController
{
    /**
     * @Route("/stats_equipes_nfl", name="nflTeamSeasonStats")
     */
    public function index(CallApiService $callApiService): Response
    {
        return $this->render('nfl_team_season_stats/index.html.twig',[
            'datas' => $callApiService->getNflStandings(),

        ]);
    }
}
