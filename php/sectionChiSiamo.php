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

echo "<div id='section'><h2>Chi siamo</h2>
		<p><strong>Jomp</strong> è un sito di annunci gratuito e aperto a tutti. Tutte le aziende del territorio italiano
		che ricercano una figura da inserire all’interno della propria struttura possono inserire un
		annuncio specificato tipologia e descrizione dell’incarico che dovrà svolgere il lavoratore.
		Con Jomp puoi trovare facilmente il lavoro che desideri. Cosa aspetti? Vieni a fare un salto
		in questo mare di lavori!</p><br/>

		<p>Jomp è nato nel novembre del 2017 e da allora lavoriamo per facilitare la condivisione e l’iterazione nelle nostre città. Ogni giorno moltissime persone trovano quello che cercano e approfittano delle opportunità che quotidianamente vengono pubblicate sul nostro sito.</p><br/>

		<p>Jomp è un servizio fornito da:<br/>
		<strong>SLS Group</strong><br/>
		Sede legale: Via Trieste 63, 35121 Padova (Italy)<br/>
		Contatti: sara.feltrin.2@studenti.unipd.it, lisa.parma@studenti.unipd.it, silvia.bazzeato@studenti.unipd.it</p></div>";



footer();
 
echo "</body> \n </html>";
?>