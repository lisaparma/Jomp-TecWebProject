<?php

require("structure.php");
require("functionUtente.php");

session_start();

$title="Jomp - Annunci salvati";
head($title);

echo "<body>";

headers();

$page="Annunci salvati";
breadcrumb($page);

menu($page);

annunciSalvati(); // da fare

footer();
 
echo "</body> \n </html>";

?>