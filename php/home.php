<?php


require_once("structure.php");
require_once("functionHome.php");
require_once("connect.php");
session_start();

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