<?php

require_once("structure.php");
require_once("functionHome.php");
require_once("connect.php");
require_once("classUtente.php");
require_once("classAzienda.php");

session_start();

$title = "Aziende partner - Jomp";
head($title);

echo "<body>";

headers();

$page='Aziende partner';
breadcrumb(array($page));

function getCompany() {
	$result = mysqli_query(openDB(), "SELECT Nome, Citta, Email, Descrizione FROM Aziende ORDER BY Nome ASC");

	if(mysqli_num_rows($result) == 0) {
		echo "Nessuna azienda si è ancora registrata.";
	}

	else {
		while($row = $result->fetch_array(MYSQLI_ASSOC)) {
			echo "<div id='section'>
					<dl>
						<dt><strong>".$row['Nome']."</strong></dt><br/>
							<dd>Sede a ".$row['Citta']."</dd></br>
							<dd>Contatto: ".$row['Email']."<dd></br>
							<dd>".$row['Descrizione']."</dd></br>
						</dt>
					</dl>
				</div>
			<br/>";
		}

	}
}

echo "<div id='section'><h2>Aziende partner</h2>
		<p>Moltissime aziende appartenenti ai diversi settori lavorativi sono alla continua ricerca di
		 personale. La nostra ampia raccolta di annunci ti permette di valutare quale lavoro sia più 
		 adatto alle tue esigenze e alle tue passioni. Qui potrai conoscere meglio le aziende 
		 proponenti e in che ambiente lavorativo ti si potrebbe presentare davanti.</p>
		 <p>L'ordine in cui vengono presentate le aziende, segue quello alfabetico (non è stato
		  applicato nessun criterio sulla valutazione dell'azienda o sul numero di annunci più
		  seguiti dagli utenti).</p>
		</div>";
getCompany();



footer();
 
echo "</body> \n </html>";
?>