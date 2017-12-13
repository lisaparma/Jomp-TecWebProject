<?php

require("structure.php");
require("functionAzienda.php");

session_start();

$title="Jomp - Resoconto annunci";
head($title);

echo "<body>";

headers();

$page="Resoconto annunci";
breadcrumb($page);

menu($page);

resoconto(); // da fare

footer();
 
echo "</body> \n </html>";

?>