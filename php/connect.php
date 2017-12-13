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

    mysqli_set_charset($con,"utf8");

    return $con;

}

function closeDB($db) {
	$db = null;
}

?>