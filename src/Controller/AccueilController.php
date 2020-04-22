<?php

namespace App\Controller;

use App\Entity\Jeu;
use App\Repository\ActivityRepository;
use App\Repository\JeuRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccueilController extends AbstractController
{
    private $nouveau;
    private $repository;
    
    /**
     * @param JeuRepository $nouveau
     * 
     * @return void
     */
    public function __construct(JeuRepository $nouveau, ActivityRepository $repository)
    {
        $this->nouveau = $nouveau;
        $this->repository = $repository;
    }
    /**
     * @Route("/", name="accueil")
     */
    public function index(): Response
    {   
        $jeu = $this->nouveau->findLatest();
        $activity = $this->repository->findLatest();
        return $this->render('accueil/index.html.twig', [
            'controller_name' => 'AccueilController',
            'jeux' => $jeu,
            'activities' => $activity
        ]);
    }
    /**
     * @Route("/game/show", name="game_show")
     */
    public function gameShow(): Response
    {
        $jeu = $this->nouveau->findAll();
        return $this->render('accueil/jeu.html.twig', [
            'controller_name' => 'AccueilController',
            'jeux' => $jeu
        ]);
    }
    /**
     * @Route("/activity/show", name="activity_show")
     */
    public function actShow(): Response
    {
        $activity = $this->repository->findAll();
        return $this->render('accueil/activity.html.twig', [
            'controller_name' => 'AccueilController',
            'activities' => $activity
        ]);
    }
    /**
    *@Route("/contact", name="contact")
    */
    public function contact(): Response
    {
        return $this->render('accueil/contact.html.twig', [
            'controller_name' => 'AccueilController'
        ]);
    }
}
