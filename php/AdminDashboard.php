<?php

require_once("structure.php");
require_once("connect.php");
require_once("classAdmin.php");
require_once("functionAdmin.php");

session_start();

$title = "Dashboard Admin - Jomp";
head($title);


headers();

$page = "Dashboard";
breadcrumb(array('Area Personale', $page));

menu($page);

# ------------------------------------------------------

$admin = &$_SESSION['login'];
echo"<div id='contenuto'>";
echo "<h2>Buongiorno amministratore ".$admin->getName()."!</h2> 
		
		<h4>Dati relativi al sito:</h4>
		<ul>
            <li><strong>Numero utenti registrati: </strong>".registeredUsers()."</li> 
            <li><strong>Numero aziende registrate: </strong>".registeredCompanies()."</li> 
            <li><strong>Numero annunci pubblicati: </strong>".publishedAdds()."</li> 
        </ul>";


# ------------------------------------------------------

echo"</div>";
footer();
 
echo "</body> \n </html>";

?>