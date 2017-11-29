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
        $Nome=$_POST["Nome"];
        $Cognome=$_POST["Cognome"];
        $Email=$_POST["Email"];

        $sql = "INSERT INTO utenti(Username, Password, Nome, Cognome, Email) VALUES('$Username', '$Password', '$Nome', '$Cognome', '$Email')";

	    if($db->query($sql)) {
	    	echo "<script type= 'text/javascript'>alert('Dati inseriti correttamente!');</script>";
	    }
	    else{
	    	"<script type= 'text/javascript'>alert('Dati non inseriti cotterramente.');</script>";
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