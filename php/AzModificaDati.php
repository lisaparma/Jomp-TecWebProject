<?php

require("structure.php");
require("functionAzienda.php");

$title="Jomp - Modifica dati";
head($title);

echo "<body>";

headers();

$page="Modifica dati";
breadcrumb($page);

menu($page);

modificaDati(); // da fare

footer();
 
echo "</body> \n </html>";

?>