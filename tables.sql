DROP TABLE IF EXISTS Lignescommandes;
DROP TABLE IF EXISTS Commandes;
DROP TABLE IF EXISTS Produits;
DROP TABLE IF EXISTS Clients;

CREATE TABLE Clients (
    email VARCHAR(255),
    motDePasse VARCHAR(255),
    nom VARCHAR(255),
    prenom VARCHAR(255),
    ville VARCHAR(255),
    adresse VARCHAR(255),
    telephone VARCHAR(255),
    PRIMARY KEY (email)
);

CREATE TABLE Produits (
    idProduit INT AUTO_INCREMENT,
    nom VARCHAR(255),
    marque VARCHAR(255),
    categorie VARCHAR(255),
    descriptif VARCHAR(255),
    photo VARCHAR(255),
    prix FLOAT,
    stock INT,
    couleur VARCHAR(255),
    PRIMARY KEY (idProduit)
);

CREATE TABLE Commandes (
    idCommande INT AUTO_INCREMENT,
    dateCommande DATE,
    email VARCHAR(255) REFERENCES Clients(email),
    etat VARCHAR(255),
    PRIMARY KEY (idCommande)
);

CREATE TABLE Lignescommandes (
    idLigneCommande INT AUTO_INCREMENT,
    idCommande INT REFERENCES Commandes(idCommande),
    idProduit INT REFERENCES Produits(idProduit),
    quantite INT,
    montant FLOAT,
    PRIMARY KEY (idLigneCommande)
);
