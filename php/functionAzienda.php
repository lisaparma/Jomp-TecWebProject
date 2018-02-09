<?php


function menu($page) {
	echo"<div class='container-menu'>
	        <ul class='ap-menu'>
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
    echo "</select>";
}


function printTimeType($id) {
  $result = mysqli_query(openDB(), "SELECT * FROM OrarioLavoro");

  echo "<label for='Timetype'> Orario: </label>
              <select id='Timetype' name='TimeType' required>";
  if($id == 'null') {
    while($row = $result->fetch_array(MYSQLI_ASSOC)) {
      echo "<option value=".$row['CodOrario'].">".$row['TipoOrario']."</option>";
      } 
  }
  else {
    while($row = $result->fetch_array(MYSQLI_ASSOC)) {
      $selected = ($id == $row['CodOrario']) ? 'selected' : '';

      echo "<option value='".$row['CodOrario']."' $selected>".$row['TipoOrario']."</option>";
      }   
  }
    echo "</select>";
}


function printContractType($id) {
  $result = mysqli_query(openDB(), "SELECT * FROM ContrattoLavoro");

  echo "<label for='contractType'> Contratto: </label>
              <select id='contractType' name='ContractType' required>";
  if($id == 'null') {
    while($row = $result->fetch_array(MYSQLI_ASSOC)) {
      echo "<option value=".$row['CodContratto'].">".$row['TipoContratto']."</option>";
      } 
  }
  else {
    while($row = $result->fetch_array(MYSQLI_ASSOC)) {
      $selected = ($id == $row['CodContratto']) ? 'selected' : '';

      echo "<option value='".$row['CodContratto']."' $selected>".$row['TipoContratto']."</option>";
      }   
  }
    echo "</select>";
}


//funzioni di verifica di specifici campi dati
function checkName($name) {
    $result = mysqli_query(openDB(),"SELECT Codice FROM Aziende WHERE Nome='".$name."'");

    $num_rows = mysqli_num_rows($result);

    if($num_rows == 0) {
        return true;
    }
    return false;
}


function checkPIva($pIva) {
    $result = mysqli_query(openDB(),"SELECT Codice FROM Aziende WHERE PIva='".$pIva."'");

    $num_rows = mysqli_num_rows($result);

    if($num_rows == 0) {
        return true;
    }
    return false;   
}

function checkEmail($email) {
  $result = mysqli_query(openDB(),"SELECT Email FROM Aziende WHERE Email='$email'");
  $num_rows = mysqli_num_rows($result);
  if($num_rows == 0) {
      return true;
  }
  return false;
}


function checkLengthPIva($pIva) {
  if(strlen($pIva) == 11) {
    return true;
  }
  else {
    return false;
  }    
}


function checkLengthPassword($password) {
  if(strlen($password) > 7) {
    return true;
  }
  else {
    return false;
  }
}


function checkRepeatPassword($password, $ripPassword) {
    if($password == $ripPassword) {
        return true;
    }
    return false;
}


?>