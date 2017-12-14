<?php

require("structure.php");
require("functionUtente.php");

session_start();

$title = "Modifica dati - Jomp";
head($title);

echo "<body>";

headers();

$page = "Modifica dati";
breadcrumb($page);

menu($page);

editData(); // da fare

footer();
 
echo "</body> \n </html>";

?>