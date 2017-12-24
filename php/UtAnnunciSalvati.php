<?php

require("structure.php");
require("functionUtente.php");
require("connect.php");
require("classUtente.php");

session_start();

$title = "Annunci salvati - Jomp";
head($title);

echo "<body>";

headers();

$page = "Annunci salvati";
breadcrumb($page);

menu($page);

# -------------------------------------------

adsSalved(); // da fare

if(isset($_SESSION['login'])){
    
    $user = $_SESSION['login'];
    
    
    
    
    
    
    
    
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