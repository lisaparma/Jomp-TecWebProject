<?php

require("structure.php");
require("functionAzienda.php");

$title="Jomp - Dashboard Azienda";
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