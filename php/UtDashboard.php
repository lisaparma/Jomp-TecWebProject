<?php

require("structure.php");
require("functionUtente.php");

$title="Jomp - Dashboard Utente";
head($title);

echo "<body>";

headers();

$page="Dashboard";
breadcrumb($page);

menu($page);

recap(); // da fare

footer();
 
echo "</body> \n </html>";

?>