<?php

namespace App\DataFixtures;

use App\Entity\Classe;
use App\Entity\Cours;
use App\Entity\Eleve;
use App\Entity\Enseignant;
use App\Entity\Note;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        // 1. Créer 15 Classes
        $classes = [];
        $niveaux = ['6ème', '5ème', '4ème', '3ème', 'Seconde', 'Première', 'Terminale'];
        $lettres = ['A', 'B', 'C'];

        for ($i = 1; $i <= 15; $i++) {
            $classe = new Classe();
            $niveau = $faker->randomElement($niveaux);
            $classe->setNiveau($niveau);
            $classe->setNomClasse($niveau . ' ' . $faker->randomElement($lettres));
            $classe->setAnneeScolaire(2026);

            $manager->persist($classe);
            $classes[] = $classe;
        }

        // 2. Créer 30 Enseignants
        $enseignants = [];
        $matieres = ['Mathématiques', 'Français', 'Histoire-Géographie', 'Anglais', 'Physique-Chimie', 'SVT', 'Espagnol', 'Arts Plastiques', 'EPS', 'Philosophie'];

        for ($i = 1; $i <= 30; $i++) {
            $enseignant = new Enseignant();
            $enseignant->setNom($faker->lastName());
            $enseignant->setPrenom($faker->firstName());
            $enseignant->setEmail($faker->unique()->email());
            $enseignant->setMatierePrincipale($faker->randomElement($matieres));

            $manager->persist($enseignant);
            $enseignants[] = $enseignant;
        }

        // 3. Créer 100 Cours
        $coursList = [];
        for ($i = 1; $i <= 100; $i++) {
            $cours = new Cours();
            $cours->setNomMatiere($faker->randomElement($matieres));
            $cours->setSalle('Salle ' . $faker->numberBetween(101, 310));
            $cours->setEnseignant($faker->randomElement($enseignants));
            $cours->setClasse($faker->randomElement($classes));

            $manager->persist($cours);
            $coursList[] = $cours;
        }

        // 4. Créer 500 Élèves
        $eleves = [];
        for ($i = 1; $i <= 500; $i++) {
            $eleve = new Eleve();
            $eleve->setNom($faker->lastName());
            $eleve->setPrenom($faker->firstName());
            $eleve->setDateNaissance($faker->dateTimeBetween('-18 years', '-10 years'));
            $eleve->setEmail($faker->unique()->safeEmail());
            $eleve->setClasse($faker->randomElement($classes));

            $manager->persist($eleve);
            $eleves[] = $eleve;

            // Par sécurité pour la mémoire avec de gros volumes, on flush par paquets de 100
            if ($i % 100 === 0) {
                $manager->flush();
            }
        }

        // 5. Créer 1 500 Notes
        for ($i = 1; $i <= 1500; $i++) {
            $note = new Note();
            // Génère une note aléatoire entre 5.0 et 20.0
            $note->setValeurNote(number_format($faker->randomFloat(1, 5, 20), 1, '.', ''));
            $note->setCoefficient($faker->randomElement([1, 2, 3, 4]));
            $note->setDate($faker->dateTimeBetween('-6 months', 'now'));
            $note->setEleve($faker->randomElement($eleves));

            $manager->persist($note);

            if ($i % 100 === 0) {
                $manager->flush();
            }
        }

        // Sauvegarde finale pour le reste
        $manager->flush();
    }
}