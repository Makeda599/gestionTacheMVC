-- 1. Création de la base de données
CREATE DATABASE IF NOT EXISTS gestion_tachesMVC CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE gestion_tachesMVC;

-- 2. Création de la table des tâches
CREATE TABLE IF NOT EXISTS taches (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    date_echeance DATE NOT NULL,
    statut ENUM('en_cours', 'termine') DEFAULT 'en_cours'
) ENGINE=InnoDB;

-- 3. Insertion de vos données initiales (Optionnel - pour les tests)
INSERT INTO taches (id, nom, description, date_echeance, statut) VALUES
(1, 'Faire les devoirs', 'Terminer les exercices d\'algorithme', '2026-06-01', 'en_cours'),
(2, 'Réviser le langage C', 'Étudier les tableaux et les pointeurs', '2026-06-03', 'en_cours'),
(3, 'Faire du sport', 'Faire 30 minutes d\'exercices au poids du corps', '2026-06-05', 'en_cours'),
(4, 'Lire le Coran', 'Lire et mémoriser quelques versets', '2026-06-07', 'termine'),
(5, 'Travailler sur le projet', 'Continuer le design du projet hôtel sur Figma', '2026-06-10', 'termine'),
(6, 'Publier sur Instagram', 'Poster un produit de la boutique en ligne', '2026-06-12', 'termine');