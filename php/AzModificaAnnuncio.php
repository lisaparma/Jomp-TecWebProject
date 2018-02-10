<?php

require_once("structure.php");
require_once("functionAzienda.php");
require_once("connect.php");

session_start();


$title = "Modifica annuncio - Jomp";
head($title);


headers();

$page = "Modifica annuncio";
breadcrumb(array('Area Personale','Resoconto annunci', $page));

menu($page);


# ------------------------------------------------------

if(isset($_POST['edit'])) {
	$ad = $_POST['edit'];	
	$sql = mysqli_query(openDB(), "SELECT * FROM Annunci WHERE Codice='".$ad."'");
	$row = $sql->fetch_array(MYSQLI_ASSOC);

	$title = $row['Titolo'];
	$type = $row['Tipologia'];
	$time = $row['Orario'];
    $contract = $row['Contratto'];
	$date = $row['Data'];
	$description = $row['Descrizione'];

	echo "<div id='contenuto'>
		<h3>Modifica l'annuncio: </h3>
		<form method='post' id='annuncio' class='formMod' action='AzResocontoAnnunci.php' accept-charset='utf-8'>
		<div class='inner-wrap'>
			<label id='tit' for='title'> Titolo: </label>
	        <input type='text' id='title' name='Title' value='$title' required><br/>"; 
			printWorkType($type);
			printTimeType($time);
            printContractType($contract);  
	echo "  <label id='descrAz'> Inserisci una breve descrizione del lavoro (max 300 caratteri): </label>
	        <textarea name='Description' rows='5' cols='70' required>$description</textarea><br/>
	    </div>
	        <button value=$ad name='update'>Aggiorna</button>
		</form>
	</div>";
}

if(isset($_POST['delete'])) {
	$ad = $_POST['delete'];
	$delete = "DELETE FROM Annunci WHERE Codice='".$ad."'";

	if(mysqli_query(openDB(), $delete)) {
		header("location: AzResocontoAnnunci.php?msg");
	}
	else {
		echo "Problemi con l'eliminizione dell'annuncio";
	}
}


# ------------------------------------------------------

footer();
 
echo "</body> \n </html>";

?>