<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Stage;

class ProStageController extends AbstractController
{
    /**
     * @Route("/", name="prostage_accueil")
     */
    public function index(): Response
    {
        //Récupérer le repositiry de l'entité STAGE
        $repositoryStage = $this->getDoctrine() -> getRepository(Stage::class);

        //Récupérer les stages enregistrées en BD
        $stages = $repositoryStage->findAll();
        return $this->render('pro_stage/index.html.twig', ['stages'=>$stages]);
    }

    /**
     * @Route("/filtreParEntreprise", name="prostage_FiltreParEntreprise")
     */
    public function filtrerParEntreprise(): Response
    {
        return $this->render('pro_stage/filtrerParEntreprise.html.twig');
    }

    /**
     * @Route("/filtreParFormation", name="prostage_FiltreParFormation")
     */
    public function filtrerParFormation(): Response
    {
        return $this->render('pro_stage/filtrerParFormation.html.twig');
    }

    /**
     * @Route("/stage/{stage}", name="prostage_Stage_Id")
     */
    public function afficherRessourcePeda($stage): Response
    {
        return $this->render('pro_stage/affichageRessource.html.twig', ['stage' => $stage]);
    }
}
