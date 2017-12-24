<?php

require_once("structure.php");
require_once("functionAzienda.php");
require_once("connect.php");


$title = "Pubblica Annuncio - Jomp";

session_start();

head($title);

echo "<body>";

headers();

$page = "Pubblica annuncio";
breadcrumb($page);

menu($page);


addAds();


footer();
 
echo "</body> \n </html>";

?>