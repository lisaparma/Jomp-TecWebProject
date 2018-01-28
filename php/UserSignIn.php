<?php

require_once("structure.php");
require_once("functionHome.php");
require_once("connect.php");

$title = "Registrazione Utente - Jomp";
head($title);


headers();

$page='Registrazione utente';
breadcrumb(array($page));

function checkEmail($email) {

    $result = mysqli_query(openDB(),"SELECT Email FROM Utenti WHERE Email='".$email."'");     //creo la query
    
    $num_rows = mysqli_num_rows($result);                                      //invio la query


    if($num_rows == 0) {             //resultato non vuoto: email già esistente
        return true;
    }
    return false;
}

function checkUsername($username) {

    $result = mysqli_query(openDB(),"SELECT Username FROM Utenti WHERE Username='".$username."'");

    $num_rows = mysqli_num_rows($result);

    if($num_rows == 0) {
        return true;
    }
    return false;
}

function checkRepeatPassword($password, $ripPassword) {
    if($password == $ripPassword) {
        return true;
    }
    return false;
}

if(isset($_POST['submit'])){
    try {

        $db = openDB();
        $username = $_POST['Username'];
        $password = $_POST['Password'];
        $ripPassword = $_POST['RipPassword'];
        $nome = $_POST['Nome'];
        $cognome = $_POST['Cognome'];
        $email = $_POST['Email'];

        //verifico i dati inseriti
        if(checkEmail($email) && checkUsername($username) && checkRepeatPassword($password, $ripPassword)) {
            $sql = "INSERT INTO Utenti(Username, Password, Nome, Cognome, Email) VALUES ('$Username', '$Password', '$Nome', '$Cognome', '$Email')";

            $db -> query($sql);
            header("location: login.php?msg");

        }
        else {
            echo "<div><p class='errorMsg'>Tentativo di registrazione fallito, sono sorti i seguenti errori:</p><br/>";
            echo "<ul id=errorList>";
            if(!checkEmail($email)) {
                echo "<li>Email già presente, controlla di non essere già registrato</li><br/>";
            }

            if(!checkUsername($username)) {
                echo "<li>Username non disponibile, sceglierne un altro</li><br/>";
            }

            if(!checkLengthUsername($username)) {
                echo "<li>Username troppo corto o troppo lungo</li><br/>";
            }

            if(!checkLenghtPassword($password)) {
                echo "<li>Password troppo corta</li><br/>"; 
            }

            if(!checkRepeatPassword($password, $ripPassword)) {
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

echo "<div id='intro'>
    <h2>Regole per l'iscrizione:</h2>
        <ol>
            <li>Tutti i campi devono essere <strong>OBBLIGATORIAMENTE</strong> compilati;</li>
            <li>L'email personale deve essere univoca;</li>
            <li>L'username deve contenere dai 5 ai 15 caratteri;</li>
            <li>La password deve essere lunga almeno 8 caratteri;</li>
            <li>E' necessario ripetere la stessa esatta sequenza di caratteri della password dove viene richiesto di ripeterla.</li>
        </ol>
    </div>";

//Mettere i tab index nei form e nei link
echo "<div class='form'>
        <h1>Sign Up Now!</h1>
        <form method='post' action='UserSignIn.php'> 
            <div class='inner-wrap'>
                <label for='nome'> Nome: </label>
                <input type='text' id='nome' name='Nome' placeholder='Nome'required>

                <label for='cognome'> Cognome </label>
                <input type='text' id='cognome' name='Cognome' placeholder='Cognome' required>

                <label for='date'> Data di nascita: </label>
                <input type='date' id='date' required>

                <label for='email'> E-mail: </label>
                <input type='text' id='email' name='Email' placeholder='Email' pattern='[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$' required>       
                <label for='username'> Username: </label>
                <input type='text' id='username' name='Username' placeholder='Username' required>

                <label for='password'> Password: </label>
                <input type='password' id='password' name='Password' placeholder='Password' required>

                <label for='rippw'> Ripeti password: </label>
                <input type='password' id='rippw' name='RipPassword' placeholder='Password' required>

            </div>

            <input type='submit' value='Registrati' name='submit'>

        </form>
    </div>";


footer();
 
echo "</body> \n </html>";
?>