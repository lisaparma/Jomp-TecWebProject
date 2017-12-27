<?php

function breadcrumb($page) {
	if($page == 'Modifica annuncio') {
		echo "<div id='breadcrumb'>
	        <p> Ti trovi in: <span xml:lang='en'> <a href='home.php'>  Home</a> >> <a href='AzResocontoAnnunci.php'> Resoconto Annunci</a> >> $page </span> </p>
	    </div> ";
	}
	else {
		echo "<div id='breadcrumb'>
		        <p> Ti trovi in: <span xml:lang='en'> <a href='home.php'>  Home</a> >> $page </span> </p>
		    </div> " ;
	}
}


function menu($page) {
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


//usata sia del form per pubblicare annunci sia dal form per modificare uno specifico annuncio
function printWorkType($id) {
	$result = mysqli_query(openDB(), "SELECT * FROM Tipo");

	echo "<label for='type'> Tipologia: </label>
	            <select id='type' name='Type' required>";
	if($id == 'null') {
		while($row = $result->fetch_array(MYSQLI_ASSOC)) {
			echo "<option value=".$row['CodLavoro'].">".$row['Lavoro']."</option>";
    	}	
	}
	else {
		while($row = $result->fetch_array(MYSQLI_ASSOC)) {
			$selected = ($id == $row['CodLavoro']) ? 'selected' : '';

			echo "<option value='".$row['CodLavoro']."' $selected>".$row['Lavoro']."</option>";
    	}		
	}
	echo $id;
	echo "ciao";
    echo "</select>";
}


?>