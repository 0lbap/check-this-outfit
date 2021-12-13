INSERT INTO Clients (email, motDePasse, nom, prenom, ville, adresse, telephone) VALUES
("pablo.laviron@etu.umontpellier.fr", "$2y$10$uqCQMwn592CuQeaa1rdZA.R3/2kNQn85DaBKbFlNNuy5gmEklRnOm", "Laviron", "Pablo", "Montpellier", "4 Impasse de la fontaine", "0712345678"), -- Mdp = password
("axel.cazorla@etu.umontpellier.fr", "$2y$10$2r3wtOjStccDNPLV0l53x.f4Yq2MlCjdfzmCXaQz0piVPn9JTNGyG", "Cazorla", "Axel", "Montpellier", "103 Rue de l école", "0723456789"); -- Mdp = 12345678
ALTER TABLE Commandes AUTO_INCREMENT = 1;
INSERT INTO Commandes (dateCommande, email, etat) VALUES 
("2020-10-12", "pablo.laviron@etu.umontpellier.fr", "En cours"),
("2020-06-24", "axel.cazorla@etu.umontpellier.fr", "Livré");
ALTER TABLE Lignescommandes AUTO_INCREMENT = 1;
INSERT INTO Lignescommandes (idCommande, idProduit, quantite, montant) VALUES
(1, 2, 1, 890.99),
(2, 1, 3, 2489.97);
ALTER TABLE Produits AUTO_INCREMENT = 1;
INSERT INTO Produits (nom, marque, categorie, descriptif, photo, prix, stock, couleur) VALUES
('Classic Crew', 'Vans', 'T-shirt', 'blablabla', 'images/produits/1.jpg', 48.95, 49, 'Noir'),
('Carbon', 'Element', 'Veste', 'blablabla', 'images/produits/2.jpg', 38.95, 40, 'Noirs'),
('Off white', 'Vans', 'Sweatshirt', 'blablabla', 'images/produits/3.jpg', 75, 11, 'Noir'),
('Butterfly', 'Element', 'T-shirt', 'blablabla', 'images/produits/4.jpg', 69.95, 35, 'Jaune'),
('YourTurn', 'Dickies', 'Sweatshirt', 'blablabla', 'images/produits/5.jpg', 59.99, 50, 'Blanc'),
('Fairmount', 'Dickies', 'T-shirt', 'blablabla', 'images/produits/6.jpg', 199.95, 25, 'Noir'),
('Off black', 'Vans', 'Crop-top', 'blablabla', 'images/produits/7.jpg', 130, 8, 'Blanc'),
('Wave dot', 'Element', 'T-shirt', 'bla', 'images/produits/8.jpg', 74.95, 34, 'Noir'),
('Woodbridge', 'Element', 'T-shirt', 'b', 'images/produits/9.jpg', 29.95, 70, 'Blanc'),
('Pure label', 'Fila', 'Pantalon', 'bl', 'images/produits/10.jpg', 29.95, 6, 'Noir'),
('So icey', 'Fila', 'Veste', 'blabla', 'images/produits/11.jpg', 74.9, 21, 'Noir'),
('New look', 'Dickies', 'Sweatshirt', 'blablablabla', 'images/produits/12.jpg', 21.95, 18, 'Gris'),
('Pacific', 'Element', 'Accessoire', 'gfdgdfgdf', 'images/produits/13.jpg', 37.95, 28, 'Rouge'),
('Offline', 'Vans', 'Sweatshirt', 'rsghfdg', 'images/produits/14.jpg', 75, 3, 'Rouge'),
('New eagle', 'Dickies', 'Accessoire', 'fdghfdhgf', 'images/produits/15.jpg', 69, 45, 'Gris'),
('Black script', 'Fila', 'Crop-top', 'bdgdfg', 'images/produits/16.jpg', 79.95, 31, 'Noir'),
('Breakflip', 'Fila', 'Accessoire', 'bdgdfg', 'images/produits/17.jpg', 79.95, 31, 'Bleu'),
('Pure white', 'Fila', 'T-shirt', 'bdgdfg', 'images/produits/18.jpg', 79.95, 31, 'Blanc'),
('Chipmunk', 'Fila', 'Crop-top', 'bdgdfg', 'images/produits/19.jpg', 79.95, 31, 'Noir'),
('On the top', 'Element', 'Accessoire', 'bdgdfg', 'images/produits/20.jpg', 79.95, 31, 'Vert'),
('On the road', 'Vans', 'Pantalon', 'bdgdfg', 'images/produits/21.jpg', 79.95, 31, 'Noir'),
('Low risk', 'Dickies', 'Pantalon', 'bdgdfg', 'images/produits/22.jpg', 79.95, 31, 'Noir'),
('California', 'Dickies', 'Pantalon', 'bdgdfg', 'images/produits/23.jpg', 79.95, 31, 'Beige'),
('All planned', 'Element', 'Accessoire', 'bdgdfg', 'images/produits/24.jpg', 79.95, 31, 'Noir'),
('Deppster', 'Vans', 'Accessoire', 'bdgdfg', 'images/produits/25.jpg', 79.95, 31, 'Noir'),
('Woodworth', 'Dickies', 'Accessoire', 'bdgdfg', 'images/produits/26.jpg', 79.95, 31, 'Marron'),
('Simply off', 'Vans', 'Sweatshirt', 'bdgdfg', 'images/produits/27.jpg', 79.95, 31, 'Jaune'),
('London', 'Dickies', 'Veste', 'bdgdfg', 'images/produits/28.jpg', 79.95, 31, 'Vert'),
('Horizon', 'Element', 'Veste', 'bdgdfg', 'images/produits/29.jpg', 79.95, 31, 'Marron'),
('Icon', 'Fila', 'Sweatshirt', 'bdgdfg', 'images/produits/30.jpg', 79.95, 31, 'Jaune');
