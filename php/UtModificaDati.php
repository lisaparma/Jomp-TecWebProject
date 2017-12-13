<?php

require("structure.php");
require("functionUtente.php");

session_start();

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