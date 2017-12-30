<?php

    class Utente {
        
        private $name;
        private $surname;
        private $email;
        private $username;
        private $password;
        private $sex;
        
        //costruttore
        public function __construct($login) {
        $this->name=$login['Nome'];
        $this->surname=$login['Cognome'];
        $this->email=$login['Email'];
        $this->username=$login['Username'];
        $this->password=$login['Password'];
        $this->sex=$login['Sesso'];
        }
        
        // Funzioni GETTER
        public function getName() {
            return $this->name;
        }
        
        public function getSurname() {
            return $this->surname;
        }
        
        public function getEmail() {
            return $this->email;
        }
        
        public function getUsername() {
            return $this->username;
        }
        
        public function getPassword() {
            return $this->password;
        }
        
        public function getSex() {
            return $this->sex;
        }
        
        // Funzioni SETTER
        
        public function setName($new) {
            $this->name = $new;
        }
        public function setSurname($new) {
            $this->surname = $new;
        }
        public function setEmail($new) {
            $this->email = $new;
        }
        public function setUsername($new) {
            $this->username = $new;
        }
        public function setPassword($new) {
            $this->password = $new;
        }
        public function setSex($new) {
            $this->sex = $new;
        }
        
        
        // Funzioni varie
        public function getNumLike(){
            $query="SELECT * FROM Consultazioni WHERE Utente='".$this->username."'";
            $result = mysqli_query(openDB(), $query);
            return mysqli_num_rows($result);
        }
        
        public function getPrefCity(){
            $query="SELECT count(Citta) AS tot, Citta FROM Consultazioni JOIN Annunci ON Consultazioni.CodAnnuncio=Annunci.Codice JOIN Aziende ON Annunci.Azienda=Aziende.Nome WHERE Consultazioni.Utente='".$this->username."' GROUP BY Aziende.Citta ORDER BY tot DESC";
            $result = mysqli_query(openDB(), $query);
            $row = $result->fetch_assoc();
            return $row['Citta'];
        }
        
        public function getNumLikePrefCity(){
            $query="SELECT Citta AS tot, Citta FROM Consultazioni JOIN Annunci ON Consultazioni.CodAnnuncio=Annunci.Codice JOIN Aziende ON Annunci.Azienda=Aziende.Nome WHERE Consultazioni.Utente='".$this->username."' GROUP BY Aziende.Citta ORDER BY tot DESC";
            $result = mysqli_query(openDB(), $query);
            return mysqli_num_rows($result);
        }
    }
    
?>