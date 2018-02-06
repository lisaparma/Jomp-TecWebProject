<?php

require_once("structure.php");
require_once("connect.php");
require_once("classAdmin.php");
require_once("functionAdmin.php");

session_start();

$title = "Sezione Annunci - Jomp";
head($title);


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
		header("location: AdminModAnnunci.php?msg");
	}
	else {
		echo "Problemi con l'eliminizione dell'annuncio";
	}
}

//the messagge will show if the record has been successfully deleted
if(isset($_GET['msg'])){
    echo "Rimozione dell'annuncio avvenuto con successo!";
}


$result = mysqli_query(openDB(), "SELECT * FROM Annunci ORDER BY Titolo");

if(mysqli_num_rows($result) == 0) {
	echo "Nessun annuncio ancora inserito.";
}

else {
	echo "<h3>Ecco gli annunci che sono stati pubblicati:</h3>
		<ul>";
	
	while($row = $result->fetch_array(MYSQLI_ASSOC)) {
		echo "<li class=''>
				<ul>
					<li id='title'>Titolo: ".$row['Titolo'].";</li>
					<li>Tipologia: ".$row['Tipologia'].";</li>
					<li>Con contratto: ".$row['Contratto'].";</li>
					<li>Con orario: ".$row['Orario'].";</li>
					<li>Dall'azienda: ".$row['Azienda'].";</li>
					<li>Il giorno: ".$row['Data'].";</li>
					<li>Descrizione: ".$row['Descrizione'].";</li>
					
						<div id='options'>
							<form method='post' action='AdminModAziende.php'>
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