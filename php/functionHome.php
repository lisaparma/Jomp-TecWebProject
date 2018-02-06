<?php

function menuHome() {
	echo "<ul id='menu'>
	        <li><a href='sectionChiSiamo.php'> Chi siamo </a></li>";

    if(isset($_SESSION['login'])) {
    	if(get_class($_SESSION['login']) == 'Admin')
    		echo "<li><a href='AdminDashboard.php'> Area personale </a></li>";
        
        if(get_class($_SESSION['login']) == 'Utente') 
        	echo "<li><a href='UtDashboard.php'> Area personale </a></li>";
        
        else
            echo "<li><a href='AzDashboard.php'> Area personale </a></li>";
    }
    else
        echo "<li><a href='login.php'> Login </a></li>";
    echo "<li><a href='sectionAziendePartner.php'> Aziende partner </a></li>
	       <li><a href='sectionPerchèIscriversi.php'> Perchè iscriversi </a></li>
	       </ul>" ;
}


function searchForm($pagephp) {
	echo "<div id='ricerca'> 
	        <form id='ricercaForm' action='$pagephp' method='post'>
	            <fieldset id='fieldset'>
					<h2> Ricerca offerte </h2>

					<div id='titolo'> 
                        <label for='boxtitolo'>Cosa cerchi?<br/></label>
						<input type='text' id='boxtitolo' name='Title' placeholder='Inserisci parole chiave' tabindex=''> <!--</input>-->
					</div>

					<div id='regione'>
                        <label for='boxcitta'>Dove?<br/></label>
						<input type='text' id='boxcitta' name='City' placeholder='Città' tabindex=''> <!--</input>-->
					</div>

					<div id='tipologia'> 
						<label for='boxvalue'>Di che tipo?<br/></label>  
                            <select id='boxvalue' name='Type'>
							<option value='all' selected> Tipologia: ";
                            $result = mysqli_query(openDB(), "SELECT * FROM Tipo");
	                        while($row = $result->fetch_array(MYSQLI_ASSOC)) {
                                echo "<option value='".$row['CodLavoro']."'>".$row['Lavoro']."</option>";
                            }
                    echo" 
	                    </select>
	                </div>

	            <input type='submit' id='cerca' value='Cerca' tabindex='' name='cerca'>
	            </fieldset>

	        </form>
	    </div>" ;
}
    
    

//prende gli ultimi 5 annunci che sono stati inseriti nel database
function lastAds() {
	$result = mysqli_query(openDB(), "SELECT * FROM Annunci ORDER BY Data DESC LIMIT 5");

	if($result) {
		echo "<div id='listannunci'>
		    	<h3>Ultimi annunci inseriti:</h3>
		    		<ul id='annunci'>";
		              printAdsHome($result);
		echo "      </ul>
    			</div>" ;       
	}
	else {
		echo "Ancora nessun annuncio è stato pubblicato";
	}
}

function printAdsHome($result) { //se si modifica questa cambiare anche printAds() in functionUtente.php
    while($row = $result->fetch_array(MYSQLI_ASSOC)) {
			echo "
                <li id='fogli'>
                    <div id='foglio'>
                        <h3>".$row['Titolo']."</h3>
						<small>Pubblicato il: ".$row['Data']." </small>
						<p><strong> Descrizione:</strong><br/>".$row['Descrizione']."</p>
                    </div>
				</li>"
                ;
		}	
	}
?>