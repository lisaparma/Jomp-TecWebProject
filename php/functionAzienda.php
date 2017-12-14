<?php


function breadcrumb($page)
{
	echo"<div id='breadcrumb'>
	        <p> Ti trovi in: <span xml:lang='en'> <a href='home.php'>  Home</a> >> $page </span> </p>
	    </div> " ;
}



function menu($page)
{
	echo"<div id='areaPersonale'>
	        <ul>
	            <li> "; if($page==="Dashboard") { 
	            			echo" Dashboard </li>";
	            		} else { 
	            			echo " <a href='AzDashboard.php'> Dashboard </a>  </li> "; 
	            		} echo"
	            <li> "; if($page==="Pubblica annuncio") { 
	            			echo" Pubblica annuncio </li>";
	            		} else { 
	            			echo " <a href='AzPubblicaAnnuncio.php'> Pubblica annuncio </a>  </li> "; 
	            		} echo"
	            <li> "; if($page==="Resoconto annunci") { 
	            			echo" Recosonto annunci </li>";
	            		} else { 
	            			echo " <a href='AzResocontoAnnunci.php'> Resoconto annunci </a>  </li> "; 
	            		} echo"
	            <li> "; if($page==="Modifica dati") { 
	            			echo" Modifica dati </li>";
	            		} else { 
	            			echo " <a href='AzModificaDati.php'> Modifica dati </a>  </li> "; 
	            		} echo"


	        </ul>
	    </div> " ;
}

function addAds() {
	echo" <div id='contenuto'>
	    	<form form method='post' action='AzPubblicaAnnuncio.php' accept-charset='utf-8'>
	    		<h3>Inserisci annuncio: </h3>

	    		<label for='title'> Titolo: </label>
	            <input type='text' id='title' name='Title' placeholder='Titolo' required><br/> 

	            <label for='type'> Tipologia: </label>
	            <select name='Tipologia' required>
	            	<option value='Amministrazione'> Amministrazione </option>
	            	<option value='Assistenza'> Assistenza anziani e/o disabili </option>
	            	<option value='Contabilità'> Contabilità </option>
	            	<option value='Direzione'> Direzione </option>
	            	<option value='Edilizia'> Edilizia </option>
	            	<option value='Estetica'> Estetica </option>
	            	<option value='Formazione'> Formazione </option>
	            	<option value='Marketing'> Marketing </option>
	            	<option value='Medicina'> Medicina </option>
	            	<option value='Produzione'> Produzione </option>
	            	<option value='Ristorazione'> Ristorazione </option>
	            	<option value='Sicurezza'> Sicurezza </option> 
	            	<option value='Altro'> Altro </option>
	            </select>

	            <p> Inserisci una breve descrizione del lavoro (max 300 caratteri): </p>
	            <textarea name='Description' rows='5' cols='70' required></textarea><br/>

	            <input type='submit' value='Inserisci' name='submit'>
	    	</form>
	    </div> ";

	if(isset($_POST['submit'])) {
		try {
	        if(isset($_SESSION['login'])) {
	    	    $db = openDB();

	            $Title = $_POST['Title'];
	            $Type = $_POST['Tipologia'];
	            $Description = $_POST['Description'];
	            $day = time();
	            $Name = $_SESSION['login']['Nome'];

	    	    $ad = "INSERT INTO Annunci(Titolo, Azienda, Tipologia, Orario, Descrizione) VALUES('$Title', '$Name', '$Type', '".date("d.m.Y", $day)."', '$Description')";

	    		if ($db->query($ad)) {
    				header("location: AzResocontoAnnunci.php");
				} 
				else {
    				echo "Errore";
				}
	   
	        }
	        else {
	            echo "Connessione scaduta";     //BOZZA -> scrivere meglio l'errore
	        }
		}
		catch (Exception $e) {
	        echo "Errore: " . $e->getMessage();
	        die();
	    }
	} 
}


function resoconto() {
	if(isset($_SESSION['login'])) {
		$name = $_SESSION['login']['Nome'];

		//prendo tutti gli annunci della azienda loggata
		$result = mysqli_query(openDB(), "SELECT * FROM Annunci WHERE Azienda='".$name."'");

		if($result) {
		//stampo tutti gli annunci trovati
			while($row = $result->fetch_array(MYSQLI_ASSOC)) {

					echo "<div id=content>
							<p> Ecco i tuoi annunci: </p>
								<dl>
									<dt>'".$row['Titolo']."'</dt>
										<dd>Pubblicato il '".$row['Orario']."'</br>
										'".$row['Descrizione']."'</br>
											<div id='options'>
												<p class='button' id='edit'><a href=''>Modifica</a></p>
						            			<p class='button' id='remove'><a href=''>Rimuovi</a></p>
						            		</div>
										</dd>
									</dt>
								</dl>
							</div>";

			}
		}
		else {
			echo "Ancora nessun annuncio inserito";
		}
	}
}

function modificaDati() {
	echo" <div id='contenuto'>
	        <p> modifichiamo i dati</p>
	    </div> " ;
}

?>