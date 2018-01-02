<?php


require_once("structure.php");
require_once("functionHome.php");
require_once("connect.php");
require_once("functionAzienda.php");


$title = "Registrazione Azienda - Jomp";
head($title);

headers();

menuHome();

echo "<h3>Regole per l'iscrizione:</h3>
        <ol>
            <li>Tutti i campi devono essere <strong>OBBLIGATORIAMENTE</strong> compilati;</li>
            <li>Il nome e l'email dell'azienda devono essere univoche;</li>
            <li>Vengono accettate solo aziende con sede legale in italia, ragion per cui la Partita Iva deve essere lunga 11 cifre;</li>
            <li>La password deve essere lunga almeno 8 caratteri;</li>
            <li>E' necessario ripetere la stessa esatta sequenza di caratteri della password dove viene richiesto di ripeterla.</li>
        </ol>";


echo "<div id=form>
        <div id=contentForm>
            <form method='post' action='CompanySignIn.php'> 

                <label for='nome'> Nome: </label><br/>
                <input type='text' id='name' name='name' placeholder='Nome'required><br/> 

                <label for='pIva'> Partita IVA: </label><br/>
                <input type='text' id='pIva' name='pIva' placeholder='Partita Iva'required><br/> 
                
                <label for='email'> E-mail: </label><br/>
                <input type='text' id='email' name='email' placeholder='Email' pattern='[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$' required><br/> 
                
                <label for='citta'> Città: </label><br/>
                <input type='text' id='cyty' name='city' placeholder='Città' required><br/>       
                                
                <label for='password'> Password: </label><br/>
                <input type='password' id='password' name='password' placeholder='Password' required><br/>

                <label for='rippw'> Ripeti password: </label><br/>
                <input type='password' id='reppw' name='repPassword' placeholder='Password' required><br/>

                <p> Descrivi la tua azienda: </p><br/>
                <textarea name='description' rows='15' cols='45' placeholder='Cosa vuoi raccontare della tua azienda?' required></textarea><br/>
                <br/>

                <input type='submit' value='Registrati' name='submit'>

            </form>
        </div>
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

        //verifico i dati inseriti
        if(checkName($name) && checkPIva($pIva) && checkLengthPIva($pIva) && checkLengthPassword($password) && checkRepeatPassword($password, $repPassword)) {
            $sql = "INSERT INTO Aziende (Nome, PIva, Email, Citta, Password, Descrizione) VALUES ('$name', '$pIva', '$email', '$citta', '$password', '$description')";

            if (mysqli_query(openDB(), $sql)) {
                header("location: login.php?msg");
            } 
            else {
                echo "<p class='errorMsg'>Errore nell'inserire i dati nel database. Riprova.</p>";
            }

        }
        else {
            echo "<div><p class='errorMsg'>Tentativo di registrazione fallito, sono sorti i seguenti errori:</p><br/>";
            echo "<ul id='errorList'>";
            if(!checkName($name)) {
                echo "<li>Azienda già presente, controlla di non essere già registrato</li><br/>";
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


footer();
 
echo "</body> \n </html>";
?>