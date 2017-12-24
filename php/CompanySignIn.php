<?php


require_once("structure.php");
require_once("functionHome.php");
require_once("connect.php");
require_once("functionAzienda.php");

$title = "Registrazione Azienda - Jomp";
head($title);

headers();

menuHome();


echo "<div id=form>
        <div id=contentForm>
            <form method='post' action='CompanySignIn.php'> 

                <label for='nome'> Nome: </label><br/>
                <input type='text' id='name' name='Name' placeholder='Nome'required><br/> 

                <label for='pIva'> Partita IVA: </label><br/>
                <input type='text' id='pIva' name='PIva' placeholder='Partita Iva'required><br/> 
                
                <label for='email'> E-mail: </label><br/>
                <input type='text' id='email' name='Email' placeholder='Email' pattern='[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$' required><br/> 
                
                <label for='citta'> Città: </label><br/>
                <input type='text' id='cyty' name='City' placeholder='Città' required><br/>       
                                
                <label for='password'> Password: </label><br/>
                <input type='password' id='password' name='Password' placeholder='Password' required><br/>

                <label for='rippw'> Ripeti password: </label><br/>
                <input type='password' id='reppw' name='RepPassword' placeholder='Password' required><br/>
                <br/>

                <input type='submit' value='Registrati' name='submit'>

            </form>
        </div>
    </div>";

if(isset($_POST['submit'])){
    try {

        $db = openDB();
        
        $Name = $_POST['Name'];
        $PIva = $_POST['PIva'];
        $Email = $_POST['Email'];
        $Citta = $_POST['City'];
        $Password = $_POST['Password'];
        $RepPassword = $_POST['RepPassword'];

        //verifico i dati inseriti
        if(checkName($Name) && checkPIva($PIva) && checkRepeatPassword($Password, $RepPassword)) {
            $sql = "INSERT INTO Aziende(Nome, PIva, Email, Citta, Password) VALUES ('$Name', '$PIva', '$Email', '$Citta', '$Password')";

            $db -> query($sql);
            header("location: login.php");

        }
        else {
            echo "<div id=errorList><p>Tentativo di registrazione fallito, sono sorti i seguenti errori:</p><br/>";
            echo "<ul>";
            if(!checkName($Name)) {
                echo "<li>Azienda già presente, controlla di non essere già registrato</li><br/>";
            }

            if(!checkPIva($PIva)) {
                echo "<li>Partita IVA già presente, controlla di non essere già registrato o di avere inserito corretamente la sequenza di cifre</li><br/>";
            }

            if(!checkRepeatPassword($Password, $RepPassword)) {
                echo "<li>La password di verifica non corrisponde alla password scelta</li><br/>";
            }
            echo "</ul></div>";

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