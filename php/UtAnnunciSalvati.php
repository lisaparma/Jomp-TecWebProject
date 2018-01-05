<?php

require_once("structure.php");
require_once("functionUtente.php");
require_once("connect.php");
require_once("classUtente.php");

session_start();

$title = "Annunci salvati - Jomp";
head($title);

echo "<body>";

headers();


# -------------------------------------------

if(isset($_SESSION['login'])){ // Solo se in sessione vedi questo 
    $page = "Annunci salvati";
    breadcrumb(array('Area Personale', $page));
    menu($page);
    
    $user = &$_SESSION['login'];
    
    // Quando clicco Salva su un annuncio
    if(isset($_POST['Salva'])){
        $ad=$_POST['Salva'];
        $query="INSERT INTO Consultazioni(Utente, CodAnnuncio) VALUES ('$user->getUsername()', '$ad')";
        mysqli_query(openDB(), $query);
    }

    // Quando clicco Salvato su un annuncio
    if(isset($_POST['Salvato'])){
        $ad=$_POST['Salvato'];
        $query="DELETE FROM Consultazioni WHERE CodAnnuncio='$ad' AND Utente='".$user->getUsername()."'";
        mysqli_query(openDB(), $query);
    }
    
    echo"<div id='contenuto'>
               <h3> Annunci salvati</h3>";
    
    $result = mysqli_query(openDB(), "SELECT Annunci.Codice, Annunci.Titolo, Annunci.Descrizione, Annunci.Tipologia, Annunci.Data, Annunci.Azienda, Aziende.Nome, Aziende.Email, Aziende.Citta, Tipo.Lavoro FROM Consultazioni JOIN Annunci ON Consultazioni.CodAnnuncio=Annunci.Codice JOIN Aziende ON Aziende.Nome=Annunci.Azienda JOIN Tipo ON Tipo.CodLavoro=Annunci.Tipologia WHERE Consultazioni.Utente='".$user->getUsername()."' ORDER BY Data");
    
    if($result->num_rows) {
        echo "<div id='listannunci'>
                    <ul id='annunci'>";
        printAd($result, $user->getUsername(), 'UtAnnunciSalvati.php');
        echo "  </ul>
            </div>" ;       
    }
    else 
        echo "Nessun annuncio salvato";

    echo" </div>" ;
    
}
else{
    echo " <div id='contenuto'>
	           <p>Sessione scaduta, procedere con la riutenticazione.</p>
	       </div>";
}

# -------------------------------------------

footer();
 
echo "</body> \n </html>";

?>