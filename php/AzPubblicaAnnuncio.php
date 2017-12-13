<?php

require("structure.php");
require("functionAzienda.php");
require("connect.php");


$title="Pubblica Annuncio - Jomp";

head($title);

echo "<body>";

headers();

$page="Pubblica annuncio";
breadcrumb($page);

menu($page);

echo" <div id='contenuto'>
    	<form form method='post' action='AzPubblicaAnnuncio.php' accept-charset='utf-8'>
    		<h3>Inserisci annuncio: </h3>

    		<label for='title'> Titolo: </label>
            <input type='text' id='title' name='Title' placeholder='Titolo' required><br/> 

            <label for='type'> Tipologia: </label>
            <select name='Tipologia' required>
            	<option value='Amministrazione'> Amministrazione </option>
            	<option value='Assistenza'> Assistenza anziani e/o disabili </option>
            	<option value='Contabilità'> Contabilità </option>
            	<option value='Direzione'> Direzione </option>
            	<option value='Edilizia'> Edilizia </option>
            	<option value='Estetica'> Estetica </option>
            	<option value='Formazione'> Formazione </option>
            	<option value='Marketing'> Marketing </option>
            	<option value='Medicina'> Medicina </option>
            	<option value='Produzione'> Produzione </option>
            	<option value='Ristorazione'> Ristorazione </option>
            	<option value='Sicurezza'> Sicurezza </option> 
            	<option value='Altro'> Altro </option>
            </select>

            <p> Inserisci una breve descrizione del lavoro (max 300 caratteri): </p>
            <textarea name='Description' rows='5' cols='70' required></textarea><br/>

            <input type='submit' value='Inserisci' name='submit'>
    	</form>
    </div> ";

if(isset($_POST["submit"])) {
	try {
		$db=openDB();
	        
        $Title=$_POST["Title"];
        $Type=$_POST["Tipologia"];
        $Description=$_POST["Description"];

	    $query = "INSERT INTO Annunci(Titolo, Tipologia, Descrizione) VALUES('$Title', '$Type', '$Description')";

		$db->query($query);
		header("location: AzResocontoAnnunci.php");
	}
	catch (Exception $e) {
        echo "Errore: " . $e->getMessage();
        die();
    }
} 

footer();
 
echo "</body> \n </html>";

?>