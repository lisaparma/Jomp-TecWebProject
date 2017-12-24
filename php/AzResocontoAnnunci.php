<?php

require_once("structure.php");
require_once("functionAzienda.php");
require_once("connect.php");

session_start();

$title = "Resoconto annunci - Jomp";
head($title);

echo "<body>";

headers();

$page = "Resoconto annunci";
breadcrumb($page);

menu($page);

adsList('all');


footer();
 
echo "</body> \n </html>";

?>