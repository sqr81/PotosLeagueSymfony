<?php

namespace App\Controller;

use App\Service\CallApiService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NflInjuredPlayerController extends AbstractController
{
    /**
     * @Route("/nfl_injured_player", name="nflInjuredPlayer")
     */
    public function index(CallApiService $callApiService): Response
    {
        return $this->render('nfl_injured_player/index.html.twig',[
            'datas' => $callApiService->getNflInjuredPlayer(),
        ]);
    }
}
