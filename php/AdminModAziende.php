<?php

require_once("structure.php");
require_once("connect.php");
require_once("classAdmin.php");
require_once("functionAdmin.php");

session_start();

$title = "Sezione Aziende - Jomp";
head($title);

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

	if(mysqli_query(openDB(), $delete)) {
		header("location: AdminModAziende.php?msg");
	}
	else {
		echo "Problemi con l'eliminizione dell'azienda";
	}
}

//the messagge will show if the record has been successfully deleted
if(isset($_GET['msg'])){
    echo "Rimozione dell'azienda avvenuta con successo!";
}


$result = mysqli_query(openDB(), "SELECT * FROM Aziende ORDER BY Nome");

if(mysqli_num_rows($result) == 0) {
	echo "<div class='NoData'> Nessuna azienda ancora registrata. </div>";
}

else {
	echo "<h3>Ecco le aziende che stanno usando il servizio:</h3>
		<ul>";
	
	while($row = $result->fetch_array(MYSQLI_ASSOC)) {
		echo "<li class=''>
				<ul>
					<li id='title'>Nome: ".$row['Nome'].";</li>
					<li>Partita Iva: ".$row['PIva'].";</li>
					<li>Email: ".$row['Email'].";</li>
					<li>Iscritto il ".$row['Iscrizione'].";</li>
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