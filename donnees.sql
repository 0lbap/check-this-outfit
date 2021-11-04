INSERT INTO Clients (email, motDePasse, nom, prenom, ville, adresse, telephone) VALUES ("pablo.laviron@etu.umontpellier.fr", "$2y$10$uqCQMwn592CuQeaa1rdZA.R3/2kNQn85DaBKbFlNNuy5gmEklRnOm", "Pablo", "Laviron", "Montpellier", "4 Impasse de la fontaine", "0712345678"); -- Mdp = password
INSERT INTO Clients (email, motDePasse, nom, prenom, ville, adresse, telephone) VALUES ("axel.cazorla@etu.umontpellier.fr", "$2y$10$2r3wtOjStccDNPLV0l53x.f4Yq2MlCjdfzmCXaQz0piVPn9JTNGyG", "Axel", "Cazorla", "Montpellier", "103 Rue de l école", "0723456789"); -- Mdp = 12345678
INSERT INTO Produits (nom, marque, categorie, descriptif, photo, prix, stock) VALUES ("Iphone 13", "Apple", "Téléphone", "A15 Bionic chip, Dual 12MP camera system", "https://www.pngitem.com/pimgs/m/525-5259250_apple-ios-13-iphone-hd-png-download-apple.png", 829.99, 98);
INSERT INTO Produits (nom, marque, categorie, descriptif, photo, prix, stock) VALUES ("Galaxy S21", "Samsung", "Téléphone", "Écran ultra fluide 120Hz, Capteur 64MP", "https://v1.vodafone.it/portal/resources/media/Images/demag/smartphone/samsung-galaxy-s21-ultra-black-729x726-backside.png", 890.99, 85);
INSERT INTO Commandes (dateCommande, email, etat) VALUES ("2020-10-12", "pablo.laviron@etu.umontpellier.fr", "En cours");
INSERT INTO Commandes (dateCommande, email, etat) VALUES ("2020-06-24", "axel.cazorla@etu.umontpellier.fr", "Livré");
INSERT INTO Lignescommandes (idCommande, idProduit, quantite, montant) VALUES (1, 2, 1, 890.99);
INSERT INTO Lignescommandes (idCommande, idProduit, quantite, montant) VALUES (2, 1, 3, 2489.97);
