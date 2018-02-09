<?php

require_once("structure.php");
require_once("functionAzienda.php");
require_once("connect.php");
require_once("classAzienda.php");

$title = "Pubblica Annuncio - Jomp";

session_start();

head($title);

headers();

$page = "Pubblica annuncio";
breadcrumb(array('Area Personale', $page));

menu($page);


# ------------------------------------------------------

if(isset($_POST['submit'])) {
    try {
        if(isset($_SESSION['login'])) {
            $company = $_SESSION['login'];

            $title = $_POST['Title'];
            $type = $_POST['Type'];
            $time = $_POST['TimeType'];
            $contract = $_POST['ContractType'];

            $description = $_POST['Description'];
            $name = $company->getName();

            $ad = "INSERT INTO Annunci(Azienda, Titolo, Tipologia, Orario, Contratto, Descrizione) VALUES ('$name', '$title', '$type', '$time', '$contract', '$description')";          

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





echo "<div id='contenuto'>
        <h3>Inserisci annuncio: </h3>
    	<form method='post' id='annuncio' class='formMod' action='AzPubblicaAnnuncio.php' accept-charset='utf-8'>
        <div class='inner-wrap'>
    		<label for='title'> Titolo: </label>
            <input type='text' id='title' name='Title' placeholder='Titolo' required><br/>";

        	printWorkType('null');   

            printTimeType('null');

            printContractType('null');  
echo "			
            <label id='descrAz'> Inserisci una breve descrizione del lavoro (max 300 caratteri): </label>
            <textarea name='Description' rows='5' cols='70' required></textarea><br/>
        </div>
            <input type='submit' value='Inserisci' name='submit'>
    	</form>
    </div>";


# ------------------------------------------------------


footer();
 
echo "</body> \n </html>";

?>