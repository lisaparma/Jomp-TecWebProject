<?php

require_once("structure.php");
require_once("connect.php");
require_once("classAdmin.php");
require_once("functionAdmin.php");

session_start();

$title = "Sezione Utenti- Jomp";
head($title);

headers();

$page = "Sezione Utenti";
breadcrumb(array('Area Personale', $page));

menu($page);

# ------------------------------------------------------

echo"<div id='contenuto'>";

//delete action
if(isset($_POST['delete'])) {
	$username = $_POST['delete'];

	$delete = "DELETE FROM Utenti WHERE Username='".$username."'";

	if(mysqli_query(openDB(), $delete)) {
		header("location: AdminModUtenti.php?msg");
	}
	else {
		echo "Problemi con l'eliminizione dell'utente";
	}
}

//the messagge will show if the record has been successfully deleted
if(isset($_GET['msg'])){
    echo "Rimozione dell'utente avvenuta con successo!";
}


$result = mysqli_query(openDB(), "SELECT * FROM Utenti WHERE Uso='utente' ORDER BY Cognome");

if(mysqli_num_rows($result) == 0) {
	echo "<div class='NoData'> Nessun utente ancora registrato.</div>";
}

else {
	echo "<h3>Ecco gli utenti che si sono registrati:</h3>
		<ul>";
	
	while($row = $result->fetch_array(MYSQLI_ASSOC)) {
		echo "<li class=''>
				<ul>
					<li>Nome: ".$row['Cognome']." ".$row['Nome'].";</li>
					<li>Data di nascita: ".$row['Nascita'].";</li>
					<li>Email: ".$row['Email'].";</li>
					<li>Iscritto il ".$row['Iscrizione'].";</li>
					<li>Username scelto: ".$row['Username'].";</li>
					
						<div id='options'>
							<form method='post' action='AdminModUtenti.php'>
				            	<button value=".$row['Username']." name='delete'>Rimuovi</button>
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