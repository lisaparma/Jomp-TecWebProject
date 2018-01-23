<?php


require_once("structure.php");
require_once("functionHome.php");
require_once("connect.php");
require_once("classUtente.php");
require_once("classAzienda.php");
session_start();

$title = "Chi siamo - Jomp";
head($title);

echo "<body>";

headers();

$page='Chi siamo';
breadcrumb(array($page));

echo "<div id='section'>
		<h2>Perchè iscriversi?</h2>
			<strong>Se sei un'azienda..</strong><br/>
				<p>Hai la possibilità di diffondere più velocemente e con una maggiore visibilità i tuoi annunci,ma soprattutto di trovare il personale di cui hai bisogno senza intermediari. <em>Jomp</em> ti permettere di pubblicare un numero illimitato di annunci gestendoli autonomamente: puoi modificarli o eliminarli in qualsiasi momento tu voglia. Inoltre, se dovessi modificare i tuoi dati, basta andare nell'apposita sezione e aggiornarli. Niente di più semplice!</p>
			<strong>Se sei un utente..</strong><br/>
				<p>Non c'è niente di più stressante di dover controllare in più posti diversi o recarti in diverse agenzie di lavoro per cercare un'occupazione? Ecco la soluzione: <strong>Jomp</strong>! Grazie a <em>Jomp</em> potrai consultare una notevole quantità di annunci filtrandoli attraverso la barra di ricerca che trovi nella home. Inoltre, se ti registri, potrai creare una sezione di annunci preferiti per tenerla sempre a portata di mano. Allora, cosa aspetti? Molti utenti hanno già trovato il lavoro dei loro sogni, salta anche tu in <em>Jomp</em>!
		<p>
	</div>";



footer();
 
echo "</body> \n </html>";
?>