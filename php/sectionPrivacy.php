<?php


require_once("structure.php");
require_once("functionHome.php");
require_once("connect.php");
require_once("classUtente.php");
require_once("classAzienda.php");
require_once("classAdmin.php");
session_start();

$title = "Privacy - Jomp";
$desc = "Pagina di spiegazione delle politiche di privacy nel sito Jomp.";
head($title, $desc);


headers();


$page='Privacy';
breadcrumb(array($page));

echo "<div id='intro'>
	<h2>Privacy</h2>
	<p><strong>Jomp</strong> ha adottato Procedure e Policy aziendali in linea con il Regolamento generale dell'Unione europea sulla protezione dei dati (GDPR – Reg Ue 2016/679), al fine di garantire alti standard di sicurezza e regole volte a consentire un adeguato trattamento dei Dati Personali.</p>

	<p>I Dati sono trattati da risorse interne ed esterne agli uffici delle Società del Gruppo, adeguatamente identificate, istruite e che operano in qualità di personale autorizzato al trattamento dei Dati.</p>

	<p>Jomp non condivide le informazioni di contatto dell'utente con terzi a scopo di marketing diretto da parte di questi ultimi. I dati sono disponibili per il tempo strettamente necessario per le finalità del trattamento.</p>
	</div>";



footer();
 
echo "</body> \n </html>";
?>