<?php

require("structure.php");
require("functionHome.php");
require("connect.php");

$title="Jomp - Registrazione Utente";
head($title);

echo "<body>";

headers();

menuHome();


function checkEmail($Email) {

    $result = mysqli_query(openDB(),"SELECT Email FROM Utenti WHERE Email='".$Email."'");     //creo la query
    
    $num_rows = mysqli_num_rows($result);                                      //invio la query


    if($num_rows == 0) {             //resultato non vuoto: email già esistente
        return true;
    }
    return false;
}

function checkUsername($Username) {

    $result = mysqli_query(openDB(),"SELECT Username FROM Utenti WHERE Username='".$Username."'");

    $num_rows = mysqli_num_rows($result);

    if($num_rows == 0) {
        return true;
    }
    return false;
}

function checkRepeatPassword($Password, $RipPassword) {
    if($Password == $RipPassword) {
        return true;
    }
    return false;
}

//Mettere i tab index nei form e nei link
echo "<div id=form>
        <div id=contentForm>
            <form method='post' action='UserSignIn.php'> 

                <label for='nome'> Nome: </label><br/>
                <input type='text' id='nome' name='Nome' placeholder='Nome'required><br/> 
                
                <label for='cognome'> Cognome </label><br/>
                <input type='text' id='cognome' name='Cognome' placeholder='Cognome' required><br/>
                
                <label for='email'> E-mail: </label><br/>
                <input type='text' id='email' name='Email' placeholder='Email' pattern='[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$' required><br/>        
                
                <label for='username'> Username: </label><br/>
                <input type='text' id='username' name='Username' placeholder='Username' required><br/>
                
                <label for='password'> Password: </label><br/>
                <input type='password' id='password' name='Password' placeholder='Password' required><br/>

                <label for='rippw'> Ripeti password: </label><br/>
                <input type='password' id='rippw' name='RipPassword' placeholder='Password' required><br/>
                <br/>

                <input type='submit' value='Registrati' name='submit'>

            </form>
        </div>
    </div>";


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
        if(checkEmail($Email) && checkUsername($Username) && checkRepeatPassword($Password, $RipPassword)) {
            $sql = "INSERT INTO Utenti(Username, Password, Nome, Cognome, Email) VALUES('$Username', '$Password', '$Nome', '$Cognome', '$Email')";

            $db->query($sql);
            header("location: login.php");

        }
        else {
            echo "<div id=errorList><p>Tentativo di registrazione fallito, sono sorti i seguenti errori: </p><br/>";
            echo "<ul>";
            if(!checkEmail($Email)) {
                echo "<li>Email già presente, controlla di non essere già registrato</li><br/>";
            }

            if(!checkUsername($Username)) {
                echo "<li>Username non disponibile, sceglierne un altro</li><br/>";
            }

            if(!checkRepeatPassword($Password, $RipPassword)) {
                echo "<li>La password di verifica non corrisponde alla password scelta</li><br/>";
            }
            echo "</ul></div>";

        }

        closeDB($db);


    } catch (Exception $e) {
        echo "Errore: " . $e->getMessage();
        die();
    }

}

footer();
 
echo "</body> \n </html>";
?>