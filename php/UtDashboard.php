<?php

require("structure.php");
require("functionUtente.php");
require("connect.php");
require("classUtente.php");
session_start();

$title = "Dashboard Utente - Jomp";
head($title);

echo "<body>";

headers();

$page = "Dashboard";
breadcrumb($page);

menu($page);

# -------------------------------------------

if(isset($_SESSION['login'])){
    
    $user = $_SESSION['login'];
    
    echo"<div id='contenuto'>
                <h3> Benvenut";if($user->getSex() =='f') echo"a "; else echo"o "; echo $user->getName()."!</h3>
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