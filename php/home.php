<?php


require("structure.php");
require("functionHome.php");

$title="Jomp - Home ";
head($title);

echo "<body>";

headers();

menuHome();

ricerca();

ultimiAnnunci();

footer();
 
echo "</body> \n </html>";
?>