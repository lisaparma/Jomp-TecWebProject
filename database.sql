set foreign_key_checks=0;
DROP TABLE IF EXISTS Utenti;
DROP TABLE IF EXISTS Annunci;
DROP TABLE IF EXISTS Aziende;
DROP TABLE IF EXISTS Consultazioni;


DROP TABLE IF EXISTS Utenti;
CREATE TABLE Utenti (
Username char(20) PRIMARY KEY,
Password char(10) not null,
Nome char(10), 
Cognome char(10), 
Email char(15) not null
)ENGINE=InnoDB;


DROP TABLE IF EXISTS Annunci;
CREATE TABLE Annunci (
Codice int(10) PRIMARY KEY AUTO_INCREMENT,
Titolo char(20) not null,
Tipo char(10) not null,
Data timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
Descrizione text(150) not null
)ENGINE=InnoDB;


DROP TABLE IF EXISTS Aziende;
CREATE TABLE Aziende (
Username char(20) PRIMARY KEY,
Password char(10) not null,
Nome char(10), 
Email char(15) not null,
Citta char(15) not null
)ENGINE=InnoDB;


DROP TABLE IF EXISTS Consultazioni;
CREATE TABLE Consultazioni (
NumConsult int(20) PRIMARY KEY AUTO_INCREMENT,
CodUtente char(20) not null,
CodAnnuncio int(10) not null,
FOREIGN KEY (CodUtente) REFERENCES Utenti(Username) ON DELETE CASCADE ON UPDATE CASCADE,
FOREIGN KEY (CodAnnuncio) REFERENCES Annunci(Codice) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB;


DROP TABLE IF EXISTS Inserzioni;
CREATE TABLE Inserzioni (
NumInser int(20) PRIMARY KEY AUTO_INCREMENT,
CodAzienda char(20) not null,
CodAnnuncio int(10) not null, 
FOREIGN KEY (CodAzienda) REFERENCES Aziende(Username) ON DELETE CASCADE ON UPDATE CASCADE,
FOREIGN KEY (CodAnnuncio) REFERENCES Annunci(Codice) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB;

set foreign_key_checks=1;


