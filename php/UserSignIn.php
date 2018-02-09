<?php

require_once("structure.php");
require_once("functionHome.php");
require_once("connect.php");
require_once("functionUtente.php");

$title = "Registrazione Utente - Jomp";
head($title);


headers();

$page='Registrazione utente';
breadcrumb(array($page));

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

if(isset($_POST['submit'])){
    try {
        $db = openDB();
        $username = $_POST['Username'];
        $password = $_POST['Password'];
        $ripPassword = $_POST['RipPassword'];
        $nome = $_POST['Nome'];
        $cognome = $_POST['Cognome'];
        $email = $_POST['Email'];
        $sex = $_POST['button'];
        $data = $_POST['Data'];

        if($sex==='m') 
            $check1='checked';
        else 
            $check2='checked';

        //verifico i dati inseriti
        if(checkEmail($email) && checkUsername($username) && checkRepeatPassword($password, $ripPassword)) {
            $sql = "INSERT INTO Utenti(Username, Password, Nome, Cognome, Email, Nascita, Sesso) VALUES ('$username', '$password', '$nome', '$cognome', '$email', '$data', $sex')";
            $db -> query($sql);
            header("location: login.php");

        }
        else {
            echo "<div><p class='errorMsg'>Tentativo di registrazione fallito, sono sorti i seguenti errori:</p>";
            echo "<ul id=errorList>";
            if(!checkEmail($email)) {
                echo "<li>Email già presente, controlla di non essere già registrato</li>";
            }

            if(!checkUsername($username)) {
                echo "<li>Username non disponibile, sceglierne un altro</li>";
            }

            if(!checkLengthUsername($username)) {
                echo "<li>Username troppo corto o troppo lungo</li>";
            }

            if(!checkLengthPassword($password)) {
                echo "<li>Password troppo corta</li>"; 
            }

            if(!checkRepeatPassword($password, $ripPassword)) {
                echo "<li>La password di verifica non corrisponde alla password scelta</li>";
            }
            echo "</ul></div>";

        }

        closeDB($db);


    } catch (Exception $e) {
        echo "Errore: " . $e->getMessage();
        die();
    }

}

if(!isset($_POST['submit'])) {
    $username = "";
    $password = "";
    $ripPassword = "";
    $nome = "";
    $cognome = "";
    $email = "";
    $data = "";
    $check1='';
    $check2='';
}

//Mettere i tab index nei form e nei link
echo "<div class='form'>
        <h1>Registrati subito!</h1>
        <form name='formSign' method='post' action='UserSignIn.php' onsubmit='return validateForm()'> 
            <div id='listImp' class='inner-wrap'>
                <label for='nome'> Nome: </label> 
                <input type='text' id='nome' name='Nome' placeholder='Nome' value='$nome' tabindex='10' onBlur='checkName();'>

                <label for='cognome'> Cognome </label>
                <input type='text' id='cognome' name='Cognome' placeholder='Cognome' value='$cognome' tabindex='11' onBlur='checkSurname();'>

                <div class='radio'>
                <label> Sesso: </label>
                    <input type='radio' id='uomo' name='button' value='m' $check1> <label id='man' for='uomo'> Uomo </label>
                    <input type='radio' id='donna' name='button' value='f' $check2> <label id='woman' for='donna'> Donna</label>
                </div>

                <label for='date'> Data di nascita: </label>
                <input type='date' name='Data' id='date' placeholder='AAAA-MM-GG' value='$data' tabindex='12' onBlur='checkDate();'>

                <label for='email'> E-mail: </label>
                <input type='text' id='email' name='Email' placeholder='Email' value='$email' tabindex='13' onBlur='checkEmail();'>   
                    
                <label for='username'> Username: </label>
                <input type='text' id='username' name='Username' placeholder='Username' value='$username' tabindex='13' onBlur='checkUsername();'>

                <label for='password'> Password: </label>
                <input type='password' id='password' name='Password' placeholder='Password' tabindex='14' onBlur='checkPassword();'>

                <label for='rippw'> Ripeti password: </label>
                <input type='password' id='rippw' name='RipPassword' placeholder='Password' tabindex='15' onBlur='checkRipPassword();'>

            </div>

            <input type='submit' value='Registrati' name='submit'>

        </form>
    </div>";


footer();
 
echo "</body> \n </html>";
?>