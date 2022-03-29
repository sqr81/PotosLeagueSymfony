<?php

namespace App\Controller;

use App\Classe\Search;
use App\Entity\FantasyTeam;
use App\Form\SearchType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FantasyTeamController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager){
       $this->entityManager = $entityManager;
    }

    /**
     * @Route("/les_equipes", name="fantasyTeams")
     */
    public function index(Request $request): Response
    {
        $fantasyTeams=$this->entityManager->getRepository(FantasyTeam::class)->findAll();
        $search = new Search();
        $form = $this->createForm( SearchType::class, $search);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()){
            $fantasyTeams = $this->entityManager->getRepository(FantasyTeam::class)->findWithSearch();
        }


        return $this->render('fantasy_team/index.html.twig',[
            'fantasyTeams'=>$fantasyTeams,
            'form' =>$form->createView()
        ]);
    }

    /**
     * @Route("/equipe/{slug}", name="fantasyTeam")
     */
    public function show($slug){
        $fantasyTeam = $this->entityManager->getRepository(FantasyTeam::class)->findOneBySlug($slug);
        
        if(!$fantasyTeam)
        {
            return $this->redirectToRoute('les_equipes');
        }
        return $this->render('fantasy_team/show.html.twig',[
            'fantasy_team'=>$fantasyTeam,
        ]);
    }
}
