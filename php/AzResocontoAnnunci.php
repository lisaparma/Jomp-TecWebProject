<?php

require("structure.php");
require("functionAzienda.php");

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