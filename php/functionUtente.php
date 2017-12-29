<?php

function breadcrumb($page)
{
	echo "<ul id='bc'>
          <li><a href='home.php'> <img class='icon' src='../IMG/home.svg'></img> </a></li>
          <li><a><span class='icon'> </span> Area personale </a></li>
          <li><a><span class='icon'> </span> $page</a></li>
        </ul>";
}


function menu($page)
{
	echo"<div class='container'>
	        <ul class='mcd-menu'>
	            <li>";
                if($page === 'Dashboard') 
                       echo "<a id='this'> 
                                <img class='logo' src='../IMG/dashboard.svg'>
					           <p>Dashboard</p>
                            </a>
                       </li>"; 
                   else 
                       echo "<a href='UtDashboard.php'>
                                <img class='logo' src='../IMG/dashboard.svg'>
					           <p>Dashboard</p>
                            </a>
                       </li>"; 
    
	            echo"<li>";
                if($page === 'Cerca annuncio') 
                       echo "<a id='this'> 
                            <img class='logo' src='../IMG/cerca.svg'>
					           <p>Cerca annuncio</p>
                            </a>
                       </li>"; 
                   else 
                       echo "<a href='UtCercaAnnuncio.php'> 
                                <img class='logo' src='../IMG/cerca.svg'>
					           <p>Cerca annuncio</p>
                            </a>
                       </li>"; 
    
	            echo "<li>";
                if($page === 'Annunci salvati') 
                       echo "<a id='this'> 
                                <img class='logo' src='../IMG/like.svg'>
					           <p>Annunci salvati</p>
                            </a>
                       </li>"; 
                   else 
                       echo "<a href='UtAnnunciSalvati.php'> 
                                <img class='logo' src='../IMG/like.svg'>
					           <p>Annunci salvati</p>
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
                       echo "<a href='UtModificaDati.php'> 
                                <img class='logo' src='../IMG/edit.svg'>
					           <p>Modifica Dati</p>
                            </a>
                       </li>"; 
	            echo "
	        </ul>
	    </div>";
}


// utilizzate in UtCercaAnnuncio e UtAnnunciSalvati
function printAd($result, $username, $page){
    while($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
                $id=$row['Codice'];
                if(liked($username, $id))
                    $like="Salvato";
                else 
                    $like="Salva";
                echo "</br></br>
                    <li id='fogli'>
                        <div id='foglio'>
                            <h3>".$row['Titolo']."</h3>
                            <p>Pubblicato il: ".$row['Data']."</p>
                            <p>Descrizione:<br/><p>".$row['Descrizione']."</p>
                            <form method='post' action=$page>
                                <button type='submit' name='$like' value='$id'>$like</button>
                            </form>
                        </div>
                    </li>
                    </br>
                    </br>";
            }	
}
function liked($username, $ad) {
    $query="SELECT * from Consultazioni WHERE CodAnnuncio='$ad' AND Utente='$username'";
    $result=mysqli_query(openDB(), $query);
    if(mysqli_num_rows($result))
        return true;
    else 
        return false;
}



// utilizzate in UtModificaDati.php
function checkEmail($email) {
    $result = mysqli_query(openDB(),"SELECT Username FROM Utenti WHERE Email='$email'");
    $num_rows = mysqli_num_rows($result);
    if($num_rows == 0) {
        return true;
    }
    return false;
}
function checkUsername($username) {
    $result = mysqli_query(openDB(),"SELECT Username FROM Utenti WHERE Username='$username'");
    $num_rows = mysqli_num_rows($result);
    if($num_rows == 0) {
        return true;
    }
    return false;
    
}



?>