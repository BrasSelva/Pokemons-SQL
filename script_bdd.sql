CREATE DATABASE projet_sql_pokemon;
USE projet_sql_pokemon;

CREATE TABLE dresseur(
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(50) NOT NULL,
    age INT,
    genre VARCHAR(1)
);

CREATE TABLE pokemons(
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(50) NOT NULL,
    niveau INT DEFAULT 1,
    exp_en_cours INT DEFAULT 0,
    id_dresseur INT REFERENCES dresseur(id)
);
    
CREATE TABLE types(
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(50) NOT NULL
);
     
CREATE TABLE attaques(
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR (50) NOT NULL,
    puissance INT NOT NULL,
    `precision` INT NOT NULL,
    description VARCHAR(100),
    id_type INT NOT NULL REFERENCES types(id)
);

CREATE TABLE est_de_type(
    id_pokemon INT REFERENCES pokemons(id),
    id_type INT REFERENCES type(id),
    PRIMARY KEY(id_pokemon,id_type)
);

INSERT INTO types(nom) VALUES('Feu'), ('Eau'), ('Plante'), ('Electrique'), ('Roche'), ('Vol');
INSERT INTO dresseur(nom, age, genre) VALUES('Brassica', 21, 'F'), ('Bob', 25, 'H'), ('Charlie', 18, 'N'), ('Jean', 21, 'H'), ('Eva', 30, 'F');

INSERT INTO pokemons (nom, niveau, exp_en_cours, id_dresseur) VALUES
('Bulbizarre', 5, 20, 1),
('Salameche', 5, 45, 2),
('Carapuce', 5, 10, 3),
('Pikachu', 6, 80, 4),
('Salamèche', 7, 60, 5),
('Rattata', 3, 30, 1),
('Dracaufeu', 8, 75, 2),
('Magicarpe', 4, 5, 3),
('Roucool', 5, 40, 4),
('Herbizarre', 6, 70, 5),
('Aspicot', 3, 15, 1),
('Miaouss', 4, 90, 2),
('Raichu', 7, 25, 3),
('Rapasdepic', 5, 50, 4),
('Abo', 3, 95, 5),
('Tentacool', 4, 85, 1),
('Chenipan', 2, 55, 2),
('Papilusion', 6, 35, 3),
('Rattatac', 4, 65, 4),
('Nosferapti', 3, 32, 5),
('Mewtwo', 10, 99, 1),
('Leveinard', 8, 78, 2),
('Goupix', 5, 12, 3),
('Mew', 9, 60, 4),
('Ronflex', 10, 42, 5),
('Grodoudou', 6, 88, 1),
('Piafabec', 4, 22, 2),
('Ramoloss', 7, 77, 3),
('Taupiqueur', 3, 18, 4),
('Tadmorv', 5, 48, 5),
-- Ajoutez d'autres pokémons avec des dresseurs différents...
('Pikachu', 3, 80, 1), -- Exemple de plusieurs dresseurs possédant le même Pokémon
('Pikachu', 4, 85, 4); -- Exemple de plusieurs dresseurs possédant le même Pokémon avec des stats différentes

INSERT INTO est_de_type (id_pokemon, id_type) VALUES
-- Pokémon avec un seul type
(1, 3), -- Bulbizarre est de type Plante
(2, 1), -- Salameche est de type Feu
(3, 2), -- Carapuce est de type Eau
(4, 4), -- Pikachu est de type Electrique
(5, 1), -- Salamèche est de type Feu
(6, 5), -- Rattata est de type Roche
(7, 1), -- Dracaufeu est de type Feu
(8, 2), -- Magicarpe est de type Eau
(9, 6), -- Roucool est de type Vol
(10, 3), -- Herbizarre est de type Plante
(11, 3), -- Aspicot est de type Plante
(12, 5), -- Miaouss est de type Roche
(13, 4), -- Raichu est de type Electrique
(14, 6), -- Rapasdepic est de type Vol
(15, 4), -- Abo est de type Electrique
(16, 2), -- Tentacool est de type Eau
(17, 3), -- Chenipan est de type Plante
(18, 6), -- Papilusion est de type Vol
(19, 5), -- Rattatac est de type Roche
(20, 4), -- Nosferapti est de type Electrique
-- Pokémon avec deux types
(21, 1), -- Mewtwo est de types Feu et Eau
(21, 2), -- Mewtwo est de types Feu et Eau
(22, 3), -- Leveinard est de types Eau et Plante
(22, 6), -- Leveinard est de types Eau et Plante
(23, 5), -- Goupix est de types Roche et Vol
(23, 6), -- Goupix est de types Roche et Vol
(24, 4), -- Mew est de types Vol et Electrique
(24, 6), -- Mew est de types Vol et Electrique
(25, 5), -- Ronflex est de types Electrique et Roche
(25, 4), -- Ronflex est de types Electrique et Roche
(26, 2), -- Grodoudou est de types Plante et Eau
(26, 6), -- Grodoudou est de types Plante et Eau
(27, 1), -- Piafabec est de types Feu et Eau
(27, 2), -- Piafabec est de types Feu et Eau
(28, 3), -- Ramoloss est de types Eau et Plante
(28, 6), -- Ramoloss est de types Eau et Plante
(29, 5), -- Taupiqueur est de types Roche et Vol
(29, 6), -- Taupiqueur est de types Roche et Vol
(30, 4), -- Tadmorv est de types Electrique et Roche
(30, 5), -- Tadmorv est de types Electrique et Roche
-- Nouveaux Pokémon avec des dresseurs différents
(31, 4), -- Pikachu est de type Feu
(32, 4); -- Pikachu est de type Eau

INSERT INTO attaques (nom, puissance, `precision`, description, id_type) VALUES
('Flammeche', 40, 100, 'Une boule de feu s\'échappe de la gueule du Pokémon.', 1), -- Type: Feu
('Lance-Flammes', 90, 85, 'Un puissant jet de flammes incinère l\'ennemi.', 1), -- Type: Feu
('Bulles d\'O', 35, 95, 'Le Pokémon crache des bulles d\'eau sur son adversaire.', 2), -- Type: Eau
('Hydrocanon', 110, 80, 'Un torrent d\'eau surpuissant balaye tout sur son passage.', 2), -- Type: Eau
('Fouet Lianes', 45, 90, 'Le Pokémon utilise ses lianes pour frapper l\'ennemi.', 3), -- Type: Plante
('Tempête Verte', 100, 75, 'Une violente tempête de feuilles vertes assaille l\'ennemi.', 3), -- Type: Plante
('Éclair', 50, 100, 'Une décharge électrique frappe l\'ennemi.', 4), -- Type: Electrique
('Tonnerre', 110, 70, 'Un coup de foudre dévastateur s\'abat sur l\'ennemi.', 4), -- Type: Electrique
('Jet de Pierres', 60, 95, 'Le Pokémon lance des pierres avec force sur son adversaire.', 5), -- Type: Roche
('Lance-Roches', 100, 80, 'Une pluie de rochers s\'abat violemment sur l\'ennemi.', 5), -- Type: Roche
('Coup d\'Aile', 35, 100, 'Le Pokémon frappe son adversaire avec ses ailes.', 6), -- Type: Vol
('Hurricane', 110, 70, 'Un puissant ouragan engloutit l\'ennemi.', 6), -- Type: Vol
('Poison', 30, 90, 'L\'ennemi est empoisonné par le Pokémon.', 7), -- Type: Poison
('Laser Glace', 95, 75, 'Un rayon de glace d\'une intensité extrême frappe l\'ennemi.', 8), -- Type: Glace
('Lame de Roc', 70, 95, 'Le Pokémon frappe l\'ennemi avec une lame tranchante de roche.', 5), -- Type: Roche
('Boule Roc', 25, 95, 'Le Pokémon lance une boule de roche sur son adversaire.', 5), -- Type: Roche
('Tranch\'Herbe', 55, 95, 'Le Pokémon coupe l\'ennemi avec ses lames d\'herbe.', 3), -- Type: Plante
('Lance-Boue', 55, 90, 'Une lance de boue visqueuse frappe l\'ennemi.', 2), -- Type: Eau
('Ébullition', 80, 100, 'Le Pokémon chauffe l\'eau à ébullition pour attaquer.', 2), -- Type: Eau
('Vibraqua', 60, 100, 'Des vibrations d\'eau puissantes frappent l\'ennemi.', 2), -- Type: Eau
('Fulmifer', 70, 90, 'Une décharge électrique puissante frappe l\'ennemi.', 4), -- Type: Electrique
('Change Éclair', 70, 100, 'Le Pokémon se déplace rapidement en frappant l\'ennemi.', 4), -- Type: Electrique
('Lance Flamme', 90, 85, 'Une lance enflammée est projetée vers l\'ennemi.', 1), -- Type: Feu
('Tempête Florale', 90, 100, 'Une tempête de fleurs attaque l\'ennemi avec grâce.', 3); -- Type: Plante

-- Pikachu connaît plusieurs attaques
INSERT INTO connait_attaque (id_pokemon, id_attaque) VALUES
(4, 1), -- Pikachu connaît l'attaque Flamèche (de type Feu)
(4, 7), -- Pikachu connaît l'attaque Éclair (de type Electrique)
(4, 17), -- Pikachu connaît l'attaque Change Éclair (de type Electrique)
(4, 25), -- Pikachu connaît l'attaque Lance Flamme (de type Feu);
-- Salamèche connaît plusieurs attaques
(5, 1), -- Salamèche connaît l'attaque Flamèche (de type Feu)
(5, 12), -- Salamèche connaît l'attaque Coup d'Aile (de type Vol);
-- Mew connaît plusieurs attaques
(24, 2), -- Mew connaît l'attaque Lance-Flammes (de type Feu)
(24, 4), -- Mew connaît l'attaque Hydrocanon (de type Eau)
(24, 8), -- Mew connaît l'attaque Tonnerre (de type Electrique)
(24, 19), -- Mew connaît l'attaque Vibraqua (de type Eau);
-- Autres pokémons connaissant plusieurs attaques
(1, 3), -- Bulbizarre connaît l'attaque Fouet Lianes (de type Plante)
(2, 12), -- Salameche connaît l'attaque Coup d'Aile (de type Vol)
(3, 18), -- Carapuce connaît l'attaque Tempête Florale (de type Plante)
(6, 11), -- Rattata connaît l'attaque Hurricane (de type Vol)
(7, 9), -- Dracaufeu connaît l'attaque Lance-Roches (de type Roche)
(8, 15), -- Magicarpe connaît l'attaque Lame de Roc (de type Roche)
(9, 10), -- Roucool connaît l'attaque Tranch'Herbe (de type Plante)
(10, 8), -- Herbizarre connaît l'attaque Hydrocanon (de type Eau)
(11, 7), -- Aspicot connaît l'attaque Éclair (de type Electrique)
(12, 22), -- Miaouss connaît l'attaque Change Éclair (de type Electrique)
(13, 5), -- Raichu connaît l'attaque Tempête Verte (de type Plante)
(14, 16), -- Rapasdepic connaît l'attaque Boule Roc (de type Roche)
(15, 13), -- Abo connaît l'attaque Poison (de type Poison)
(16, 14), -- Tentacool connaît l'attaque Laser Glace (de type Glace)
(17, 21), -- Chenipan connaît l'attaque Fulmifer (de type Electrique)
(18, 20), -- Papilusion connaît l'attaque Ébullition (de type Eau)
(19, 23), -- Rattatac connaît l'attaque Tranch'Herbe (de type Plante)
(20, 24), -- Nosferapti connaît l'attaque Lance-Boue (de type Eau)
(21, 26), -- Mewtwo connaît l'attaque Change Éclair (de type Electrique)
(22, 27), -- Leveinard connaît l'attaque Piafabec (de type Feu)
(23, 28), -- Goupix connaît l'attaque Ramoloss (de type Eau)
(26, 30), -- Grodoudou connaît l'attaque Tadmorv (de type Electrique)
(27, 29), -- Piafabec connaît l'attaque Taupiqueur (de type Roche)
(28, 31), -- Ramoloss connaît l'attaque Pikachu (de type Electrique)
(29, 32), -- Taupiqueur connaît l'attaque Pikachu (de type Electrique)
(30, 33); -- Tadmorv connaît


CREATE TABLE connait_attaque(
    id_pokemon INT REFERENCES pokemons(id),
    id_attaque INT REFERENCES attaques(id),
    PRIMARY KEY(id_pokemon,id_attaque)
);
