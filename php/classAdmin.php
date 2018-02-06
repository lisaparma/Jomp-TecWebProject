<?php

class Admin {
	private $name;
	private $email;
	private $password;


	public function __construct($login) {
		$this->name = $login['Nome'];
		$this->email = $login['Email'];
		$this->password = $login['Password'];
	}

	//funzioni set
	public function setName($newName) {
		$this->name = $newName;
	}
	public function setEmail($newEmail) {
		$this->email = $newEmail;
	}

	public function setPassword($newPassword) {
		$this->password = $newPassword;
	}

	//funzioni get
	public function getName() {
		return $this->name;
	}

	public function getEmail() {
		return $this->email;
	}

	public function getPassword() {
		return $this->password;
	}

}

?>