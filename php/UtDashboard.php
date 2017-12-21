<?php

require("structure.php");
require("functionUtente.php");
require("connect.php");

session_start();

$title = "Dashboard Utente - Jomp";
head($title);

echo "<body>";

headers();

$page = "Dashboard";
breadcrumb($page);

menu($page);

recap(); // da fare

footer();
 
echo "</body> \n </html>";

?>