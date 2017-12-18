<?php

require("structure.php");
require("functionUtente.php");
require("connect.php");

session_start();

$title = "Annunci salvati - Jomp";
head($title);

echo "<body>";

headers();

$page = "Annunci salvati";
breadcrumb($page);

menu($page);

adsSalved(); // da fare

footer();
 
echo "</body> \n </html>";

?>