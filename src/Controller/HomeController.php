<?php

namespace App\Controller;

use App\Repository\EleveRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(EleveRepository $eleveRepository): Response
    {
        // 1. On récupère les élèves depuis la base de données
        $eleves = $eleveRepository->findAll();

        // 2. On les envoie à la vue Twig
        return $this->render('home/index.html.twig', [
            'eleves' => $eleves,
        ]);
    }
}