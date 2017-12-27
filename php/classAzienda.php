<?php

class Azienda {
	private $id;
	private $name;
	private $pIva;
	private $email;
	private $city;
	private $password;

	public function __construct($login) {
		$this->id = $login['Codice'];
		$this->name = $login['Nome'];
		$this->pIva = $login['PIva'];
		$this->email = $login['Email'];
		$this->city = $login['Citta'];
		$this->password = $login['Password'];
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

	public function getPassword() {
		return $this->password;
	}

	//funzioni di verifica di specifichi campi dati
	function checkName($Name) {
	    $result = mysqli_query(openDB(),"SELECT Nome FROM Aziende WHERE Nome='".$Name."'");

	    $num_rows = mysqli_num_rows($result);

	    if($num_rows == 0) {
	        return true;
	    }
	    return false;
	}


	function checkPIva($PIva) {
	    $result = mysqli_query(openDB(),"SELECT PIva FROM Aziende WHERE PIva='".$PIva."'");

	    $num_rows = mysqli_num_rows($result);

	    if($num_rows == 0) {
	        return true;
	    }
	    return false;   
	}


	function checkRepeatPassword($Password, $RipPassword) {
	    if($Password == $RipPassword) {
	        return true;
	    }
	    return false;
	}
}

?>