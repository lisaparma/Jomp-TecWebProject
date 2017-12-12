<?php

require("structure.php");
require("functionUtente.php");

$title="Jomp - Annunci salvati";
head($title);

echo "<body>";

loggerHeaders();

$page="Annunci salvati";
breadcrumb($page);

menu($page);

annunciSalvati(); // da fare

footer();
 
echo "</body> \n </html>";

?>