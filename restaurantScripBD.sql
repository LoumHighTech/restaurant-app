-- Création de la base de données
CREATE DATABASE IF NOT EXISTS restaurant_universitaire;
USE restaurant_universitaire;

-- Table utilisateurs
CREATE TABLE utilisateurs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom_complet VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    mot_de_passe VARCHAR(255) NOT NULL,
    telephone VARCHAR(20) NOT NULL,
    adresse VARCHAR(255),
    role ENUM('client', 'livreur', 'admin') NOT NULL DEFAULT 'client',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- Table abonnements
CREATE TABLE abonnements (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    type ENUM('7j', '15j', '30j') NOT NULL,
    date_debut DATE NOT NULL,
    date_fin DATE NOT NULL,
    prix DECIMAL(10,2) NOT NULL,
    statut ENUM('actif', 'expiré', 'annulé') DEFAULT 'actif',
    FOREIGN KEY (user_id) REFERENCES utilisateurs(id) ON DELETE CASCADE
) ENGINE=InnoDB;

-- Table plats
CREATE TABLE plats (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL UNIQUE,
    description TEXT,
    prix DECIMAL(10,2) NOT NULL,
    categorie ENUM('entrée', 'plat_principal', 'dessert', 'boisson') NOT NULL,
    image_url VARCHAR(255),
    disponible BOOLEAN DEFAULT TRUE
) ENGINE=InnoDB;

-- Table commandes
CREATE TABLE commandes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    date_commande DATETIME DEFAULT CURRENT_TIMESTAMP,
    montant_total DECIMAL(10,2) NOT NULL,
    statut ENUM('en_attente', 'confirmée', 'en_préparation', 'en_livraison', 'livrée', 'annulée') DEFAULT 'en_attente',
    type_livraison ENUM('livraison', 'à_emporter') NOT NULL,
    FOREIGN KEY (user_id) REFERENCES utilisateurs(id) ON DELETE CASCADE
) ENGINE=InnoDB;

-- Table details_commandes
CREATE TABLE details_commandes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    commande_id INT NOT NULL,
    plat_id INT NOT NULL,
    quantite INT DEFAULT 1,
    prix_unitaire DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (commande_id) REFERENCES commandes(id) ON DELETE CASCADE,
    FOREIGN KEY (plat_id) REFERENCES plats(id)
) ENGINE=InnoDB;

-- Table livreurs
CREATE TABLE livreurs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL UNIQUE,
    statut ENUM('disponible', 'en_livraison') DEFAULT 'disponible',
    note_moyenne FLOAT DEFAULT 0.0,
    FOREIGN KEY (user_id) REFERENCES utilisateurs(id) ON DELETE CASCADE
) ENGINE=InnoDB;

-- Table livraisons
CREATE TABLE livraisons (
    id INT AUTO_INCREMENT PRIMARY KEY,
    commande_id INT NOT NULL UNIQUE,
    livreur_id INT NOT NULL,
    date_debut DATETIME,
    date_fin DATETIME,
    statut ENUM('en_cours', 'livrée', 'annulée') DEFAULT 'en_cours',
    FOREIGN KEY (commande_id) REFERENCES commandes(id) ON DELETE CASCADE,
    FOREIGN KEY (livreur_id) REFERENCES livreurs(id)
) ENGINE=InnoDB;

-- Table paiements
CREATE TABLE paiements (
    id INT AUTO_INCREMENT PRIMARY KEY,
    commande_id INT NOT NULL,
    montant DECIMAL(10,2) NOT NULL,
    methode ENUM('carte', 'mobile_money', 'espèces') NOT NULL,
    statut ENUM('réussi', 'échoué', 'en_attente') DEFAULT 'en_attente',
    date_paiement DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (commande_id) REFERENCES commandes(id) ON DELETE CASCADE
) ENGINE=InnoDB;

-- Table evaluations
CREATE TABLE evaluations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    plat_id INT,
    livreur_id INT,
    note INT NOT NULL CHECK (note BETWEEN 1 AND 5),
    commentaire TEXT,
    date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES utilisateurs(id) ON DELETE CASCADE,
    FOREIGN KEY (plat_id) REFERENCES plats(id),
    FOREIGN KEY (livreur_id) REFERENCES livreurs(id)
) ENGINE=InnoDB;

-- Index pour optimiser les performances
CREATE INDEX idx_email ON utilisateurs(email);
CREATE INDEX idx_commande_user ON commandes(user_id);
CREATE INDEX idx_livraison_statut ON livraisons(statut);
CREATE INDEX idx_plat_categorie ON plats(categorie);

-- Insertion des données de démonstration

-- Utilisateurs
INSERT INTO utilisateurs (nom_complet, email, mot_de_passe, telephone, adresse, role) VALUES
('Jean Dupont', 'jean.dupont@univ.edu', SHA2('pass123', 256), '221771234567', 'Résidence A, Chambre 13', 'client'),
('Amadou Ba', 'amadou.ba@livreur.com', SHA2('livreurpass', 256), '221761112233', NULL, 'livreur'),
('Admin Restaurant', 'admin@resto.sn', SHA2('adminpass', 256), '221338001122', NULL, 'admin');

-- Plats
INSERT INTO plats (nom, description, prix, categorie, image_url) VALUES
('Thiéboudienne', 'Plat traditionnel sénégalais avec poisson et légumes frais', 2500, 'plat_principal', 'images/thieboudienne.jpg'),
('Poulet Yassa', 'Poulet mariné aux oignons et citron, accompagné de riz', 2000, 'plat_principal', 'images/poulet_yassa.jpg'),
('Salade de fruits', 'Mélange de fruits frais de saison avec sirop léger', 1500, 'dessert', 'images/salade_fruits.jpg'),
('Jus de Bissap', 'Boisson rafraîchissante à base d\'hibiscus', 800, 'boisson', 'images/bissap.jpg');

-- Abonnements
INSERT INTO abonnements (user_id, type, date_debut, date_fin, prix, statut) VALUES
(1, '30j', '2025-06-01', '2025-07-01', 50000, 'actif');

-- Commandes
INSERT INTO commandes (user_id, montant_total, statut, type_livraison) VALUES
(1, 3500, 'livrée', 'livraison'),
(1, 2000, 'en_attente', 'à_emporter');

-- Détails commandes
INSERT INTO details_commandes (commande_id, plat_id, quantite, prix_unitaire) VALUES
(1, 1, 1, 2500),
(1, 4, 1, 800),
(2, 2, 1, 2000);

-- Livreurs
INSERT INTO livreurs (user_id, statut, note_moyenne) VALUES
(2, 'disponible', 4.8);

-- Livraisons
INSERT INTO livraisons (commande_id, livreur_id, date_debut, date_fin, statut) VALUES
(1, 1, '2025-06-01 12:45:00', '2025-06-01 13:15:00', 'livrée');

-- Paiements
INSERT INTO paiements (commande_id, montant, methode, statut) VALUES
(1, 3500, 'mobile_money', 'réussi'),
(2, 2000, 'carte', 'en_attente');

-- Évaluations
INSERT INTO evaluations (user_id, plat_id, livreur_id, note, commentaire) VALUES
(1, 1, 1, 5, 'Plat délicieux et livraison rapide!'),
(1, NULL, 1, 5, 'Service professionnel et ponctuel');