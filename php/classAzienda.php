<?php

class Azienda {
	private $id;
	private $name;
	private $pIva;
	private $email;
	private $city;
	private $entry;
	private $password;
	private $description;
	private $sito;

	public function __construct($login) {
		$this->id = $login['Codice'];
		$this->name = $login['Nome'];
		$this->pIva = $login['PIva'];
		$this->email = $login['Email'];
		$this->city = $login['Citta'];
		$this->entry = $login['Iscrizione'];
		$this->password = $login['Password'];
		$this->description = $login['Descrizione'];
		$this->sito=$login['Sito'];
	}

	//funzioni set
	public function setId($newId) {
		$this->id = $newId;
	}

	public function setName($newName) {
		$this->name = $newName;
	}

	public function setPIva($newPIva) {
		$this->pIva = $newPIva;
	}

	public function setEmail($newEmail) {
		$this->email = $newEmail;
	}

	public function setCity($newCity) {
		$this->city = $newCity;
	}

	public function setPassword($newPassword) {
		$this->password = $newPassword;
	}

	public function setDescription($newDescription) {
		$this->description = $newDescription;
	}

	public function setSito($newSito) {
		$this->sito = $newSito;
	}


	//funzioni get
	public function getId() {
		return $this->id;
	}

	public function getName() {
		return $this->name;
	}

	public function getPIva() {
		return $this->pIva;
	}

	public function getEmail() {
		return $this->email;
	}

	public function getCity() {
		return $this->city;
	}

	public function getDateEntry() {
		return date('d/m/Y', strtotime(str_replace('-','/', $this->entry)));
	}

	public function getPassword() {
		return $this->password;
	}

	public function getDescription() {
		return $this->description;	
	}

	public function getSito() {
		return $this->sito;	
	}

	public function getAdsNumber() {
		$result = mysqli_query(openDB(),"SELECT * FROM Annunci WHERE Azienda='".$this->name."'");
		return mysqli_num_rows($result);
	}

	public function getDateLastAd() {
		if($this->getAdsNumber() == 0) {
			return 'Nessun annuncio ancora publicato';
		}		
		$result = mysqli_query(openDB(),"SELECT Data FROM Annunci WHERE Azienda='".$this->name."' ORDER BY Data DESC LIMIT 1");
		$row = $result->fetch_assoc();
		return date('d/m/Y', strtotime(str_replace('-','/', $row['Data'])));
	}

	public function getFollowedAdsNumber() {
		$result = mysqli_query(openDB(),"SELECT * FROM Consultazioni JOIN Annunci ON Consultazioni.CodAnnuncio=Annunci.Codice WHERE Azienda='".$this->name."'");
		return mysqli_num_rows($result);  
	}

}

?>