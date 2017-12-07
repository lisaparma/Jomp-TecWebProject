<?php


require("structure.php");
require("functionHome.php");
require("functionDB.php");

$title="Jomp - Sign In ";
head($title);

echo "<body>";

headers();

menuHome();

//Mettere i tab index nei form e nei link
echo "<form method='post' action='signin.php'> <!-- i titoletti vanno in label-->
        
        Come vuoi registrarti? <br />
        <input type='radio' id='azienda' name='tiporegistrazione' value='azienda' checked> <label for='azienda'>Azienda</label>
        <input type='radio' id='utente' name='tiporegistrazione' value='utente'> <label for='utente'> Utente</label> <br/>

        <label for='nome'> Nome: </label> <br/>
        <input type='text' id='nome' name='Nome' placeholder='Nome'> <br /> <!-- placeholder non esiste in xhtml -->
        
        <label for='cognome'> Cognome </label> <br/>
        <input type='text' id='cognome' name='Cognome' placeholder='Cognome'> <br />
        
        <label for='email'> E-mail: </label> <br/>
        <input type='text' id='email' name='Email' placeholder='Email'> <br />        
        
        <label for='username'> Username: </label> <br/>
        <input type='text' id='username' name='Username' placeholder='Username'> <br />
        
        <label for='password'> Password </label> <br/>
        <input type='text' id='password' name='Password' placeholder='Password'> <br />

        <label for='rippw'> Ripeti password </label> <br/>
        <input type='text' id='rippw' name='RipPassword' placeholder='Password'> <br />
        <br />

        <input type='submit' value='Registrati' name='submit'>
        
        
    </form>";


if(isset($_POST["submit"])){
    try {

        $db=openDB();
        
        $Username=$_POST["Username"];
        $Password=$_POST["Password"];
        $RipPassword=$_POST["RipPassword"];
        $Nome=$_POST["Nome"];
        $Cognome=$_POST["Cognome"];
        $Email=$_POST["Email"];

        //verifico i dati inseriti
        if ($Username || $Password || $RipPassword|| $Nome || $Cognome || $Email) {

            if($Password===$RipPassword) {

                $sql = "INSERT INTO Utenti(Username, Password, Nome, Cognome, Email) VALUES('$Username', '$Password', '$Nome', '$Cognome', '$Email')";

                if($db->query($sql)) {
                    header("location: UtDashboard.php");
                }
                else{
                    echo"<script type= 'text/javascript'>alert('Dati non inseriti cotterramente.');</script>";
                }
            }
            else {
                echo "<script type= 'text/javascript'>alert('La password scelta deve essere uguale in entrambi i campi');</script>";
            }
         }
         else {
            echo "<script type= 'text/javascript'>alert('Inserisci tutti i dati per continuare la registrazione');</script>";
        }

        closeDB($db);

    } catch (PDOException $e) {
        echo "Errore: " . $e->getMessage();
        die();
    }

}


footer();
 
echo "</body> \n </html>";
?>