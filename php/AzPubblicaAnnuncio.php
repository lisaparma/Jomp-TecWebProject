<?php

require("structure.php");
require("functionAzienda.php");
require("connect.php");


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