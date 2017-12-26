<?php

require_once("structure.php");
require_once("functionAzienda.php");
require_once("connect.php");

session_start();

$title = "Dashboard Azienda - Jomp";
head($title);

echo "<body>";

headers();

$page = "Dashboard";
breadcrumb($page);

menu($page);

//SadsList('lastAdded');

footer();
 
echo "</body> \n </html>";

?>