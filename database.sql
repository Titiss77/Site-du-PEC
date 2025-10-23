-- database.sql
DROP DATABASE IF EXISTS club_natation;
CREATE DATABASE club_natation CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE club_natation;

-- Table admins
CREATE TABLE admins (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL,
  fullname VARCHAR(100) DEFAULT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- Table membres
CREATE TABLE membres (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nom VARCHAR(100) NOT NULL,
  prenom VARCHAR(100) NOT NULL,
  email VARCHAR(150) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL,
  date_naissance DATE DEFAULT NULL,
  role ENUM('membre','coach') DEFAULT 'membre',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- Table evenements
CREATE TABLE evenements (
  id INT AUTO_INCREMENT PRIMARY KEY,
  titre VARCHAR(255) NOT NULL,
  description TEXT,
  lieu VARCHAR(255),
  date_event DATETIME,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- Table resultats
CREATE TABLE resultats (
  id INT AUTO_INCREMENT PRIMARY KEY,
  evenement_id INT NOT NULL,
  membre_id INT,
  epreuve VARCHAR(255) NOT NULL,
  temps VARCHAR(50),
  place INT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (evenement_id) REFERENCES evenements(id) ON DELETE CASCADE,
  FOREIGN KEY (membre_id) REFERENCES membres(id) ON DELETE SET NULL
) ENGINE=InnoDB;

-- Table contacts (messages)
CREATE TABLE contacts (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nom VARCHAR(150),
  email VARCHAR(150),
  sujet VARCHAR(255),
  message TEXT,
  is_read TINYINT(1) DEFAULT 0,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- Table photos (galerie)
CREATE TABLE photos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  filename VARCHAR(255) NOT NULL,
  title VARCHAR(255) DEFAULT NULL,
  uploaded_by INT,
  uploaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (uploaded_by) REFERENCES admins(id) ON DELETE SET NULL
) ENGINE=InnoDB;

-- Exemple d'admin (mot de passe: admin123)
INSERT INTO admins (username, password, fullname)
VALUES ('admin', '$2y$10$wH6b3Yq5t0d6v6qJ2pY7VevYqVwqkJ2u1Vt5W9F1kZx7nUZHcKQGa', 'Administrateur');

-- La valeur hash ci-dessus correspond à password_hash('admin123', PASSWORD_DEFAULT)
-- Exemple de membres
INSERT INTO membres (nom, prenom, email, password, date_naissance, role)
VALUES 
('Dupont','Jean','jean.dupont@example.com', '$2y$10$8w9ZkOa4Vb3eF6bAwJtYoe2/9GqQmE2rK6z5bG5F3vVqKZk4Qe9Vm', '2002-04-15', 'membre'),
('Martin','Claire','claire.martin@example.com', '$2y$10$8w9ZkOa4Vb3eF6bAwJtYoe2/9GqQmE2rK6z5bG5F3vVqKZk4Qe9Vm', '1998-09-01', 'coach');

-- Hash above: same password sample e.g. "password" hashed. Replace with tes propres mots de passe.

-- Exemple d'événements
INSERT INTO evenements (titre, description, lieu, date_event)
VALUES 
('Meeting régional', 'Meeting régional ouvert à tous', 'Piscine centrale', '2025-06-21 09:00:00'),
('Championnat départemental', 'Sélection départementale', 'Piscine Olympic', '2025-07-10 10:00:00');

-- Exemple de résultats
INSERT INTO resultats (evenement_id, membre_id, epreuve, temps, place)
VALUES
(1, 1, '100m nage libre', '00:57.32', 2),
(2, 1, '200m dos', '02:15.10', 5);

-- Exemple photo
INSERT INTO photos (filename, title, uploaded_by) VALUES ('default_pool.jpg', 'Piscine principale', 1);

-- Exemple contact
INSERT INTO contacts (nom, email, sujet, message) VALUES ('Visiteur', 'visiteur@example.com', 'Renseignements', 'Bonjour, je souhaite m inscrire.');
