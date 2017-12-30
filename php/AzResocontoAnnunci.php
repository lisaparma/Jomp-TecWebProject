<?php

require_once("structure.php");
require_once("functionAzienda.php");
require_once("connect.php");
require_once("classAzienda.php");

session_start();

$title = "Resoconto annunci - Jomp";
head($title);

echo "<body>";

headers();

$page = "Resoconto annunci";
breadcrumb(array('Area Personale', $page));

menu($page);


# ------------------------------------------------------
echo"<div id='contenuto'>";
if(isset($_POST['update'])) {
	$ad = $_POST['update']; 
	$newTitle = $_POST['Title'];
	$newType = $_POST['Type'];
	$newDescr = $_POST['Description'];

	$up = "UPDATE Annunci SET Titolo = '".$newTitle."', Tipologia = '".$newType."', Descrizione ='".$newDescr."'  WHERE Codice='".$ad."'";

	if(mysqli_query(openDB(), $up)) {
		echo "Annuncio modificato con successo!";
	}
	else {
		echo "Errore nell'aggiornare i propri dati.";
	}
}


if(isset($_SESSION['login'])) {
	$company = $_SESSION['login'];
	$name = $company->getName();

	//annunci elencati dal più recente al meno
	$result = mysqli_query(openDB(), "SELECT * FROM Annunci WHERE Azienda='".$name."' ORDER BY Data DESC");

	if(mysqli_num_rows($result) == 0) {
		echo "Nessun annuncio ancora inserito.";
	}

	else {
		echo "<p>Ecco tutti i tuoi annunci:</p>";
		
		//stampo tutti gli annunci trovati
		while($row = $result->fetch_array(MYSQLI_ASSOC)) {
			echo "<div id='contenuto'>
					<dl>
						<dt>".$row['Titolo']."</dt>
						<dd>Pubblicato il ".$row['Data']."</br>
							".$row['Descrizione']."</br>
								<div id='options'>
									<form method='post' action='AzModificaAnnuncio.php'>
										<button value=".$row['Codice']." name='edit'>Modifica</button>
				            			<button value=".$row['Codice']." name='delete'>Rimuovi</button>
				            		</form>
			            		</div>
							</dd>
						</dt>
					</dl>
				</div>";
		}

	}
}

echo"</div>";

# ------------------------------------------------------

footer();
 
echo "</body> \n </html>";

?>