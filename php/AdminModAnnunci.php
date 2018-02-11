<?php

require_once("structure.php");
require_once("connect.php");
require_once("classAdmin.php");
require_once("functionAdmin.php");

session_start();

$title = "Sezione Annunci - Jomp";
$desc = "Pagina amministrazione dedicata alla moderazione degli annunci pubblicati dalle aziende nel sito";
head($title, $desc);


headers();

$page = "Sezione Annunci";
breadcrumb(array('Area Personale', $page));

menu($page);

# ------------------------------------------------------

echo"<div id='contenuto'>";

//delete action
if(isset($_POST['delete'])) {
	$ad = $_POST['delete'];

	$delete = "DELETE FROM Annunci WHERE Codice='".$ad."'";

	if(mysqli_query(openDB(), $delete)) {
		echo "<div class='successMsg'>Rimozione dell'annuncio avvenuto con successo!</div>";
	}
	else {
		echo "<div class='errorMsg'>Problemi con l'eliminizione dell'annuncio</div>";
	}
}

$result = mysqli_query(openDB(), "SELECT * FROM Annunci ORDER BY Titolo");

if(mysqli_num_rows($result) == 0) {
	echo "<div id='NoData'> Nessun annuncio ancora inserito. </div>";
}

else {
	echo "<h3>Ecco gli annunci che sono stati pubblicati:</h3>
		<ul>";
	
	while($row = $result->fetch_array(MYSQLI_ASSOC)) {
		echo "<li class='ResAnn'>
				<ul>
					<li id='title'> ".$row['Titolo'].";</li>
					<li><strong>Tipologia</strong>: ".$row['Tipologia'].";</li>
					<li><strong>Con contratto</strong>: ".$row['Contratto'].";</li>
					<li><strong>Con orario</strong>: ".$row['Orario'].";</li>
					<li><strong>Dall'azienda</strong>: ".$row['Azienda'].";</li>
					<li><strong>Il giorno</strong>: ".$row['Data'].";</li>
					<li><strong>Descrizione</strong>: ".$row['Descrizione'].";</li>
					
						<div id='options'>
							<form method='post' action='AdminModAnnunci.php'>
				            	<button value=".$row['Codice']." name='delete'>Rimuovi</button>
			            	</form>
		            	</div>
				</ul>
			</li>";
	}
	echo"</ul>";

}

# ------------------------------------------------------

echo"</div>";
footer();
 
echo "</body> \n </html>";

?>