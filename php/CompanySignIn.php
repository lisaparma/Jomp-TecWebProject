<?php

require_once("structure.php");
require_once("functionHome.php");
require_once("connect.php");
require_once("functionAzienda.php");


$title = "Registrazione Azienda - Jomp";
head($title);

headers();

$page='Registrazione azienda';
breadcrumb(array($page));

echo "<div id='intro'>
    <h2>Regole per l'iscrizione:</h2>
        <ol>
            <li> Tutti i campi devono essere <strong>OBBLIGATORIAMENTE</strong> compilati;</li>
            <li> Il nome e l'email dell'azienda devono essere univoci;</li>
            <li> Vengono accettate solo aziende con sede legale in italia, ragion per cui la Partita Iva deve essere lunga 11 cifre;</li>
            <li> La password deve essere lunga almeno 8 caratteri;</li>
            <li> E' necessario ripetere la stessa esatta sequenza di caratteri della password dove viene richiesto di ripeterla.</li>
        </ol>
    </div>";

if(isset($_POST['submit'])){
    try {
        $name = $_POST['name'];
        $pIva = $_POST['pIva'];
        $email = $_POST['email'];
        $citta = $_POST['city'];
        $password = $_POST['password'];
        $repPassword = $_POST['repPassword'];
        $description = $_POST['description'];
        $sito = $_POST['sito'];

        //verifico i dati inseriti
        if(checkName($name) && checkPIva($pIva) && checkLengthPIva($pIva) && checkLengthPassword($password) && checkRepeatPassword($password, $repPassword) && checkEmail($email)) {
            $sql = "INSERT INTO Aziende (Nome, PIva, Email, Citta, Password, Descrizione, Sito) VALUES ('$name', '$pIva', '$email', '$citta', '$password', '$description', '$sito')";

            if (mysqli_query(openDB(), $sql)) {
                header("location: login.php?msg");
            } 
            else {
                echo "<div class='errorMsg'>Errore nell'inserire i dati nel database. Riprova.</div>";
            }

        }
        else {
            echo "<div><p class='errorMsg'>Tentativo di registrazione fallito, sono sorti i seguenti errori:</p><br/>";
            echo "<ul id='errorList'>";
            if(!checkName($name)) {
                echo "<li>Azienda già presente, controlla di non essere già registrato</li><br/>";
            }

            if(!checkEmail($email)) {
                echo "<li>E-mail già presente, controlla di non essere già registrato</li><br/>";
            }

            if(!checkPIva($pIva)) {
                echo "<li>Partita IVA già presente, controlla di non essere già registrato o di avere inserito corretamente la sequenza di cifre</li><br/>";
            }

            if(!checkLengthPIva($pIva)) {
                echo "<li>Partita IVA non valida</li><br/>";    
            }

            if(!checkLengthPassword($password)) {
                echo "<li>Password troppo corta</li><br/>";   
            }

            if(!checkRepeatPassword($password, $repPassword)) {
                echo "<li>La password di verifica non corrisponde alla password scelta</li><br/>";
            }
            echo "</ul></div>";

        }

    } catch (PDOException $e) {
        echo "Errore: " . $e->getMessage();
        die();
    }
}

if(!isset($_POST['submit'])) {
    $name = "";
    $pIva = "";
    $email = "";
    $citta = "";
    $password = "";
    $repPassword = "";
    $description = "";
    $sito = "";
}

echo "<div class='form'>
        <h1>Registrati subito!</h1>
        <form method='post' action='CompanySignIn.php' onsubmit='return validateFormCompany()'> 
            <div id='listImp' class='inner-wrap'>
                <label for='nome'> Nome: </label>
                <input type='text' id='nome' name='name' placeholder='Nome' value='$name' tabindex='10' onBlur='checkName();'>

                <label for='pIva'> Partita IVA: </label>
                <input type='text' id='pIva' name='pIva' placeholder='Partita Iva' value='$pIva' tabindex='11' onBlur='checkPiva();'>

                <label for='email'> E-mail: </label>
                <input type='text' id='email' name='email' placeholder='Email' tabindex='12' value='$email' pattern='[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$'  onBlur='checkEmail();'>

                <label for='sito'> Sito web: </label>
                <input type='text' id='sito' name='sito' placeholder='Sito web' value='$sito' tabindex='13' onBlur='checkSito();'>

                <label for='city'> Città: </label>
                <input type='text' id='city' name='city' placeholder='Città' value='$citta' tabindex='14' onBlur='checkCitta();'>      

                <label for='password'> Password: </label>
                <input type='password' id='password' name='password' placeholder='Password' tabindex='15' onBlur='checkPassword();'>

                <label for='rippw'> Ripeti password: </label>
                <input type='password' id='rippw' name='repPassword' placeholder='Password' tabindex='16' onBlur='checkRipPassword();'/>

                <label for='description'> Descrivi la tua azienda: </label>
                <textarea id='description' name='description' rows='15' cols='45' tabindex='17' placeholder='Cosa vuoi raccontare della tua azienda?' onBlur='checkDesc();'>$description</textarea>
            </div>
            
            <input type='submit' value='Registrati' name='submit'>

        </form>
    </div>";


footer();
 
echo "</body> \n </html>";
?>