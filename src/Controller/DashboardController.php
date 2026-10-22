<?php

namespace App\Controller;

use App\Repository\EleveRepository;
use App\Repository\CoursRepository;
use App\Repository\EnseignantRepository;
use App\Repository\ClasseRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DashboardController extends AbstractController
{
    #[Route('/', name: 'app_dashboard')]
    public function index(
        EleveRepository $eleveRepo,
        CoursRepository $coursRepo,
        EnseignantRepository $ensRepo,
        ClasseRepository $classeRepo
    ): Response {
        return $this->render('dashboard/index.html.twig', [
            'totalEleves' => $ensRepo ? count($eleveRepo->findAll()) : 0,
            'totalCours' => count($coursRepo->findAll()),
            'totalEnseignants' => count($ensRepo->findAll()),
            'totalClasses' => count($classeRepo->findAll()),
        ]);
    }
}