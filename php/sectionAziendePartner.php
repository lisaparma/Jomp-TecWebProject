<?php

require_once("structure.php");
require_once("functionHome.php");
require_once("connect.php");
require_once("classUtente.php");
require_once("classAzienda.php");

session_start();

$title = "Aziende partner - Jomp";
head($title);

headers();

$page='Aziende partner';
breadcrumb(array($page));

function getCompany() {
	$result = mysqli_query(openDB(), "SELECT Nome, Citta, Email, Descrizione FROM Aziende ORDER BY Nome ASC");

	if(mysqli_num_rows($result) == 0) {
		echo "<div class='NoData'> Nessuna azienda si è ancora registrata. </div>";
	}

	else {
		echo"<ul>";
		while($row = $result->fetch_array(MYSQLI_ASSOC)) {
			echo "<li class='sectionCompany'>
					<h3>".$row['Nome']."</strong></h3>
					<ul>
						<li> <strong>Sede:</strong> ".$row['Citta']."</li>
						<li> <strong>Contatto:</strong> ".$row['Email']."</li>
						<li> <strong>Sito web:</strong> Quando ci sarà verrà fuori</li>
						<li>".$row['Descrizione']."</li>
					</ul>
					<hr>
				</li>";
		}
		echo"</ul>";
	}
}

echo "<div id='intro'>
		<h2>Aziende partner</h2>
		<p>Moltissime aziende appartenenti ai diversi settori lavorativi sono alla continua ricerca di personale. La nostra ampia raccolta di annunci ti permette di valutare quale lavoro sia più adatto alle tue esigenze e alle tue passioni. Qui potrai conoscere meglio le aziende proponenti e in che ambiente lavorativo ti si potrebbe presentare davanti.</p>
		<p>L'ordine in cui vengono presentate le aziende, segue quello alfabetico (non è stato applicato nessun criterio sulla valutazione dell'azienda o sul numero di annunci più seguiti dagli utenti).</p>
	</div>";
getCompany();



footer();
 
echo "</body> \n </html>";
?>