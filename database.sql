set foreign_key_checks=0;
DROP TABLE IF EXISTS Utenti;
DROP TABLE IF EXISTS Annunci;
DROP TABLE IF EXISTS Aziende;
DROP TABLE IF EXISTS Consultazioni;
DROP TABLE IF EXISTS Tipo;


CREATE TABLE Utenti (
Nome char(10) NOT NULL, 
Cognome char(10) NOT NULL, 
Sesso char(1) NOT NULL,
Email char(255) NOT NULL,
Username char(20) PRIMARY KEY,
Password char(20) NOT NULL,
UNIQUE (Email)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE Tipo (
CodLavoro int(10) AUTO_INCREMENT,
Lavoro char(30) NOT NULL,
PRIMARY KEY (CodLavoro)
)ENGINE=InnoDB DEFAULT CHARSET=utf8; 


CREATE TABLE Aziende (
Codice int(10) AUTO_INCREMENT,
Nome char(100) NOT NULL,
PIva int(11) NOT NULL, 
Email char(255) NOT NULL,
Citta char(20) NOT NULL,
Iscrizione timestamp DEFAULT CURRENT_TIMESTAMP,
Password char(20) NOT NULL,
PRIMARY KEY (Codice, Nome)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE Annunci (
Codice int(10) AUTO_INCREMENT,
Azienda char(100) NOT NULL,
Titolo char(100) NOT NULL,
Tipologia int(10) NOT NULL,
Data timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
Descrizione text(300) NOT NULL,
PRIMARY KEY (Codice),
FOREIGN KEY (Tipologia) REFERENCES Tipo(CodLavoro) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8;



CREATE TABLE Consultazioni (
Utente char(20) NOT NULL,
CodAnnuncio int(30) NOT NULL,
PRIMARY KEY (Utente, CodAnnuncio),
FOREIGN KEY (Utente) REFERENCES Utenti(Username) ON DELETE CASCADE ON UPDATE CASCADE,
FOREIGN KEY (CodAnnuncio) REFERENCES Annunci(Codice) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


set foreign_key_checks=1;


