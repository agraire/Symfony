<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Stage;
use App\Repository\StageRepository;

use App\Entity\Formation;
use App\Repository\FormationRepository;

use App\Entity\Entreprise;
use App\Repository\EntrepriseRepository;

class ProStageController extends AbstractController
{
    /**
     * @Route("/", name="prostage_accueil")
     */
    public function index(StageRepository $repositoryStage): Response
    {
        //Récupérer les stages enregistrées en BD
        $stages = $repositoryStage->findAll();
        return $this->render('pro_stage/index.html.twig', ['stages'=>$stages]);
    }

    /**
     * @Route("/filtreParEntreprise", name="prostage_FiltreParEntreprise")
     */
    public function filtrerParEntreprise(EntrepriseRepository $repositoryEntreprises): Response
    {
        $entreprises = $repositoryEntreprises->findAll();
        return $this->render('pro_stage/filtrerParEntreprise.html.twig', ['entreprises' => $entreprises]);
    }

    /**
     * @Route("/filtreParFormation/{nom}", name="prostage_FiltreParFormation")
     */
    public function filtrerParFormation(FormationRepository $repositoryFormations, $nom): Response
    {
        $formations = $repositoryFormations->findAll();
        return $this->render('pro_stage/filtrerParFormation.html.twig',['nomFormation' => $formations, 'LaFormation' => $nom]);
    }

    /**
     * @Route("/stage/{stage}", name="prostage_StageId")
     */
    public function stageId(stage $stage): Response
    {
        return $this ->render('pro_stage/stageId.html.twig', ['stage' => $stage]);
    }


    /**
     * @Route("/entreprise/{id}", name="prostage_EntrepriseID")
     */
    public function entrepriseId(Entreprise $entreprise):Response
    {
        return $this -> render('pro_stage/entrepriseId.html.twig', ['entreprise' => $entreprise]);
    }



    /**
     * @Route("/stage/{stage}", name="prostage_Stage_Id")
     */
    public function afficherRessourcePeda($stage): Response
    {
        return $this->render('pro_stage/affichageRessource.html.twig', ['stage' => $stage]);
    }
}
