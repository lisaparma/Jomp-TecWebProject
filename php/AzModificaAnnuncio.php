<?php

require_once("structure.php");
require_once("functionAzienda.php");
require_once("connect.php");

session_start();


$title = "Modifica annuncio - Jomp";
head($title);

echo "<body>";

headers();

$page = "Modifica annuncio";
breadcrumb($page);

menu($page);


editAd();

footer();
 
echo "</body> \n </html>";

?>