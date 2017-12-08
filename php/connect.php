<?php

function openDB() {
	$hostname	= "localhost";
    $dbname 	= "database";
    $user 		= "root";
    $pass 		= "";
    $db 		= new PDO ("mysql:host=$hostname;dbname=$dbname", $user, $pass);

    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $db;
}

function closeDB($db) {
	$db = null;
}

?>