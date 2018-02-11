<?php

require_once("structure.php");
require_once("functionHome.php");
require_once("functionUtente.php");
require_once("connect.php");
require_once("classUtente.php");

session_start();

$title = "Cerca annuncio - Jomp";
$desc = "Visualizza tutti gli annunci pubblicati dalle aziende e filtrale in base ai tuoi interessi.";
head($title, $desc);

headers();

$page = "Cerca annuncio";
breadcrumb(array('Area Personale', $page));
menu($page);


# -------------------------------------------

if(isset($_SESSION['login'])){ // Solo se in sessione vedi questo 
    
    $user = &$_SESSION['login'];
    
    echo"<div id='contenuto'>";
    
    searchForm("UtCercaAnnuncio.php");
    
    // Quando clicco Salva su un annuncio
    if(isset($_POST['Salva'])){
        $ad=$_POST['Salva'];
        $query="INSERT INTO Consultazioni(Utente, CodAnnuncio) VALUES ('".$user->getUsername()."', '$ad')";
        mysqli_query(openDB(), $query);
    }
        
    // Quando clicco Salvato su un annuncio
    if(isset($_POST['Salvato'])){
        $ad=$_POST['Salvato'];
        $query="DELETE FROM Consultazioni WHERE CodAnnuncio='$ad' AND Utente='".$user->getUsername()."'";
        mysqli_query(openDB(), $query);
    }
        
    // Se clicco su CERCA
    if(isset($_POST['cerca'])) {
        $title = $_POST['Title'];
        $city=$_POST['City'];
        $type=$_POST['Type'];
        $plus1="";
        $plus2="";

        if($city)
            $plus1=" AND Aziende.Citta='$city'";
        if($type!='all')
            $plus2=" AND Annunci.Tipologia='$type'";

        $result = mysqli_query(openDB(), "SELECT Annunci.Codice, Annunci.Titolo, Annunci.Descrizione, Annunci.Tipologia, Annunci.Orario, Annunci.Contratto, Annunci.Data, Annunci.Azienda, Aziende.Nome, Aziende.Email, Aziende.Citta, Tipo.Lavoro, ContrattoLavoro.TipoContratto, OrarioLavoro.TipoOrario  FROM Annunci JOIN Aziende ON Aziende.Nome=Annunci.Azienda JOIN Tipo ON Tipo.CodLavoro=Annunci.Tipologia JOIN OrarioLavoro ON OrarioLavoro.CodOrario=Annunci.Orario JOIN ContrattoLavoro ON ContrattoLavoro.CodContratto=Annunci.Contratto WHERE Annunci.Descrizione LIKE '%$title%' $plus1 $plus2 ORDER BY Data DESC");    
    }
    else {
        $result = mysqli_query(openDB(), "SELECT Annunci.Codice, Annunci.Titolo, Annunci.Descrizione, Annunci.Tipologia, Annunci.Data, Annunci.Azienda, Aziende.Nome, Aziende.Email, Aziende.Citta, Tipo.Lavoro, ContrattoLavoro.TipoContratto, OrarioLavoro.TipoOrario FROM Annunci JOIN Aziende ON Aziende.Nome=Annunci.Azienda JOIN Tipo ON Tipo.CodLavoro=Annunci.Tipologia JOIN OrarioLavoro ON OrarioLavoro.CodOrario=Annunci.Orario JOIN ContrattoLavoro ON ContrattoLavoro.CodContratto=Annunci.Contratto ORDER BY Data DESC LIMIT 5");
    }
    echo" </div>" ; //div contenuto
    
    // Stampa gli annunci trovati
    if($result->num_rows) {
        echo "<div id='listannunci'>
                <p>Annunci:</p>
                    <ul id='annunci'>";
                    printAd($result, $user->getUsername(), 'UtCercaAnnuncio.php');
        echo "      </ul>
                </div>" ;       
    }
    else
        echo "<div class='NoData'> Nessun annuncio corrispondente a questi parametri</div>";


}
else{
    echo " <div id='contenuto'>
               <div class='errorMsg'>Sessione scaduta, procedere con la riutenticazione.</div>
           </div>";
}


# -------------------------------------------

footer();
 
echo "</body> \n </html>";

?>