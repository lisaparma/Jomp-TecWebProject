<?php

require_once("structure.php");
require_once("functionUtente.php");
require_once("connect.php");
require_once("classUtente.php");
session_start();

$title = "Dashboard Utente - Jomp";
head($title);

echo "<body>";

headers();


# -------------------------------------------

if(isset($_SESSION['login'])){ // Solo se in sessione vedi questo 
    $page = "Dashboard";
    breadcrumb($page);
    menu($page);
    
    $user = $_SESSION['login'];
    
    echo"<div id='contenuto'>
                <h3> Benvenut";if($user->getSex() =='f') echo"a "; else echo"o "; echo "nella tua area personale, ".$user->getName()."!</h3>
                
            <h4> Ricapitoliamo i tuoi dati:</h4>
                <p> Nome: ".$user->getName()."<br/> 
                Cognome: ".$user->getSurname()." <br/> 
                e-mail:".$user->getEmail()." <br/> 
                Username:".$user->getUsername()." <br/> 
                Sesso: ";
                if($user->getSex()=='f')
                    echo "donna";
                else
                    echo "uomo";
    
    echo"  <h4> Ricerche salvate:</h4>
                <p> Numero ricerche salvate:".$user->getNumLike()."</p>
                <p> La città in cui cerchi più lavoro è ".$user->getPrefCity()." con ".$user->getNumLikePrefCity()." annunci salvati.</p>
                
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