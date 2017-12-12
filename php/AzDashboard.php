<?php

require("structure.php");
require("functionAzienda.php");

$title="Jomp - Dashboard Azienda";
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