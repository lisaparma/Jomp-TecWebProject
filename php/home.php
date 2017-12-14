<?php


require("structure.php");
require("functionHome.php");

$title = "Home - Jomp";
head($title);

echo "<body>";

headers();

menuHome();

search();

lastAds();

footer();
 
echo "</body> \n </html>";
?>