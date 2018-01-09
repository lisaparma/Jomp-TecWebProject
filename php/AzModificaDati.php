<?php

require_once("structure.php");
require_once("functionAzienda.php");
require_once("connect.php");
require_once("classAzienda.php");

session_start();

$title="Jomp - Modifica dati";
head($title);

echo "<body>";

headers();

$page="Modifica dati";
breadcrumb(array('Area Personale', $page));

menu($page);


# ------------------------------------------------------
echo"<div id='contenuto'>";
try {
	if(isset($_SESSION['login'])) {
		$company = &$_SESSION['login'];
		$id = $company->getId();
		$name = $company->getName();
		$pIva = $company->getPIva();
		$email = $company->getEmail();
		$city = $company->getCity();
		$password = $company->getPassword();
		$description = $company->getDescription();

		if(isset($_POST['edit'])) {
			$newName = $_POST['name'];
			$newPIva = $_POST['pIva'];
			$newEmail = $_POST['email'];
			$newCity = $_POST['city'];
			$newPassword = $_POST['password'];	
			$newDescription = $_POST['description'];
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
        		$update = "UPDATE Aziende SET Nome='".$newName."', PIva='".$newPIva."', Email='".$newEmail."', Citta='".$newCity."', Password='".$newPassword."', Descrizione='".$newDescription."' WHERE Codice='".$id."'";

            	if(mysqli_query(openDB(), $update)) {
	                $company->setName($newName);
	                $company->setPIva($newPIva);
	                $company->setEmail($newEmail);
	                $company->setCity($newCity);
	                $company->setPassword($newPassword);
	                $company->setDescription($newDescription);
                	header("location: AzModificaDati.php?msg");
            	}
         
            	else {
            		echo "Errore nell'aggiornare i propri dati.";
            	}
            }
        }
        if(isset($_GET['msg'])){
	        echo "Dati aggiornati con successo! Torna nella tua <a href='AzDashboard.php'>bacheca</a>.";
	    }

		echo "<div id='contenuto'>
		        <h4> I tuoi dati: </h4>
		        <form method='post' action='AzModificaDati.php'> 

		            <label for='nome'>Nome: </label>
		            <input type='text' id='nome' value='$name' name='name'><br/> 
		                
    				<label for='pIva'>Partita Iva: </label>
		            <input type='text' id='pIva' value='$pIva' name='pIva'><br/>
		                
		            <label for='email'>E-mail: </label>
		            <input type='text' id='email' value='$email' name='email'><br/>        
		                
		            <label for='city'>Città: </label>
		            <input type='text' id='city' value='$city' name='city'><br/>
		                
		            <label for='password'> Password: </label>
		            <input type='password' id='password' name='password' value='$password'><br/>
		            <br/>

		            <p> Descrivi la tua azienda: </p><br/>
	                <textarea name='description' rows='15' cols='45' required>$description</textarea><br/>
	                <br/>

                	<input type='submit' value='Modifica' name='edit'>

		        </form>
            </div>";

        
	}
} catch (PDOException $e) {
    echo "Errore: " . $e->getMessage();
    die(); 
}
echo"	</div>
	</div>";

# ------------------------------------------------------


footer();
 
echo "</body> \n </html>";

?>