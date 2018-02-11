<?php


require_once("structure.php");
require_once("functionHome.php");
require_once("connect.php");
require_once("classUtente.php");
require_once("classAzienda.php");
require_once("classAdmin.php");

session_start();

$title = "Termini e condizioni - Jomp";
$desc = "Pagina di spiegazione dei termini e delle condizioni del sito Jomp.";
head($title, $desc);


headers();


$page='Termini e condizioni';
breadcrumb(array($page));

echo "<div id='intro'>
	<h2>Termini e condizioni</h2>
	<p><strong>Le Condizioni d'Uso costituiscono un accordo vincolante tra l'Utente e Jomp e sono da considerarsi accettate da parte dell'Utente ogniqualvolta questi acceda o utilizzi il Sito Jomp. Se l'Utente non accetta le Condizioni d'Uso stabilite, non può utilizzare i Servizi Jomp.</strong></p>

	<p>I servizi Jomp includono servizi online per la pubblicazione e la ricerca di opportunità di impiego.</p>

    <p>Jomp si riserva la facoltà di modificare le Condizioni d'Uso in qualsiasi momento, pubblicandone una versione aggiornata su questa pagina Web. Si pregano gli Utenti di visitare periodicamente questa pagina per esaminare gli aggiornamenti periodici delle Condizioni d'Uso, in quanto esse sono vincolanti per l'Utente.</p>
    
    <p><strong>Gli Utenti che violano le Condizioni d'Uso possono incorrere nella sospensione o nell'interruzione dell'accesso e dell'utilizzo del Sito, a discrezione esclusiva di Jomp.</strong></p>
	</div>";



footer();
 
echo "</body> \n </html>";
?>