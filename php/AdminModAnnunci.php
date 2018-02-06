<?php

require_once("structure.php");
require_once("connect.php");
require_once("classAdmin.php");
require_once("functionAdmin.php");

session_start();

$title = "Sezione Annunci - Jomp";
head($title);


headers();

$page = "Sezione Annunci";
breadcrumb(array('Area Personale', $page));

menu($page);

# ------------------------------------------------------



# ------------------------------------------------------

echo"</div>";
footer();
 
echo "</body> \n </html>";

?>