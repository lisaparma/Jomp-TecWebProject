<?php


function breadcrumb($page)
{
	echo "<div id='breadcrumb'>
	        <p> Ti trovi in: <span xml:lang='en'> <a href='home.php'>  Home</a> >> $page </span> </p>
	    </div> " ;
}



function menu($page)
{
	echo"<div id='areaPersonale'>
	        <ul>
	            <li> "; 
	            if($page === 'Dashboard') { 
        			echo "Dashboard </li>";
        		} else { 
        			echo "<a href='AzDashboard.php'> Dashboard </a></li>"; 
        		} 
        		echo "<li>"; 
        		if($page === "Pubblica annuncio") { 
        			echo "Pubblica annuncio</li>";
        		} else { 
        			echo "<a href='AzPubblicaAnnuncio.php'>Pubblica annuncio</a></li>"; 
        		} 
        		echo "<li>"; 
        		if($page === "Resoconto annunci") { 
        			echo "Recosonto annunci</li>";
        		} else { 
        			echo "<a href='AzResocontoAnnunci.php'>Resoconto annunci</a></li>"; 
        		} echo "<li>";
        		if($page === "Modifica dati") { 
        			echo "Modifica dati</li>";
        		} else { 
        			echo "<a href='AzModificaDati.php'>Modifica dati</a></li> "; 
        		} 
        		echo "
	        </ul>
	    </div>";
}



function addAds() {
	echo "<div id='contenuto'>
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

	            $title = $_POST['Title'];
	            $type = $_POST['Tipologia'];
	            $description = $_POST['Description'];
	            $name = $_SESSION['login']['Nome'];

	    	    $ad = "INSERT INTO Annunci(Titolo, Azienda, Tipologia, Descrizione) VALUES ('$title', '$name', '$type', '$description')";

	    		if ($db->query($ad)) {
    				header("location: AzResocontoAnnunci.php");
				} 
				else {
    				echo "Errore";
				}
	   
	        }
	        else {
	            echo "Connessione scaduta";    
	        }
		}
		catch (Exception $e) {
	        echo "Errore: " . $e->getMessage();
	        die();
	    }
	} 
}



function adsList($select) {
	if(isset($_SESSION['login'])) {
		$name = $_SESSION['login']['Nome'];
		$word = $empty = '';

		if($select == 'all') {
			$result = mysqli_query(openDB(), "SELECT * FROM Annunci WHERE Azienda='".$name."'");
		}

		if($select == 'lastAdded') {
			$result = mysqli_query(openDB(), "SELECT * FROM Annunci WHERE Azienda='".$name."' LIMIT 3");
			$word = 'ultimi';
		}

		if(mysqli_num_rows($result) == 0) {
			$empty = "Nessun annuncio ancora inserito.";
		}

		if($result) {
			echo "<p>Ecco i tuoi ".$word." annunci:</p>";
			//stampo tutti gli annunci trovati
			echo $empty;
			while($row = $result->fetch_array(MYSQLI_ASSOC)) {
					
				echo "<div id='contenuto'>
						<dl>
							<dt>".$row['Titolo']."</dt>
							<dd>Pubblicato il ".$row['Data']."</br>
								".$row['Descrizione']."</br>
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


function checkName($Name) {
    $result = mysqli_query(openDB(),"SELECT Nome FROM Aziende WHERE Nome='".$Name."'");

    $num_rows = mysqli_num_rows($result);

    if($num_rows == 0) {
        return true;
    }
    return false;
}


function checkPIva($PIva) {
    $result = mysqli_query(openDB(),"SELECT PIva FROM Aziende WHERE PIva='".$PIva."'");

    $num_rows = mysqli_num_rows($result);

    if($num_rows == 0) {
        return true;
    }
    return false;   
}


function checkRepeatPassword($Password, $RipPassword) {
    if($Password == $RipPassword) {
        return true;
    }
    return false;
}



function editCompanyData() {
	try {
		if(isset($_SESSION['login'])) {
			$id = $_SESSION['login']['Codice'];
			$name = $_SESSION['login']['Nome'];
			$pIva = $_SESSION['login']['PIva'];
			$email = $_SESSION['login']['Email'];
			$city = $_SESSION['login']['Citta'];
			$password = $_SESSION['login']['Password'];

			echo "<div id='contenuto'>
			        <h4> I tuoi dati: </h4>
			        <form method='post' action='AzModificaDati.php'> 

			            <label for='nome'>Nome: </label><br/>
			            <input type='text' id='nome' value='$name' name='Nome'><br/> 
			                
	    				<label for='pIva'>Partita Iva: </label><br/>
			            <input type='text' id='pIva' value='$pIva' name='PIva'><br/>
			                
			            <label for='email'>E-mail: </label><br/>
			            <input type='text' id='email' value='$email' name='Email'><br/>        
			                
			            <label for='city'>Città: </label><br/>
			            <input type='text' id='city' value='$city' name='City'><br/>
			                
			            <label for='password'> Password: </label><br/>
			            <input type='password' id='password' name='Password' value='$password'><br/>
			            <br/>

	                	<input type='submit' value='Modifica' name='edit'>

			        </form>
	            </div>";
//FINIREEEEE ->
	            if(isset($_POST['edit'])) {
					$newName = $_POST['Nome'];
					$newPIva = $_POST['PIva'];
					$newEmail = $_POST['Email'];
					$newCity = $_POST['City'];
					$newPassword = $_POST['Password'];	

	            	$update = "UPDATE Aziende SET Nome='".$newName."', PIva='".$newPIva."', Email='".$newEmail."', Citta='".$newCity."', Password='".$newPassword."'  WHERE Codice='".$id."'";
	            	if(mysqli_query(openDB(), $update)) {
	            		header("location: AzDashboard.php");
	            	}
	            	else {
	            		echo "Errore nell'aggiornare i propri dati.";
	            	}
	            }

		}
	} catch (PDOException $e) {
        echo "Errore: " . $e->getMessage();
        die();
    }
}
?>