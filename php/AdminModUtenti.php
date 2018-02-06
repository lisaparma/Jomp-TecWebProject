<?php

require_once("structure.php");
require_once("connect.php");
require_once("classAdmin.php");
require_once("functionAdmin.php");

session_start();

$title = "Sezione Utenti- Jomp";
head($title);


headers();

$page = "Sezione Utenti";
breadcrumb(array('Area Personale', $page));

menu($page);

# ------------------------------------------------------




# ------------------------------------------------------

echo"</div>";
footer();
 
echo "</body> \n </html>";

?>