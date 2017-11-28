set foreign_key_checks=0;

CREATE TABLE Utenti (
Username char(20) PRIMARY KEY,
Password char(10) not null,
Name char(10), 
Surname char(10), 
Email char(15) not null
)ENGINE=InnoDB;

CREATE TABLE Annunci (
Codice int(10) PRIMARY KEY,
Titolo char(20) not null,
Tipo char(10) not null,
Data date
)ENGINE=InnoDB;

CREATE TABLE Aziende (
Codice int(10) PRIMARY KEY,
Nome char(15) not null,
Tipo char(15) not null,
Città char(15) not null
)ENGINE=InnoDB;

CREATE TABLE Consultazioni (
Numero int(20) PRIMARY KEY,
CodAnnuncio int(10),
)
