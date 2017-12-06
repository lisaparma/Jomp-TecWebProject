<?php


require("structure.php");
require("functionHome.php");

$title="Jomp - Sign In ";
head($title);

echo "<body>";

headers();

menuHome();

echo "<form method='post' action='signin.php'> <!-- i titoletti vanno in label-->
        Nome: <br />
        <input type='text' name='Nome' placeholder='Nome'> <br /> <!-- placeholder non esiste in xhtml -->
        
        Cognome: <br />
        <input type='text' name='Cognome' placeholder='Cognome'> <br />
        
        Email: <br />
        <input type='text' name='Email' placeholder='Email'> <br />        
        
        Username: <br />
        <input type='text' name='Username' placeholder='Username'> <br />
        
        Password: <br />
        <input type='text' name='Password' placeholder='Password'> <br />
        <br />

        Ripeti password: <br />
        <input type='text' name='RipPassword' placeholder='Password'> <br />
        <br />

        <input type='submit' value='Registrati' name='submit'>
        
        
    </form>";


if(isset($_POST["submit"])){
    try {
        $hostname = "localhost";
        $dbname = "tecweb";
        $user = "root";
        $pass = "";
        $db = new PDO ("mysql:host=$hostname;dbname=$dbname", $user, $pass);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
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

        //chiudo il database
        $db = null;

    } catch (PDOException $e) {
        echo "Errore: " . $e->getMessage();
        die();
    }

}


footer();
 
echo "</body> \n </html>";
?>