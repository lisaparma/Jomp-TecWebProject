<?php

require_once("structure.php");
require_once("connect.php");
require_once("classAdmin.php");
require_once("functionAdmin.php");

session_start();

$title = "Sezione Aziende - Jomp";
$desc = "Pagina amministrazione dedicata alla moderazione delle aziende registrate al sito";
head($title, $desc);

headers();

$page = "Sezione Aziende";
breadcrumb(array('Area Personale', $page));

menu($page);

# ------------------------------------------------------

echo"<div id='contenuto'>";

//delete action
if(isset($_POST['delete'])) {
	$company = $_POST['delete'];

	$delete = "DELETE FROM Aziende WHERE Codice='".$company."'";

	if(!mysqli_query(openDB(), $delete)) {
		echo "<div class='errorMsg'> Problemi con l'eliminizione dell'utente</div>";
	}
	else {
		echo "<div class='successMsg'>Rimozione dell'azienda avvenuta con successo!</div>";
	}
}

$result = mysqli_query(openDB(), "SELECT * FROM Aziende ORDER BY Nome");

if(mysqli_num_rows($result) == 0) {
	echo "<div class='NoData'> Nessuna azienda ancora registrata. </div>";
}

else {
	echo "<h3>Ecco le aziende che stanno usando il servizio:</h3>
		<ul id='ModAziende'>";
	
	while($row = $result->fetch_array(MYSQLI_ASSOC)) {
		echo "<li class='formMod'>
				<ul>
				<div class='inner-wrap'>
					<li><strong>Nome</strong>: ".$row['Nome'].";</li>
					<li><strong>Partita Iva</strong>: ".$row['PIva'].";</li>
					<li><strong>Email</strong>: ".$row['Email'].";</li>
					<li><strong>Iscritto il</strong>: ".$row['Iscrizione'].";</li>
					<li><strong>Descrizione</strong>: ".$row['Descrizione'].";</li>
				</div>
				</ul>
						<div id='options'>
							<form method='post' action='AdminModAziende.php'>
				            	<button value='".$row['Codice']."' name='delete'>Rimuovi</button>
			            	</form>
		            	</div>
			</li>";
	}
	echo"</ul>";

}


# ------------------------------------------------------

echo"</div>";
footer();
 
echo "</body> \n </html>";

?>