<?php 

if(isset($_POST["submit"])){
	try {
	    $hostname = "localhost";
	    $dbname = "tecweb";
	    $user = "root";
	    $pass = "";
	    $db = new PDO ("mysql:host=$hostname;dbname=$dbname", $user, $pass);
	    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $Username=$_POST["Username"];
        $Password=$_POST["Password"];
        $RipPassword=$_POST["RipPassword"];
        $Nome=$_POST["Nome"];
        $Cognome=$_POST["Cognome"];
        $Email=$_POST["Email"];

        //verifico i dati inseriti
        if ($Username || $Password || $RipPassword|| $Nome || $Cognome || $Email) {

        	if($Password===$RipPassword) {

        		$sql = "INSERT INTO Utenti(Username, Password, Nome, Cognome, Email) VALUES('$Username', '$Password', '$Nome', '$Cognome', '$Email')";

			    if($db->query($sql)) {
			   		echo "<script type= 'text/javascript'>alert('Dati inseriti correttamente!');</script>";
			    }
			    else{
			    	echo"<script type= 'text/javascript'>alert('Dati non inseriti cotterramente.');</script>";
			    }
        	}
	        else {
	        	echo "<script type= 'text/javascript'>alert('La password scelta deve essere uguale in entrambi i campi');</script>";
	        }
		 }
		 else {
		 	echo "<script type= 'text/javascript'>alert('Inserisci tutti i dati per continuare la registrazione');</script>";

        }

	    //chiudo il database
	    $db = null;

	} catch (PDOException $e) {
	    echo "Errore: " . $e->getMessage();
	    die();
	}

}



//GUARDARE QUI: https://www.formget.com/php-data-object/

/*
# PROCEDIMENTO:
# i passi da seguire sono questi:
# 1) ti creai le tabelle sul db
# 2)il form spedisce di dati a uno script php
# 3) lo script apre la connessione al db e inserisce i dati nella tabella
# 4) poi scrivi un'altra pagina php (lista conttatti) che apre la connessione al db, legge i dati dalle tabelle, li mostra in una tabella
*/
?>*