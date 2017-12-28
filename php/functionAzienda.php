<?php

function breadcrumb($page) {
	echo "<ul id='bc'>
          <li><a href='home.php'> <img class='icon' src='../IMG/home.svg'></img> </a></li>
          <li><a><span class='icon'> </span> Area personale </a></li>
          <li><a><span class='icon'> </span> $page</a></li>
        </ul>";
}


function menu($page) {
	echo"<div class='container'>
	        <ul class='mcd-menu'>
	            <li> "; 
                if($page === 'Dashboard') 
                       echo "<a id='this'> 
                                <img class='logo' src='../IMG/dashboard.svg'>
					           <p>Dashboard</p>
                            </a>
                       </li>"; 
                   else 
                       echo "<a href='AzDashboard.php'>
                                <img class='logo' src='../IMG/dashboard.svg'>
					           <p>Dashboard</p>
                            </a>
                       </li>"; 
    
	            echo"<li>";
                if($page === 'Pubblica annuncio') 
                       echo "<a id='this'> 
                            <img class='logo' src='../IMG/annunci.svg'>
					           <p>Pubblica annuncio</p>
                            </a>
                       </li>"; 
                   else 
                       echo "<a href='AzPubblicaAnnuncio.php'> 
                                <img class='logo' src='../IMG/annunci.svg'>
					           <p>Pubblica annuncio</p>
                            </a>
                       </li>"; 
    
	            echo "<li>";
                if($page === 'Resoconto annunci') 
                       echo "<a id='this'> 
                                <img class='logo' src='../IMG/list.svg'>
					           <p>Resoconto annunci</p>
                            </a>
                       </li>"; 
                   else 
                       echo "<a href='AzResocontoAnnunci.php'> 
                                <img class='logo' src='../IMG/list.svg'>
					           <p>Resoconti annunci</p>
                            </a>
                       </li>"; 
   
	            echo "<li>";
                if($page === 'Modifica dati') 
                       echo "<a id='this'> 
                                <img class='logo' src='../IMG/edit.svg'>
					           <p>Modifica dati</p>
                            </a>
                       </li>"; 
                   else 
                       echo "<a href='AzModificaDati.php'> 
                                <img class='logo' src='../IMG/edit.svg'>
					           <p>Modifica Dati</p>
                            </a>
                       </li>"; 
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