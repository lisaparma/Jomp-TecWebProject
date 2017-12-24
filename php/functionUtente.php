<?php

function breadcrumb($page)
{
	echo "<div id='breadcrumb'>
	        <p>Ti trovi in: <span xml:lang='en'><a href='home.php'>Home</a> >>$page</span></p>
	    </div>";
}


function menu($page)
{
	echo"<div id='areaPersonale'>
	        <ul>
	            <li>"; 
	            if($page === 'Dashboard') { 
	            	echo "Dashboard</li>";
	            } else { 
	            	echo "<a href='UtDashboard.php'>Dashboard</a></li>"; 
	            } 
	            echo"<li>";
	           	if($page === 'Cerca annuncio') { 
	            	echo "Cerca annuncio</li>";
	            } else { 
	            	echo "<a href='UtCercaAnnuncio.php'>Cerca annuncio</a></li>"; 
	            }
	            echo "<li>";
	            if($page === 'Annunci salvati') { 
	            	echo "Annunci salvati</li>";
	            } else { 
	            	echo "<a href='UtAnnunciSalvati.php'>Annunci salvati</a></li>"; 
	            } 
	            echo "<li>";
	            if($page === 'Modifica dati') { 
	            	echo "Modifica dati</li>";
	            } else { 
	            	echo "<a href='UtModificaDati.php'>Modifica dati</a></li>"; 
	            } 
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
                echo "<li><h3>".$row['Titolo']."</h3>
                        <p>Pubblicato il: ".$row['Data']."</p>
                        <p>Descrizione:<br/><p>".$row['Descrizione']."</p>
                        <form method='post' action=$page>
                            <button type='submit' name='$like' value='$id'>$like</button>
                        </form>
                    </li>";
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