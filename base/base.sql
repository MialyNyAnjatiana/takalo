create database takalo;
use takalo;


-- TABLE USER
CREATE TABLE User (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(100) NOT NULL UNIQUE,
    mdp VARCHAR(255) NOT NULL,
    nom VARCHAR(100) NOT NULL
);

-- TABLE CATEGORIE
CREATE TABLE categorie (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL
);

-- TABLE OBJET
CREATE TABLE objet (
    id INT AUTO_INCREMENT PRIMARY KEY,
    description TEXT NOT NULL,
    prix DECIMAL(10,2) NOT NULL,
    idUser INT NOT NULL,
    idCategorie INT NOT NULL,
    FOREIGN KEY (idUser) REFERENCES User(id) ON DELETE CASCADE,
    FOREIGN KEY (idCategorie) REFERENCES categorie(id) ON DELETE CASCADE
);

-- TABLE PHOTO
CREATE TABLE photo (
    id INT AUTO_INCREMENT PRIMARY KEY,
    lien_photo VARCHAR(255) NOT NULL,
    idObjet INT NOT NULL,
    FOREIGN KEY (idObjet) REFERENCES objet(id) ON DELETE CASCADE
);

-- TABLE DEMANDE_ECHANGE
CREATE TABLE demande_echange (
    id INT AUTO_INCREMENT PRIMARY KEY,
    idUserEnvoyeur INT NOT NULL,
    idUserReceveur INT NOT NULL,
    idObjet INT NOT NULL,
    idObjetEchange INT NOT NULL,
    etat VARCHAR(50) DEFAULT 'en_attente',
    FOREIGN KEY (idUserEnvoyeur) REFERENCES User(id) ON DELETE CASCADE,
    FOREIGN KEY (idUserReceveur) REFERENCES User(id) ON DELETE CASCADE,
    FOREIGN KEY (idObjet) REFERENCES objet(id) ON DELETE CASCADE,
    FOREIGN KEY (idObjetEchange) REFERENCES objet(id) ON DELETE CASCADE
);


INSERT INTO User (email, mdp, nom) VALUES
('koly@gmail.com', '1234', 'Koly'),
('lana@gmail.com', '1234', 'Lana'),
('enzo@gmail.com', '1234', 'Enzo');


INSERT INTO categorie (nom) VALUES
('Electronique'),
('Vetements'),
('Livres'),
('Accessoires');


INSERT INTO objet (description, prix, idUser, idCategorie) VALUES
('iPhone 13 en bon etat', 2500.00, 1, 1),
('Veste en cuir noir', 300.00, 2, 2),
('Roman dark romance', 50.00, 1, 3),
('Montre argent elegante', 200.00, 3, 4);


INSERT INTO photo (lien_photo, idObjet) VALUES
('iphone.jpg', 1),
('veste.jpg', 2),
('roman.jpg', 3),
('montre.jpg', 4);

INSERT INTO photo (lien_photo, idObjet) VALUES
('roman2.jpg', 3);


INSERT INTO demande_echange (idUserEnvoyeur, idUserReceveur, idObjet, idObjetEchange, etat) VALUES
(1, 2, 1, 2, 'en_attente'),
(2, 1, 2, 3, 'acceptee'),
(3, 1, 4, 1, 'refusee');



