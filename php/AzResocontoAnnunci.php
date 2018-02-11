<?php

require_once("structure.php");
require_once("functionAzienda.php");
require_once("connect.php");
require_once("classAzienda.php");

session_start();

$title = "Resoconto annunci - Jomp";
$desc = "Visualizza tutti gli annunci pubblicati da un'azienda e amministrali.";
head($title, $desc);

headers();

$page = "Resoconto annunci";
breadcrumb(array('Area Personale', $page));

menu($page);


# ------------------------------------------------------

if(isset($_GET['msg'])){
    echo"<div class='successMsg'>Annuncio rimosso con successo!</div>";
}

echo"<div id='contenuto'>";
if(isset($_POST['update'])) {
	$ad = $_POST['update']; 
	$newTitle = $_POST['Title'];
	$newType = $_POST['Type'];
	$newContract = $_POST['ContractType'];
	$newTime = $_POST['TimeType'];
	$newDescr = $_POST['Description'];

	$up = "UPDATE Annunci SET Titolo = '".$newTitle."', Tipologia = '".$newType."', Orario = '".$newTime."', Contratto = '".$newContract."', Descrizione = '".$newDescr."'  WHERE Codice='".$ad."'";

	if(mysqli_query(openDB(), $up)) {
		echo "<div class='successMsg'>Annuncio modificato con successo!</div>";
	}
	else {
		echo "<div class='errorMsg'>Errore nell'aggiornare i propri dati.</div>";
	}
}


if(isset($_SESSION['login'])) {
	$company = $_SESSION['login'];
	$name = $company->getName();

	//annunci elencati dal più recente al meno
	$result = mysqli_query(openDB(), "SELECT * FROM Annunci JOIN Tipo ON Tipo.CodLavoro=Annunci.Tipologia JOIN OrarioLavoro ON OrarioLavoro.CodOrario=Annunci.Orario JOIN ContrattoLavoro ON ContrattoLavoro.CodContratto=Annunci.Contratto WHERE Azienda='".$name."' ORDER BY Data DESC");

	if(mysqli_num_rows($result) == 0) {
		echo "<div class='NoData'>Nessun annuncio ancora inserito.</div>";
	}

	else {
		echo "<h3>Ecco tutti i tuoi annunci:</h3>
			<ul>";
		
		//stampo tutti gli annunci trovati
		while($row = $result->fetch_array(MYSQLI_ASSOC)) {
			echo "<li class='ResAnn'>
					<ul>
						<li id='title'>".$row['Titolo']."</li>
						<li>Pubblicato il ".$row['Data']."</li>
						<li>Categoria: ".$row['Lavoro']."</li>
						<li>Contratto: ".$row['TipoContratto']."</li>
						<li>Orario: ".$row['TipoOrario']."</li>
						<li>".$row['Descrizione']."</li>
							<div id='options'>
								<form method='post' action='AzModificaAnnuncio.php'>
									<button value=".$row['Codice']." name='edit'>Modifica</button>
					            	<button value=".$row['Codice']." name='delete'>Rimuovi</button>
				            	</form>
			            	</div>
					</ul>
				</li>";
		}
		echo"</ul>";

	}
}

echo"</div>";

# ------------------------------------------------------

footer();
 
echo "</body> \n </html>";

?>