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


function lastAds()
{
	echo "<div id='listannunci'>
		    <p> Ultimi annunci:</p>
		        <ul id='annunci'>
		            <li> <h3> Annuncio 1</h3> <p> Descrizione</p></li>
		            <li> <h3> Annuncio 2</h3> <p> Descrizione</p> </li>
		            <li> <h3> Annuncio 3</h3> <p> Descrizione</p> </li>
		            <li> <h3> Annuncio 4</h3> <p> Descrizione</p> </li>
		            <li> <h3> Annuncio 5</h3> <p> Descrizione</p> </li>
		        </ul>
		    </div>" ;
}

?>