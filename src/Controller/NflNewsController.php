<?php

namespace App\Controller;

use App\Service\CallApiService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NflNewsController extends AbstractController
{

    /**
     * @Route("/nfl_news", name="nflNews")
     */
    public function index(CallApiService $callApiService): Response
    {
        return $this->render('nfl_news/index.html.twig',[
            'datas' => $callApiService->getNflNewsDatas(),
        ] );
    }

    /**
     * @Route("/nfl_new}", name="nflNew")
     */
    public function show(CallApiService $callApiService): Response
    {
        return $this->render('nfl_news/show.html.twig',[
            'datas' => $callApiService->getNflNewsDatas(),
        ]);

    }
}
