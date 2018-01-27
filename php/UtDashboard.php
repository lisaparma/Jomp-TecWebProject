<?php

require_once("structure.php");
require_once("functionUtente.php");
require_once("connect.php");
require_once("classUtente.php");
session_start();

$title = "Dashboard Utente - Jomp";
head($title);


headers();


# -------------------------------------------

if(isset($_SESSION['login'])){ // Solo se in sessione vedi questo 
    $page = "Dashboard";
    breadcrumb(array('Area Personale', $page));
    menu($page);
    
    $user = $_SESSION['login'];
    
    echo"<div id='contenuto'>
                <h3> Benvenut";if($user->getSex() =='f') echo"a "; else echo"o "; echo "nella tua area personale, ".$user->getName()."!</h3>
                
            <h4> Ricapitoliamo i tuoi dati:</h4>
                <p> <strong> Nome: </strong>".$user->getName()."<br/> 
                <strong> Cognome: </strong>".$user->getSurname()." <br/> 
                <strong>E-mail: </strong>".$user->getEmail()." <br/> 
                <strong>Username: </strong>".$user->getUsername()." <br/> 
                <strong>Sesso: </strong>";
                if($user->getSex()=='f')
                    echo "donna</p>";
                else
                    echo "uomo</p>";
    
    echo"  <h4> Ricerche salvate:</h4>
                <p> Numero ricerche salvate: ".$user->getNumLike()."</br>
                La città in cui cerchi più lavoro è ".$user->getPrefCity()." con ".$user->getNumLikePrefCity()." annunci salvati.</p>
                
                
    </div>
    ";
    
}
else{
    echo " <div id='contenuto'>
	           <p>Sessione scaduta, procedere con la riutenticazione.</p>
	       </div>";
}


# -------------------------------------------

footer();
 
echo "</body> \n </html>";

?>