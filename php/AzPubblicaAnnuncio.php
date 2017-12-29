<?php

require_once("structure.php");
require_once("functionAzienda.php");
require_once("connect.php");
require_once("classAzienda.php");


$title = "Pubblica Annuncio - Jomp";

session_start();

head($title);

echo "<body>";

headers();

$page = "Pubblica annuncio";
breadcrumb($page);

menu($page);


# ------------------------------------------------------


echo "<div id='contenuto'>
    	<form method='post' action='AzPubblicaAnnuncio.php' accept-charset='utf-8'>
    		<h3>Inserisci annuncio: </h3>

    		<label for='title'> Titolo: </label>
            <input type='text' id='title' name='Title' placeholder='Titolo' required><br/>";

        	
printWorkType('null');     
echo "			
            <p> Inserisci una breve descrizione del lavoro (max 300 caratteri): </p>
            <textarea name='Description' rows='5' cols='70' required></textarea><br/>

            <input type='submit' value='Inserisci' name='submit'>
    	</form>
    </div>";

if(isset($_POST['submit'])) {
	try {
        if(isset($_SESSION['login'])) {
            $company = $_SESSION['login'];

            $title = $_POST['Title'];
            $type = $_POST['Type'];

            $description = $_POST['Description'];
            $name = $company->getName();

    	    $ad = "INSERT INTO Annunci(Titolo, Azienda, Tipologia, Descrizione) VALUES ('$title', '$name', '$type', '$description')";

    		if (mysqli_query(openDB(), $ad)) {
				header("location: AzResocontoAnnunci.php");
			} 
			else {
				echo "Errore";
			}
   
        }
        else {
            echo "Connessione scaduta";    
        }
	}
	catch (Exception $e) {
        echo "Errore: " . $e->getMessage();
        die();
    }
} 


# ------------------------------------------------------


footer();
 
echo "</body> \n </html>";

?>