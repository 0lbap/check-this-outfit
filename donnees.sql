INSERT INTO Clients (email, motDePasse, nom, prenom, ville, adresse, telephone) VALUES ("pablo.laviron@etu.umontpellier.fr", "$2y$10$uqCQMwn592CuQeaa1rdZA.R3/2kNQn85DaBKbFlNNuy5gmEklRnOm", "Laviron", "Pablo", "Montpellier", "4 Impasse de la fontaine", "0712345678"); -- Mdp = password
INSERT INTO Clients (email, motDePasse, nom, prenom, ville, adresse, telephone) VALUES ("axel.cazorla@etu.umontpellier.fr", "$2y$10$2r3wtOjStccDNPLV0l53x.f4Yq2MlCjdfzmCXaQz0piVPn9JTNGyG", "Cazorla", "Axel", "Montpellier", "103 Rue de l école", "0723456789"); -- Mdp = 12345678
INSERT INTO Commandes (dateCommande, email, etat) VALUES ("2020-10-12", "pablo.laviron@etu.umontpellier.fr", "En cours");
INSERT INTO Commandes (dateCommande, email, etat) VALUES ("2020-06-24", "axel.cazorla@etu.umontpellier.fr", "Livré");
INSERT INTO Lignescommandes (idCommande, idProduit, quantite, montant) VALUES (1, 2, 1, 890.99);
INSERT INTO Lignescommandes (idCommande, idProduit, quantite, montant) VALUES (2, 1, 3, 2489.97);
INSERT INTO Produits VALUES
(1, 'BOUQUET', 'Carhartt WIP', 'T-shirt', 'blablabla', 'images/produits/1.jpg', 48.95, 49, 'Blanc'),
(2, 'HARP', 'Carhartt WIP', 'T-shirt', 'blablabla', 'images/produits/2.jpg', 38.95, 40, 'Noir'),
(3, 'MINERAL WASH PO', 'Vans', 'Sweatshirt', 'blablabla', 'images/produits/3.jpg', 75, 11, 'Marron'),
(4, 'OFF HANDO', 'Santa Cruz', 'Sweatshirt', 'blablabla', 'images/produits/4.jpg', 69.95, 35, 'Vert'),
(5, 'NEW SACRAMENTO', 'Dickies', 'Chemise', 'blablabla', 'images/produits/5.jpg', 59.99, 50, 'Vert'),
(8, 'JAPANESE WAVE DOT', 'Santa Cruz', 'Sweatshirt', 'bla', 'images/produits/8.jpg', 74.95, 34, 'Noir'),
(6, 'FAIRMOUNT COAT', 'Carhartt WIP', 'Veste', 'blablabla', 'images/produits/6.jpg', 199.95, 25, 'Marron'),
(7, 'MN WOODBRIDGE II', 'Vans', 'Veste', 'blablabla', 'images/produits/7.jpg', 130, 8, 'Noir'),
(9, 'OTHER DOT', 'Santa Cruz', 'Accessoire', 'b', 'images/produits/9.jpg', 29.95, 70, 'Noir'),
(10, 'CLASSIC LABEL', 'Santa Cruz', 'Accessoire', 'bl', 'images/produits/10.jpg', 29.95, 6, 'Beige'),
(11, 'CLUB OVAL', 'Santa Cruz', 'Veste', 'blabla', 'images/produits/11.jpg', 74.9, 21, 'Noir'),
(12, 'OTHER DOT', 'Santa Cruz', 'Accessoire', 'blablablabla', 'images/produits/12.jpg', 21.95, 18, 'Noir'),
(13, 'MN WINTER BLOOM', 'Vans', 'T-shirt', 'gfdgdfgdf', 'images/produits/13.jpg', 37.95, 28, 'Blanc'),
(14, 'MN OFF THE WALL', 'Vans', 'Sweatshirt', 'rsghfdg', 'images/produits/14.jpg', 75, 3, 'Noir'),
(15, 'OFF WHITE', 'Vans', 'Pantalon', 'fdghfdhgf', 'images/produits/15.jpg', 69, 45, 'Noir'),
(16, 'AMERICAN SCRIPT', 'Carhartt WIP', 'Pantalon', 'bdgdfg', 'images/produits/16.jpg', 79.95, 31, 'Blanc');
