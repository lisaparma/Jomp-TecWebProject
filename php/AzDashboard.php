<?php

require_once("structure.php");
require_once("functionAzienda.php");
require_once("connect.php");
require_once("classAzienda.php");

session_start();

$title = "Dashboard Azienda - Jomp";
head($title);

echo "<body>";

headers();

$page = "Dashboard";
breadcrumb(array('Area Personale', $page));

menu($page);

# ------------------------------------------------------

$company = &$_SESSION['login'];
echo"<div id='contenuto'>";
echo "<p>Gentile ".$company->getName().", ecco un riassunto delle sue attività:</p><br/>
		<p>Data iscrizione: ".$company->getDateEntry().";<br/>
		<p>Numero totale di annunci inseriti: ".$company->getAdsNumber().";<br/>
		<p>Data ultimo annuncio inserito: ".$company->getDateLastAd().";<br/>
		<p>Numero di utenti che sono interessati ai tuoi annunci: ".$company->getFollowedAdsNumber().";<br/> ";


# ------------------------------------------------------

echo"</div></div>";
footer();
 
echo "</body> \n </html>";

?>