<?php
namespace App\DataFixtures;

use App\Entity\Classe;
use App\Entity\Cours;
use App\Entity\Eleve;
use App\Entity\Enseignant;
use App\Entity\Note;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // 1. Création des Classes
        $classe6eme = new Classe();
        $classe6eme->setNomClasse('6ème A');
        $classe6eme->setNiveau('Collège');
        $classe6eme->setAnneeScolaire(2026);
        $manager->persist($classe6eme);

        // 2. Création des Enseignants
        $profMaths = new Enseignant();
        $profMaths->setNom('Dupont');
        $profMaths->setPrenom('Jean');
        $profMaths->setEmail('jean.dupont@ecole.fr');
        $profMaths->setMatierePrincipale('Mathématiques');
        $manager->persist($profMaths);

        // 3. Création des Élèves (liés à la classe)
        $eleve1 = new Eleve();
        $eleve1->setNom('Martin');
        $eleve1->setPrenom('Lucas');
        $eleve1->setDateNaissance(new \DateTime('2014-05-12'));
        $eleve1->setEmail('lucas.martin@eleve.fr');
        $eleve1->setClasse($classe6eme);
        $manager->persist($eleve1);

        // 4. Création des Cours (liés au prof et à la classe)
        $coursMaths = new Cours();
        $coursMaths->setNomMatiere('Mathématiques');
        $coursMaths->setSalle('Salle 102');
        $coursMaths->setEnseignant($profMaths);
        $coursMaths->setClasse($classe6eme);
        $manager->persist($coursMaths);

        // 5. Création des Notes (liées à l'élève)
        $note1 = new Note();
        $note1->setValeurNote(15.5);
        $note1->setCoefficient(2);
        $note1->setDate(new \DateTime('2026-03-01'));
        $note1->setEleve($eleve1);
        $manager->persist($note1);

        // Enregistrement de tout dans la base de données
        $manager->flush();
    }
}