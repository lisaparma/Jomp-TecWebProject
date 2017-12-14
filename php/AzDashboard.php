<?php

require("structure.php");
require("functionAzienda.php");
require("connect.php");

session_start();

$title = "Dashboard Azienda - Jomp";
head($title);

echo "<body>";

headers();

$page = "Dashboard";
breadcrumb($page);

menu($page);

adsList('lastAdded');

footer();
 
echo "</body> \n </html>";

?>