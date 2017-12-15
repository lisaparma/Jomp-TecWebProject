<?php

function menuHome()
{
	echo "<ul id='menu'>
	        <li> <a href='AzDashboard.php'> Area Aziende </a> </li>
	        <li> <a href='UtDashboard.php'> Area Privati </a> </li>
	        <li> <a href=''> boh </a> </li>
	        <li> <a href=''> boh </a> </li>
	     </ul>" ;
}

function search()
{
	echo "<div id='ricerca'> 
	        <form action='' method='get'>
	            <fieldset id='fieldset'>
	                <legend>  Ricerca:</legend>

	                <div id='titolo'> 
	                    <label for='titolo'>Titolo:<br/></label>
	                    <input type='text' id='boxtitolo' name='' tabindex='' value=''> <!--</input>-->
	                </div>

	                <div id='regione'> 
	                    <label for='titolo'>Regione:<br/></label>
	                    <input type='text' id='boxregione' name='' tabindex='' value=''> <!--</input>-->
	                </div>

	                <div id='tipologia'> 
	                    <label for='titolo'>Tipologia:<br/></label>
	                    <select name='tipologia'>
	                        <option value='' selected='selected'> Nessuna</option>
	                        <option value=''> Lavoro 1</option>
	                        <option value=''> Lavoro 2</option>
	                        <option value=''> Lavoro 3</option>

	                    </select>
	                </div>

	            <input type='submit' id='cerca' value='Cerca' tabindex=''>
	            </fieldset>

	        </form>
	    </div>" ;
}


//prende gli ultimi 5 annunci che sonostati inseriti nel database
function lastAds() {
	$result = mysqli_query(openDB(), "SELECT * FROM Annunci LIMIT 5");

	if($result) {
		echo "<div id='listannunci'>
		    	<p>Aggiunti di recente:</p>
		    		<ul id='annunci'>";
		while($row = $result->fetch_array(MYSQLI_ASSOC)) {
			echo "<li><h3>".$row['Titolo']."</h3>
						<p>Pubblicato il: ".$row['Data']."</p><br/>
						<p>Descrizione:<br/><p>".$row['Descrizione']."</p>
				</li>";
		}	
		echo "</ul>
    			</div>" ;       
	}
	else {
		echo "Ancora nessun annuncio è stato pubblicato";
	}
}

?>