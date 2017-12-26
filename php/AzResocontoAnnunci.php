<?php

require_once("structure.php");
require_once("functionAzienda.php");
require_once("connect.php");

session_start();

$title = "Resoconto annunci - Jomp";
head($title);

echo "<body>";

headers();

$page = "Resoconto annunci";
breadcrumb($page);

menu($page);


# ------------------------------------------------------


//$edit = false;
if(isset($_SESSION['login'])) {
	$name = $_SESSION['login']['Nome'];

	$result = mysqli_query(openDB(), "SELECT * FROM Annunci WHERE Azienda='".$name."'");

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
				            			<button value='Rimuovi' name='delete'>Rimuovi</button>
				            		</form>
			            		</div>
							</dd>
						</dt>
					</dl>
				</div>";
		}			
	}
}



# ------------------------------------------------------

footer();
 
echo "</body> \n </html>";

?>