<?php

require("structure.php");
require("functionAzienda.php");

$title="Pubblica Annuncio - Jomp";
head($title);

echo "<body>";

headers();

$page="Pubblica annuncio";
breadcrumb($page);

menu($page);

echo" <div id='contenuto'>
    	<form form method='post' action='AzPubblicaAnnuncio.php'>
    		<h3>Inserisci annuncio: </h3>

    		<label for='title'> Titolo: </label>
            <input type='text' id='title' name='Title' placeholder='Titolo' required><br/> 

            <label for='type'> Tipologia: </label>
            <select name='tipologia' required>
            	<option value='0'> Amministrazione </option>
            	<option value='1'> Assistenza anziani e/o disabili </option>
            	<option value='2'> Contabilità </option>
            	<option value='3'> Direzione </option>
            	<option value='4'> Edilizia </option>
            	<option value='5'> Estetica </option>
            	<option value='6'> Formazione </option>
            	<option value='7'> Marketing </option>
            	<option value='8'> Medicina </option>
            	<option value='9'> Produzione </option>
            	<option value='10'> Sicurezza </option> 
            	<option value='11'> Altro </option>
            </select>

            <p> Inserisci una breve descrizione del lavoro (max 300 caratteri): </p>
            <textarea rows='5' cols='70' required></textarea>

            <input type='submit' value='Inserisci' name='submit'>
    	</form>
    </div> ";

footer();
 
echo "</body> \n </html>";

?>