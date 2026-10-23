SET FOREIGN_KEY_CHECKS = 0;
TRUNCATE TABLE note;
TRUNCATE TABLE cours;
TRUNCATE TABLE eleve;
TRUNCATE TABLE enseignant;
TRUNCATE TABLE classe;
SET FOREIGN_KEY_CHECKS = 1;

-- CLASSES
INSERT INTO classe (id, nom_classe, niveau, annee_scolaire) VALUES
(1, '6ème A', 'Collège', 2026),
(2, '5ème A', 'Collège', 2026),
(3, '4ème A', 'Collège', 2026),
(4, '3ème A', 'Collège', 2026);

-- ENSEIGNANTS
INSERT INTO enseignant (id, nom, prenom, email, matiere_principale) VALUES
(1, 'Dupont',  'Jean',    'jean.dupont@ecole.fr',    'Mathématiques'),
(2, 'Bernard', 'Sophie',  'sophie.bernard@ecole.fr', 'Français'),
(3, 'Petit',   'Marc',    'marc.petit@ecole.fr',     'Histoire-Géographie'),
(4, 'Moreau',  'Claire',  'claire.moreau@ecole.fr',  'Anglais'),
(5, 'Laurent', 'Thomas',  'thomas.laurent@ecole.fr', 'Physique-Chimie');

-- ÉLÈVES
INSERT INTO eleve (id, nom, prenom, date_naissance, email, classe_id) VALUES
(1,  'Martin',   'Lucas',   '2014-05-12', 'lucas.martin@eleve.fr',    1),
(2,  'Durand',   'Emma',    '2014-08-23', 'emma.durand@eleve.fr',     1),
(3,  'Leroy',    'Hugo',    '2014-02-07', 'hugo.leroy@eleve.fr',      1),
(4,  'Roux',     'Chloé',   '2013-11-30', 'chloe.roux@eleve.fr',      2),
(5,  'Fournier', 'Nathan',  '2013-04-15', 'nathan.fournier@eleve.fr', 2),
(6,  'Girard',   'Léa',     '2013-09-02', 'lea.girard@eleve.fr',      2),
(7,  'Bonnet',   'Louis',   '2012-06-18', 'louis.bonnet@eleve.fr',    3),
(8,  'Lambert',  'Manon',   '2012-12-09', 'manon.lambert@eleve.fr',   3),
(9,  'Faure',    'Jules',   '2012-03-25', 'jules.faure@eleve.fr',     3),
(10, 'Mercier',  'Camille', '2011-07-14', 'camille.mercier@eleve.fr', 4),
(11, 'Blanc',    'Arthur',  '2011-10-01', 'arthur.blanc@eleve.fr',    4),
(12, 'Garnier',  'Inès',    '2011-01-27', 'ines.garnier@eleve.fr',    4);

-- COURS
INSERT INTO cours (id, nom_matiere, salle, enseignant_id, classe_id) VALUES
(1, 'Mathématiques',       'Salle 102', 1, 1),
(2, 'Français',            'Salle 105', 2, 1),
(3, 'Mathématiques',       'Salle 102', 1, 2),
(4, 'Histoire-Géographie', 'Salle 201', 3, 2),
(5, 'Anglais',             'Salle 204', 4, 3),
(6, 'Physique-Chimie',     'Labo 1',    5, 3),
(7, 'Mathématiques',       'Salle 103', 1, 4),
(8, 'Anglais',             'Salle 204', 4, 4);

-- NOTES
INSERT INTO note (valeur_note, coefficient, `date`, eleve_id) VALUES
(15.5, 2, '2026-10-01', 1),  (12.0, 1, '2026-10-08', 1),
(17.0, 2, '2026-10-01', 2),  (14.5, 3, '2026-10-09', 2),
(9.5,  2, '2026-10-02', 3),  (11.0, 1, '2026-10-10', 3),
(13.0, 2, '2026-10-02', 4),  (16.5, 3, '2026-10-11', 4),
(18.0, 2, '2026-10-03', 5),  (15.0, 1, '2026-10-12', 5),
(10.5, 2, '2026-10-03', 6),  (8.0,  2, '2026-10-13', 6),
(14.0, 3, '2026-10-04', 7),  (12.5, 1, '2026-10-14', 7),
(16.0, 2, '2026-10-04', 8),  (19.0, 3, '2026-10-15', 8),
(7.5,  2, '2026-10-05', 9),  (10.0, 1, '2026-10-16', 9),
(13.5, 2, '2026-10-05', 10), (15.5, 2, '2026-10-17', 10),
(11.5, 3, '2026-10-06', 11), (14.0, 1, '2026-10-18', 11),
(17.5, 2, '2026-10-06', 12), (16.0, 3, '2026-10-19', 12);