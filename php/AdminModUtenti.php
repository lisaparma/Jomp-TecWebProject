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

$result = mysqli_query(openDB(), "SELECT * FROM Utenti WHERE Uso='utente' ORDER BY Cognome");

if(mysqli_num_rows($result) == 0) {
	echo "Nessun utente ancora registrato.";
}

else {
	echo "<h3>Ecco gli utenti che si sono registrati:</h3>
		<ul>";
	
	while($row = $result->fetch_array(MYSQLI_ASSOC)) {
		echo "<li class=''>
				<ul>
					<li id='title'>Nome: ".$row['Cognome']." ".$row['Nome'].";</li>
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