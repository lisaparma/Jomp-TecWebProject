<?php


require("structure.php");
require("functionHome.php");
require("connect.php");

$title="Jomp - Sign In ";
head($title);

echo "<body>";

headers();

menuHome();

//Mettere i tab index nei form e nei link
echo "<div id=form>
        <div id=contentForm>
            <form method='post' action='signin.php'> 
            
                Come vuoi registrarti? <br />
                <input type='radio' id='azienda' name='tiporegistrazione' value='azienda' checked> <label for='azienda'>Azienda</label>
                <input type='radio' id='utente' name='tiporegistrazione' value='utente'> <label for='utente'> Utente</label> <br/>

                <label for='nome'> Nome: </label> <br/>
                <input type='text' id='nome' name='Nome' placeholder='Nome'required> <br /> 
                
                <label for='cognome'> Cognome </label> <br/>
                <input type='text' id='cognome' name='Cognome' placeholder='Cognome' required> <br />
                
                <label for='email'> E-mail: </label> <br/>
                <input type='text' id='email' name='Email' placeholder='Email' pattern='[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$' required> <br />        
                
                <label for='username'> Username: </label> <br/>
                <input type='text' id='username' name='Username' placeholder='Username' required> <br />
                
                <label for='password'> Password: </label> <br/>
                <input type='password' id='password' name='Password' placeholder='Password' required> <br />

                <label for='rippw'> Ripeti password: </label> <br/>
                <input type='password' id='rippw' name='RipPassword' placeholder='Password' required> <br />
                <br />

                <input type='submit' value='Registrati' name='submit'>

            </form>
        </div>
    </div>";
/*
function checkEmail($Email) {

    $query = "SELECT Email FROM Utenti WHERE Email='".$Email."'";     //creo la query

    $result = mysql_query(query);                                     //invio la query

    if($result != 0) {                                                 //resultato non vuoto: email già esistente
        echo "Email già inserita, controlla di non essere già registrato.";
        die();
    }
}

function checkUsername($Username) {

    $query = "SELECT Username FROM Utenti WHERE Username='".$Username"'";

    $result = mysql_query(query);

    if($result != 0) {
        echo "Username non disponibile.";
        die();
    }
}

function checkRepeatPassword($Password, $RipPassword) {

    if($Password != $RipPassword) {
        echo "La password scelta deve essere uguale in entrambi i campi";
    }
}*/


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
        closeDB($db);


    } catch (PDOException $e) {
        echo "Errore: " . $e->getMessage();
        die();
    }

}


footer();
 
echo "</body> \n </html>";
?>