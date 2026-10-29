<?php

namespace App\Controller;

use App\Entity\Eleve;
use App\Form\EleveType;
use App\Repository\EleveRepository;
use App\Repository\ClasseRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class EleveController extends AbstractController
{
    #[Route('/eleves', name: 'app_eleve_index', methods: ['GET'])]
    public function index(Request $request, EleveRepository $eleveRepository, ClasseRepository $classeRepository): Response
    {
        // Récupère la classe sélectionnée dans l'URL (ex: ?classe=3)
        $classeId = $request->query->get('classe');

        // Récupère les élèves filtrés ou non via le repository
        $eleves = $eleveRepository->findByClasse($classeId);

        return $this->render('eleve/index.html.twig', [
            'eleves' => $eleves,
            'classes' => $classeRepository->findAll(), // Pour alimenter le menu déroulant
            'current_classe' => $classeId,
        ]);
    }

    #[Route('/eleves/new', name: 'app_eleve_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $em): Response
    {
        $eleve = new Eleve();
        $form = $this->createForm(EleveType::class, $eleve);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($eleve);
            $em->flush();

            return $this->redirectToRoute('app_eleve_index');
        }

        return $this->render('eleve/new.html.twig', [
            'form' => $form,
        ]);
    }
}