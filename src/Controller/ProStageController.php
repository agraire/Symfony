<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProStageController extends AbstractController
{
    /**
     * @Route("/", name="prostage_accueil")
     */
    public function index(): Response
    {
        return $this->render('pro_stage/index.html.twig');
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
     * @Route("/ressources/{id}", name="prostage_ressource")
     */
    public function afficherRessourcePeda($id): Response
    {
        return $this->render('pro_stage/affichageRessource.html.twig', ['idRessource' => $id]);
    }
}
