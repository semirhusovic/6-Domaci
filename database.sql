CREATE DATABASE nekretnina;
USE nekretnina;

CREATE TABLE grad (
id_grad INT PRIMARY KEY AUTO_INCREMENT,
grad VARCHAR(255) NOT NULL
);

CREATE TABLE tip_nekretnine (
id_tip_nekretnine INT PRIMARY KEY AUTO_INCREMENT,
tip_nekretnine VARCHAR(255)
);

CREATE TABLE tip_oglasa (
id_tip_oglasa INT PRIMARY KEY AUTO_INCREMENT,
tip_oglasa VARCHAR(255)
);

CREATE TABLE nekretnina (
id_nekretnina INT PRIMARY KEY AUTO_INCREMENT,
cijena FLOAT,
povrsina FLOAT,
stats BOOLEAN,
opis TEXT,
godina_izgradnje DATE,
datum_prodaje DATE,
id_grad INT,
id_tip_nekretnine INT,
id_tip_oglasa INT,
CONSTRAINT fk_nekretnina_grad FOREIGN KEY(id_grad) REFERENCES grad(id_grad),
CONSTRAINT fk_nekretnina_tip_nekretnine FOREIGN KEY(id_tip_nekretnine) REFERENCES tip_nekretnine(id_tip_nekretnine),
CONSTRAINT fk_nekretnina_tip_oglasa FOREIGN KEY(id_tip_oglasa) REFERENCES tip_oglasa(id_tip_oglasa)
);

CREATE TABLE fotografije (
    id_fotografije INT PRIMARY KEY AUTO_INCREMENT,
    slika VARCHAR(255),
    id_nekretnina INT,
    CONSTRAINT fk_fotografije_nekretnina FOREIGN KEY (id_nekretnina) REFERENCES nekretnina(id_nekretnina)
);