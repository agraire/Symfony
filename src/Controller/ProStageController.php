<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProStageController extends AbstractController
{
    /**
     * @Route("/", name="prostage_acceuil")
     */
    public function index(): Response
    {
        return $this->render('pro_stage/index.html.twig');
    }

    /**
     * @Route("/ressources/345", name="prostage_ressource345")
     */
    public function afficherRessourcePeda(): Response
    {
        return $this->render('pro_stage/affichageRessource.html.twig', ['idRessource' => 345]);
    }
}
