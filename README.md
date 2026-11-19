# Gestion scolaire

Application web Symfony de gestion d'un établissement scolaire. Elle permet de gérer les classes, les élèves, les enseignants, les cours et les notes.

## Fonctionnalités

- Tableau de bord avec les principaux compteurs.
- Gestion des classes : création, consultation, modification et suppression.
- Gestion des élèves : création et filtrage par classe.
- Gestion des enseignants : création, consultation, modification et suppression.
- Gestion des cours : création, consultation et modification.
- Gestion des notes : création, consultation, modification et suppression.
- Interface responsive construite avec Bootstrap 5.

## Technologies

- PHP 8.4
- Symfony 8.1
- Doctrine ORM 3
- Doctrine Migrations
- Twig
- MySQL 8
- PHPUnit 13

## Prérequis

- PHP 8.4 ou supérieur
- Composer
- MySQL 8
- Symfony CLI recommandé
- Les extensions PHP nécessaires à Symfony et Doctrine

## Installation

1. Installer les dépendances :

```powershell
composer install
```

2. Configurer la connexion MySQL dans `.env.local` :

```dotenv
DATABASE_URL="mysql://app:!ChangeMe!@127.0.0.1:3306/proj_web_metier?serverVersion=8.0.32&charset=utf8mb4"
```

Ne mettez pas les identifiants de production directement dans `.env` ou dans ce dépôt.

3. Créer la base de données :

```powershell
php bin/console doctrine:database:create
```

4. Exécuter les migrations :

```powershell
php bin/console doctrine:migrations:migrate
```

5. Charger les données de démonstration :

```powershell
php bin/console doctrine:fixtures:load
```

Les fixtures peuvent remplacer les données existantes. Utilisez-les principalement en environnement de développement.

## Lancer l'application

Avec Symfony CLI :

```powershell
symfony serve -d
```

Puis ouvrir :

```text
http://127.0.0.1:8000
```

Pour arrêter le serveur :

```powershell
symfony server:stop
```

## Routes principales

| Page | URL |
|---|---|
| Tableau de bord | `/` |
| Élèves | `/eleves` |
| Classes | `/classe` |
| Enseignants | `/enseignant` |
| Cours | `/cours` |
| Notes | `/note` |

## Commandes utiles

Vérifier les routes :

```powershell
php bin/console debug:router
```

Vérifier Doctrine :

```powershell
php bin/console doctrine:schema:validate
php bin/console doctrine:migrations:status
```

Valider le conteneur Symfony :

```powershell
php bin/console lint:container
```

Valider les templates Twig :

```powershell
php bin/console lint:twig templates
```

Exécuter les tests :

```powershell
php bin/phpunit
```

Vider le cache :

```powershell
php bin/console cache:clear
```

## Structure du projet

- `src/Controller/` : contrôleurs Symfony.
- `src/Entity/` : entités Doctrine.
- `src/Form/` : formulaires Symfony.
- `src/Repository/` : dépôts Doctrine.
- `src/DataFixtures/` : données de démonstration.
- `templates/` : vues Twig.
- `migrations/` : migrations de base de données.
- `public/` : point d'entrée web.
- `tests/` : tests automatisés.

## Données de démonstration

La fixture `AppFixtures` génère :

- 15 classes
- 30 enseignants
- 100 cours
- 500 élèves
- 1500 notes
