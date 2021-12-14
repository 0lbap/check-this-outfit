INSERT INTO Clients (email, motDePasse, nom, prenom, ville, adresse, telephone) VALUES
("pablo.laviron@etu.umontpellier.fr", "$2y$10$uqCQMwn592CuQeaa1rdZA.R3/2kNQn85DaBKbFlNNuy5gmEklRnOm", "Laviron", "Pablo", "Montpellier", "4 Impasse de la fontaine", "0712345678"), -- Mdp = password
("axel.cazorla@etu.umontpellier.fr", "$2y$10$2r3wtOjStccDNPLV0l53x.f4Yq2MlCjdfzmCXaQz0piVPn9JTNGyG", "Cazorla", "Axel", "Montpellier", "103 Rue de l école", "0723456789"); -- Mdp = 12345678
ALTER TABLE Commandes AUTO_INCREMENT = 1;
INSERT INTO Commandes (dateCommande, email, etat) VALUES 
("2020-10-12", "pablo.laviron@etu.umontpellier.fr", "En cours"),
("2020-06-24", "axel.cazorla@etu.umontpellier.fr", "Livré");
ALTER TABLE Lignescommandes AUTO_INCREMENT = 1;
INSERT INTO Lignescommandes (idCommande, idProduit, quantite, montant) VALUES
(1, 2, 1, 119.90),
(2, 1, 3, 86.85);
ALTER TABLE Produits AUTO_INCREMENT = 1;
INSERT INTO Produits (nom, marque, categorie, descriptif, photo, prix, stock, couleur) VALUES
('Classic Crew', 'Vans', 'T-shirt', 'T-shirt en coton et polyester, noir avec logo blanc, manches longues.', 'images/produits/1.jpg', 28.95, 49, 'Noir'),
('Carbon', 'Element', 'Veste', 'Doudoune coupe vent en textile, avec fermeture éclair et poches latérales.', 'images/produits/2.jpg', 119.90, 40, 'Noir'),
('Off white', 'Vans', 'Sweatshirt', 'Sweatshirt en coton et polyester, noir avec logo blanc.', 'images/produits/3.jpg', 59.99, 11, 'Noir'),
('Butterfly', 'Element', 'T-shirt', 'T-shirt 100% coton simple avec petite poche.', 'images/produits/4.jpg', 28.90, 35, 'Jaune'),
('YourTurn', 'Dickies', 'Sweatshirt', 'Sweatshirt 100% coton, couleur unie et poche ventrale.', 'images/produits/5.jpg', 59.99, 50, 'Blanc'),
('Fairmount', 'Dickies', 'T-shirt', 'T-shirt 100% coton simple couleur unie.', 'images/produits/6.jpg', 23.95, 25, 'Noir'),
('Off black', 'Vans', 'Crop-top', 'Crop-top en coton et polyester simple couleur unie.', 'images/produits/7.jpg', 25.90, 8, 'Blanc'),
('Wave dot', 'Element', 'T-shirt', 'T-shirt en coton et polyester simple couleur unie.', 'images/produits/8.jpg', 24.95, 34, 'Noir'),
('Woodbridge', 'Element', 'T-shirt', 'T-shirt en coton et polyester, manches longues, blanc avec motifs bleus sur les manches.', 'images/produits/9.jpg', 34.95, 70, 'Blanc'),
('Pure label', 'Fila', 'Pantalon', 'Pantalon jogger en coton, noir avec bandes blanches sur les bords.', 'images/produits/10.jpg', 49.95, 6, 'Noir'),
('So icey', 'Fila', 'Veste', 'Doudoune coupe vent en textile, avec fermeture éclair, couleur unie avec logo sur les manches.', 'images/produits/11.jpg', 94.99, 21, 'Noir'),
('New look', 'Dickies', 'Sweatshirt', 'Sweatshirt en coton et polyester, couleur unie avec logo et poche ventrale.', 'images/produits/12.jpg', 45.95, 18, 'Gris'),
('Pacific', 'Element', 'Accessoire', 'Bonet 100% laine, couleur unie avec logo.', 'images/produits/13.jpg', 22.95, 28, 'Rouge'),
('Offline', 'Vans', 'Sweatshirt', 'Sweatshirt en coton et polyester, couleur unie avec poche ventrale.', 'images/produits/14.jpg', 65.90, 3, 'Rouge'),
('New eagle', 'Dickies', 'Accessoire', 'Bonet en laine et polyester, couleur unie avec logo.', 'images/produits/15.jpg', 18.99, 45, 'Gris'),
('Black script', 'Fila', 'Crop-top', 'Crop-top 100% coton, couleur unie avec logo sur les manches.', 'images/produits/16.jpg', 29.90, 31, 'Noir'),
('Breakflip', 'Fila', 'Accessoire', 'Bob en coton et polyester, bleu foncé avec bandes rouges et blanches et logo.', 'images/produits/17.jpg', 37.95, 23, 'Bleu'),
('Pure white', 'Fila', 'T-shirt', 'T-shirt 100% coton simple couleur unie.', 'images/produits/18.jpg', 29.95, 37, 'Blanc'),
('Chipmunk', 'Fila', 'Crop-top', 'Crop-top en textile, noir avec logo et bandes blanches, col en V.', 'images/produits/19.jpg', 34.90, 9, 'Noir'),
('On the top', 'Element', 'Accessoire', 'Bob 100% coton, motif camouflage vert et marron.', 'images/produits/20.jpg', 33.99, 23, 'Vert'),
('On the road', 'Vans', 'Pantalon', 'Legging 100% coton, noir avec motifs de carreaux blancs sur les cotés.', 'images/produits/21.jpg', 38.90, 41, 'Noir'),
('Low risk', 'Dickies', 'Pantalon', 'Pantalon en coton et polyester, couleur unie.', 'images/produits/22.jpg', 69.95, 44, 'Noir'),
('California', 'Dickies', 'Pantalon', 'Pantalon chino 100% coton, couleur unie.', 'images/produits/23.jpg', 79.90, 29, 'Beige'),
('All planned', 'Element', 'Accessoire', 'Casquette 100% coton, couleur unie avec logo blanc.', 'images/produits/24.jpg', 27.99, 52, 'Noir'),
('Deppster', 'Vans', 'Accessoire', 'Ceinture en polyester, couleur unie avec boucle noire.', 'images/produits/25.jpg', 22.95, 38, 'Noir'),
('Woodworth', 'Dickies', 'Accessoire', 'Ceinture tressée en polyester, couleur unie avec boucle noire et logo blanc.', 'images/produits/26.jpg', 26.99, 27, 'Marron'),
('Simply off', 'Vans', 'Sweatshirt', 'Sweatshirt 100% coton, couleur unie avec poche ventrale.', 'images/produits/27.jpg', 70.90, 52, 'Jaune'),
('London', 'Dickies', 'Veste', 'Veste hiver en polyester, couleur unie avec grandes poches latérales et capuche.', 'images/produits/28.jpg', 99.95, 30, 'Vert'),
('Horizon', 'Element', 'Veste', 'Veste coupe vent en polyester, couleur unie avec poches et capuche.', 'images/produits/29.jpg', 65.99, 26, 'Marron'),
('Icon', 'Fila', 'Sweatshirt', 'Sweatshirt 100% coton, couleur unie avec poche ventrale.', 'images/produits/30.jpg', 64.90, 31, 'Jaune');
