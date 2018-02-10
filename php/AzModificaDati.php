<?php

require_once("structure.php");
require_once("functionAzienda.php");
require_once("connect.php");
require_once("classAzienda.php");

session_start();

$title="Jomp - Modifica dati";
head($title);


headers();

$page="Modifica dati";
breadcrumb(array('Area Personale', $page));

menu($page);


# ------------------------------------------------------
try {
	if(isset($_SESSION['login'])) {
		$company = &$_SESSION['login'];
		$id = $company->getId();
		$name = $company->getName();
		$pIva = $company->getPIva();
		$email = $company->getEmail();
		$city = $company->getCity();
		$password = $company->getPassword();
		$strDescription = $company->getDescription();
		$description = str_replace("'", ' ', $strDescription);
		$sito = $company->getSito();

		echo "<div id='contenuto'>
		        <h3> I tuoi dati: </h3>
		        <p> Visualizza i tuoi dati e modificali in ogni momento! <br/>
                Ricorda: non puoi modificare contemporaneamente <strong> Partita Iva </strong> ed <strong> e-mail </strong>!</p>";
                
		if(isset($_POST['edit'])) {
			$newName = $_POST['name'];
			$newPIva = $_POST['pIva'];
			$newEmail = $_POST['email'];
			$newCity = $_POST['city'];
			$newPassword = $_POST['password'];	
			$newDescription = $_POST['description'];
			$newSito = $_POST['sito'];
			$check = true;

			if($newName != $name && !checkName($newName)) {
				echo "Nome azienda già in uso.<br/>";
				$check = false;
			}
			if($newPIva != $pIva && !checkPIva($newPIva)) {
				echo "Partita iva già presente nel database";
				$check = false;
			}

			if($check) {
        		$sql = "UPDATE Aziende SET Nome='$newName', PIva='$newPIva', Email='$newEmail', Citta='$newCity', Password='$newPassword', Descrizione='$newDescription', Sito='$newSito' WHERE Codice='$id' ";
            	if(mysqli_query(openDB(), $sql)) {
	                $company->setName($newName);
	                $company->setPIva($newPIva);
	                $company->setEmail($newEmail);
	                $company->setCity($newCity);
	                $company->setPassword($newPassword);
	                $company->setDescription($newDescription);
	                $company->setSito($newSito);
	                echo"<div class='successMsg'>Dati aggiornati con successo!</div>";     
	          	}
            	else {
            		echo "<div class='errorMsg'>Errore nell'aggiornare i propri dati.</div>";
            	}
            }
        }

echo"		        <form method='post' class='formMod' action='AzModificaDati.php'> 
		        	<div class='inner-wrap'>
		            <label for='nome'>Nome: </label>
		            <input type='text' id='nome' value='$name' name='name'>
		                
    				<label for='pIva'>Partita Iva: </label>
		            <input type='text' id='pIva' value='$pIva' name='pIva'>
		                
		            <label for='email'>E-mail: </label>
		            <input type='text' id='email' value='$email' name='email'>  

		            <label for='sito'>Sito web: </label>
		            <input type='text' id='sito' value='$sito' name='sito'>    
		                
		            <label for='city'>Città: </label>
		            <input type='text' id='city' value='$city' name='city'>
		                
		            <label for='password'> Password: </label>
		            <input type='password' id='password' name='password' value='$password'>

		            <label id='descrAz'> Descrivi la tua azienda: </label>
	                <textarea id='description' name='description' rows='15' cols='45' required>$description</textarea>
	                </div>
                	<input type='submit' value='Modifica' name='edit'>

		        </form>
            </div>";

        
	}
} catch (PDOException $e) {
    echo "Errore: " . $e->getMessage();
    die(); 
}

# ------------------------------------------------------


footer();
 
echo "</body> \n </html>";

?>