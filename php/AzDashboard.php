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
echo "<p>Gentile ".$company->getName().", ecco un riassunto delle sue attività:</p>
		<p>Data iscrizione: ".$company->getDateEntry().";</p>
		<p>Numero totale di annunci inseriti: ".$company->getAdsNumber().";</p>
		<p>Data ultimo annuncio inserito: ".$company->getDateLastAd().";</p>
		<p>Numero di utenti che sono interessati ai tuoi annunci: ".$company->getFollowedAdsNumber().";</p> ";


# ------------------------------------------------------

echo"</div>";
footer();
 
echo "</body> \n </html>";

?>