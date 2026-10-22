<?php

namespace App\Controller;

use App\Repository\EleveRepository;
use App\Repository\CoursRepository;
use App\Repository\EnseignantRepository;
use App\Repository\ClasseRepository;
use App\Repository\NoteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_dashboard')]
    public function index(
        EleveRepository $eleveRepo,
        CoursRepository $coursRepo,
        EnseignantRepository $ensRepo,
        ClasseRepository $classeRepo,
        NoteRepository $noteRepo
    ): Response {
        return $this->render('home/index.html.twig', [
            'totalEleves' => count($eleveRepo->findAll()),
            'totalCours' => count($coursRepo->findAll()),
            'totalEnseignants' => count($ensRepo->findAll()),
            'totalClasses' => count($classeRepo->findAll()),
            'totalNotes' => count($noteRepo->findAll()),
        ]);
    }
}