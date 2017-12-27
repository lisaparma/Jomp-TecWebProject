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
breadcrumb($page);

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

		echo "<div id='contenuto'>
		        <h4> I tuoi dati: </h4>
		        <form method='post' action='AzModificaDati.php'> 

		            <label for='nome'>Nome: </label>
		            <input type='text' id='nome' value='$name' name='Nome'><br/> 
		                
    				<label for='pIva'>Partita Iva: </label>
		            <input type='text' id='pIva' value='$pIva' name='PIva'><br/>
		                
		            <label for='email'>E-mail: </label>
		            <input type='text' id='email' value='$email' name='Email'><br/>        
		                
		            <label for='city'>Città: </label>
		            <input type='text' id='city' value='$city' name='City'><br/>
		                
		            <label for='password'> Password: </label>
		            <input type='password' id='password' name='Password' value='$password'><br/>
		            <br/>

                	<input type='submit' value='Modifica' name='edit'>

		        </form>
            </div>";

        if(isset($_POST['edit'])) {
			$newName = $_POST['Nome'];
			$newPIva = $_POST['PIva'];
			$newEmail = $_POST['Email'];
			$newCity = $_POST['City'];
			$newPassword = $_POST['Password'];	

			if($newName == $name && $newPIva == $pIva || $newName != $name && checkName($newName) || $newPIva != $pIva && checkPIva($newPIva)) {
        		$update = "UPDATE Aziende SET Nome='".$newName."', PIva='".$newPIva."', Email='".$newEmail."', Citta='".$newCity."', Password='".$newPassword."'  WHERE Codice='".$id."'";

            	if(mysqli_query(openDB(), $update)) {
            		header("location: AzDashboard.php");
            	}
            	else {
            		echo "Errore nell'aggiornare i propri dati.";
            	}
            }

            if(!checkName($newName)) {
            	echo "Nome azienda già in uso.<br/>";
            }
            else {
            	echo "Partita iva già presente nel database";
            }
        }
	}
} catch (PDOException $e) {
    echo "Errore: " . $e->getMessage();
    die(); 
}


# ------------------------------------------------------


footer();
 
echo "</body> \n </html>";

?>