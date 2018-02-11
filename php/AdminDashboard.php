<?php

require_once("structure.php");
require_once("connect.php");
require_once("classAdmin.php");
require_once("functionAdmin.php");

session_start();

$title = "Dashboard Admin - Jomp";
$desc = "Pagina amministrazione dedicata alla visualizzazione generale dei dati.";
head($title, $desc);

headers();

$page = "Dashboard";
breadcrumb(array('Area Personale', $page));

menu($page);

# ------------------------------------------------------

if(isset($_SESSION['login'])){
	$admin = &$_SESSION['login'];
	echo"<div id='contenuto'>";
	echo "<h2>Buongiorno amministratore ".$admin->getName()."!</h2> 
			
			<h4>Dati relativi al sito:</h4>
			<ul>
	            <li><strong>Numero utenti registrati: </strong>".registeredUsers()."</li> 
	            <li><strong>Numero aziende registrate: </strong>".registeredCompanies()."</li> 
	            <li><strong>Numero annunci pubblicati: </strong>".publishedAdds()."</li> 
	        </ul>";
}
else{
    echo " <div id='contenuto'>
	           <div class='errorMsg'>Sessione scaduta, procedere con la riutenticazione.</div>
	       </div>";
}


# ------------------------------------------------------

echo"</div>";
footer();
 
echo "</body> \n </html>";

?>