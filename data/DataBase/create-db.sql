-- 1. Création de la base de données
CREATE DATABASE GestionPermanences; 
USE GestionPermanences;

-- 2. Table Enseignants
CREATE TABLE Enseignants (
    id_ens INT AUTO_INCREMENT PRIMARY KEY,
    nom_ens VARCHAR(50) NOT NULL,
    prenom_ens VARCHAR(50) NOT NULL,
    login_ens VARCHAR(30) UNIQUE NOT NULL,
    mdp_ens VARCHAR(255) NOT NULL, -- On prévoit large pour le hachage du mot de passe
    mail_ens VARCHAR(100) UNIQUE NOT NULL
);

-- 3. Table Étudiant
CREATE TABLE Etudiant (
    id_etu INT AUTO_INCREMENT PRIMARY KEY,
    nom_etu VARCHAR(50) NOT NULL,
    prenom_etu VARCHAR(50) NOT NULL,
    login_etu VARCHAR(30) UNIQUE NOT NULL,
    mdp_etu VARCHAR(255) NOT NULL,
    mail_etu VARCHAR(100) UNIQUE NOT NULL
);

-- 4. Table Permanence
-- Note : @ens_perm devient une clé étrangère pointant vers Enseignants
CREATE TABLE Permanence (
    id_perm INT AUTO_INCREMENT PRIMARY KEY,
    matiere_perm VARCHAR(100) NOT NULL,
    heure_perm TIME NOT NULL,
    salle_perm VARCHAR(20),
    date_perm DATE NOT NULL,
    id_ens_responsable INT,
    FOREIGN KEY (id_ens_responsable) REFERENCES Enseignants(id_ens) 
        ON DELETE CASCADE
);

-- 5. Table de relation : Inscrit (Plusieurs étudiants dans plusieurs permanences)
CREATE TABLE Inscrit (
    id_etu INT,
    id_perm INT,
    date_inscription TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id_etu, id_perm),
    FOREIGN KEY (id_etu) REFERENCES Etudiant(id_etu) ON DELETE CASCADE,
    FOREIGN KEY (id_perm) REFERENCES Permanence(id_perm) ON DELETE CASCADE
);

-- 6. Table de relation : Presenter (Lien entre Enseignants et Permanences)
-- Si une permanence peut avoir plusieurs profils (co-enseignement)
CREATE TABLE Presenter (
    id_ens INT,
    id_perm INT,
    PRIMARY KEY (id_ens, id_perm),
    FOREIGN KEY (id_ens) REFERENCES Enseignants(id_ens) ON DELETE CASCADE,
    FOREIGN KEY (id_perm) REFERENCES Permanence(id_perm) ON DELETE CASCADE
);
