<?php

require("structure.php");
require("functionAzienda.php");

$title="Jomp - Pubblica annuncio";
head($title);

echo "<body>";

headers();

$page="Pubblica annuncio";
breadcrumb($page);

menu($page);

pubblicaAnnuncio(); // da fare

footer();
 
echo "</body> \n </html>";

?>