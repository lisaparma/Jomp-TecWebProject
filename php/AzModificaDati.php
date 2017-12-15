<?php

require("structure.php");
require("functionAzienda.php");
require("connect.php");

session_start();

$title="Jomp - Modifica dati";
head($title);

echo "<body>";

headers();

$page="Modifica dati";
breadcrumb($page);

menu($page);

editCompanyData(); 

footer();
 
echo "</body> \n </html>";

?>