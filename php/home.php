<?php


require("structure.php");
require("functionHome.php");
require("connect.php");

$title = "Home - Jomp";
head($title);

echo "<body>";

headers();

menuHome();

if(search()) {
    lastAds();
}

footer();
 
echo "</body> \n </html>";
?>