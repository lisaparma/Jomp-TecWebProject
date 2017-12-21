<?php

require("structure.php");
require("functionUtente.php");
require("connect.php");

session_start();

$title = "Modifica dati - Jomp";
head($title);

echo "<body>";

headers();

$page = "Modifica dati";
breadcrumb($page);

menu($page);

editData();


footer();
 
echo "</body> \n </html>";

?>