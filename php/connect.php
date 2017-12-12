<?php

function openDB() {
	$hostname	= "localhost";
    $dbname 	= "database";
    $user 		= "root";
    $pass 		= "";

    $con = mysqli_connect($hostname, $user, $pass, $dbname);

    if(mysqli_connect_errno()) {
    	echo "Connessione fallita con MySqL: ".mysqli_connect_error();
    }

    /*
    $db 		= new PDO ("mysql:host=$hostname;dbname=$dbname", $user, $pass);

    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	*/
    return $con;

}

function closeDB($db) {
	$db = null;
}

?>