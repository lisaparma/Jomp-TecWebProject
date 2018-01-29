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
echo "<h2>Buongiorno ".$company->getName()."!</h2> 
		
		<h4> Ricapitoliamo i suoi dati:</h4>
		<ul>
            <li> <strong> Partita Iva: </strong>".$company->getPIva()."</li> 
            <li><strong> E-mail: </strong>".$company->getEmail()." </li> 
            <li><strong> Sede: </strong>".$company->getCity()."</li> 
            <li><strong>Sito web: </strong><a href='".$company->getSito()."'>".$company->getSito()."</a></li>
        </ul>";
echo"
		<h4>Ecco un riassunto delle sue attività:</h4>
		<ul>
			<li>Data iscrizione: ".$company->getDateEntry().";</li>
			<li>Numero totale di annunci inseriti: ".$company->getAdsNumber().";</li>
			<li>Data ultimo annuncio inserito: ".$company->getDateLastAd().";</li>
			<li>Numero di utenti che sono interessati ai tuoi annunci: ".$company->getFollowedAdsNumber().";</li> 
		</ul>";


# ------------------------------------------------------

echo"</div>";
footer();
 
echo "</body> \n </html>";

?>