<?php

require("structure.php");
require("functionAzienda.php");

session_start();

$title="Jomp - Modifica dati";
head($title);

echo "<body>";

headers();

$page="Modifica dati";
breadcrumb($page);

menu($page);

editData(); // da fare

footer();
 
echo "</body> \n </html>";

?>