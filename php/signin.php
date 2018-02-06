<?php

require_once("structure.php");
require_once("functionHome.php");
require_once("connect.php");

$title="Sign In - Jomp";
head($title);

headers();

$page='Registrati';
breadcrumb(array($page));

if(isset($_POST['continue'])){
    try {

        $value = $_POST['button'];

        if($value == 'User') {
            header("location: UserSignIn.php");
        }
        else
            header("location: CompanySignIn.php");

    } catch (PDOException $e) {
        echo "Errore: " . $e->getMessage();
        die();
    }
}

echo "<div id='intro'>
        <h2>Perchè iscriversi?</h2>
            <strong>Se sei un'azienda..</strong>
            <p>Hai la possibilità di diffondere più velocemente e con una maggiore visibilità i tuoi annunci,ma soprattutto di trovare il personale di cui hai bisogno senza intermediari. <em>Jomp</em> ti permettere di pubblicare un numero illimitato di annunci gestendoli autonomamente: puoi modificarli o eliminarli in qualsiasi momento tu voglia. Inoltre, se dovessi modificare i tuoi dati, basta andare nell'apposita sezione e aggiornarli. Niente di più semplice!</p>

            <strong>Se sei un utente..</strong>
            <p>Non c'è niente di più stressante di dover controllare in più posti diversi o recarti in diverse agenzie di lavoro per cercare un'occupazione? Ecco la soluzione: <strong>Jomp</strong>! Grazie a <em>Jomp</em> potrai consultare una notevole quantità di annunci filtrandoli attraverso la barra di ricerca che trovi nella home. Inoltre, se ti registri, potrai creare una sezione di annunci preferiti per tenerla sempre a portata di mano. Allora, cosa aspetti? Molti utenti hanno già trovato il lavoro dei loro sogni, salta anche tu in <em>Jomp</em>!
        <p>
    </div>";

echo   "<div class='form'>
            <h1> Come vuoi registrarti? </h1>
            <form method='post' action='signin.php'> 
                <input type='radio' id='azienda' name='button' value='Company' checked> <label for='azienda'>Azienda</label>
                <input type='radio' id='utente' name='button' value='User'> <label for='utente'> Utente</label> <br/>
                <input type='submit' value='Continua' name='continue'>
            </form>
        </div>";


footer();
 
echo "</body> \n </html>";
?>







