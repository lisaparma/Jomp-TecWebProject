set foreign_key_checks=0;
DROP TABLE IF EXISTS Utenti;
DROP TABLE IF EXISTS Annunci;
DROP TABLE IF EXISTS Aziende;
DROP TABLE IF EXISTS Consultazioni;


DROP TABLE IF EXISTS Utenti;
CREATE TABLE Utenti (
Nome char(10), 
Cognome char(10), 
Email char(255) NOT NULL,
Username char(20) PRIMARY KEY,
Password char(20) NOT NULL,
UNIQUE (Email)
)ENGINE=InnoDB;


DROP TABLE IF EXISTS Annunci;
CREATE TABLE Annunci (
Codice int(10) PRIMARY KEY AUTO_INCREMENT,
Titolo char(20) NOT NULL,
Tipo char(10) NOT NULL,
Data timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
Descrizione text(150) NOT NULL
)ENGINE=InnoDB;


DROP TABLE IF EXISTS Aziende;
CREATE TABLE Aziende (
Nome char(100) PRIMARY KEY,
PIva int(11) NOT NULL, 
Email char(255) NOT NULL,
Citta char(20) NOT NULL,
Password char(20) NOT NULL
)ENGINE=InnoDB;


DROP TABLE IF EXISTS Consultazioni;
CREATE TABLE Consultazioni (
NumConsult int(20) PRIMARY KEY AUTO_INCREMENT,
CodUtente char(20) NOT NULL,
CodAnnuncio int(30) NOT NULL,
FOREIGN KEY (CodUtente) REFERENCES Utenti(Username) ON DELETE CASCADE ON UPDATE CASCADE,
FOREIGN KEY (CodAnnuncio) REFERENCES Annunci(Codice) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB;


DROP TABLE IF EXISTS Inserzioni;
CREATE TABLE Inserzioni (
NumInser int(20) PRIMARY KEY AUTO_INCREMENT,
CodAzienda char(20) NOT NULL,
CodAnnuncio int(30) NOT NULL, 
FOREIGN KEY (CodAzienda) REFERENCES Aziende(Nome) ON DELETE CASCADE ON UPDATE CASCADE,
FOREIGN KEY (CodAnnuncio) REFERENCES Annunci(Codice) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB;

set foreign_key_checks=1;


