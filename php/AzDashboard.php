<?php

require_once("structure.php");
require_once("functionAzienda.php");
require_once("connect.php");
require_once("classAzienda.php");

session_start();

$title = "Dashboard Azienda - Jomp";
head($title);


headers();

$page = "Dashboard";
breadcrumb(array('Area Personale', $page));

menu($page);

# ------------------------------------------------------

$company = &$_SESSION['login'];
echo"<div id='contenuto'>";
echo "<h3>Buongiorno ".$company->getName()."!</h3> 
		<p>Ecco un riassunto delle sue attività:</p>
		<p><strong>Data iscrizione: </strong>".$company->getDateEntry().";</p>
		<p><strong>Numero totale di annunci inseriti: </strong>".$company->getAdsNumber().";</p>
		<p><strong>Data ultimo annuncio inserito: </strong>".$company->getDateLastAd().";</p>
		<p><strong>Numero di utenti che sono interessati ai tuoi annunci: </strong>".$company->getFollowedAdsNumber().";</p> ";


# ------------------------------------------------------

echo"</div>";
footer();
 
echo "</body> \n </html>";

?>