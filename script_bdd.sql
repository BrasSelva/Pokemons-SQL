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

CREATE TABLE connait_attaque(
    id_pokemon INT REFERENCES pokemons(id),
    id_attaque INT REFERENCES attaques(id),
    PRIMARY KEY(id_pokemon,id_attaque)
);
