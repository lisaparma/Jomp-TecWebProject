<?php

require("structure.php");
require("functionUtente.php");

$title="Jomp - Cerca annuncio";
head($title);

echo "<body>";

loggerHeaders();

$page="Cerca annuncio";
breadcrumb($page);

menu($page);

cerca(); // da fare

footer();
 
echo "</body> \n </html>";

?>