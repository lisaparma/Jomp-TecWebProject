<?php

require("structure.php");
require("functionUtente.php");
require("connect.php");

session_start();

$title = "Cerca annuncio - Jomp";
head($title);

echo "<body>";

headers();

$page = "Cerca annuncio";
breadcrumb($page);

menu($page);

search(); // da fare

footer();
 
echo "</body> \n </html>";

?>