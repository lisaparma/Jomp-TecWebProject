<?php
session_start();
require("structure.php");
require("functionUtente.php");

$title="Jomp - Dashboard Utente";
head($title);

echo "<body>";

loggerHeaders();

$page="Dashboard";
breadcrumb($page);

menu($page);

recap(); // da fare

footer();
 
echo "</body> \n </html>";

?>