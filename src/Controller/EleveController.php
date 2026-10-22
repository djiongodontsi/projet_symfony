<?php

namespace App\Controller;

use App\Repository\EleveRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class EleveController extends AbstractController
{
    #[Route('/eleves', name: 'app_eleves_index')]
    public function index(EleveRepository $eleveRepository): Response
    {
        return $this->render('eleve/index.html.twig', [
            'eleves' => $eleveRepository->findAll(),
        ]);
    }
}