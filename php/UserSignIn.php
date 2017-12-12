<?php


require("structure.php");
require("functionHome.php");
require("connect.php");

$title="Jomp - Registrazione Utente";
head($title);

echo "<body>";

headers();

menuHome();

//inizializzo gli errori come una stringa vuota
$emailErr = $usernameErr = $rippwErr = "";

function checkEmail($Email) {
    echo "checkEmail";
    //$db = openDB();
    $result = mysqli_query(openDB(),"SELECT Email FROM Utenti WHERE Email='".$Email."'");     //creo la query
    
    $num_rows = mysqli_num_rows($result);                                      //invio la query


    if($num_rows != 0) {                                                 //resultato non vuoto: email già esistente
        $emailErr = "Email già presente, controlla di non essere già registrato";
        return false;
    }
    return true;
}

function checkUsername($Username) {
    echo "checkUsername";

    $result = mysqli_query(openDB(),"SELECT Username FROM Utenti WHERE Username='".$Username."'");

    $num_rows = mysqli_num_rows($result);

    if($num_rows != 0) {
        $usernameErr = "Username non disponibile";
        return false;
    }
    return true;
}

function checkRepeatPassword($Password, $RipPassword) {
    echo "checkPass";
    if($Password != $RipPassword) {
        $rippwErr = "La password ripetuta non corrisponde alla precedente";
        return false;
    }
    return true;
}




//Mettere i tab index nei form e nei link
echo "<div id=form>
        <div id=contentForm>
            <form method='post' action='UserSignIn.php'> 

                <label for='nome'> Nome: </label> <br/>
                <input type='text' id='nome' name='Nome' placeholder='Nome'required><br /> 
                
                <label for='cognome'> Cognome </label> <br/>
                <input type='text' id='cognome' name='Cognome' placeholder='Cognome' required><br />
                
                <label for='email'> E-mail: </label> <br/>
                <input type='text' id='email' name='Email' placeholder='Email' pattern='[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$' required><span class='error'>$emailErr</span><br />        
                
                <label for='username'> Username: </label> <br/>
                <input type='text' id='username' name='Username' placeholder='Username' required><span class='error'>$usernameErr</span><br />
                
                <label for='password'> Password: </label> <br/>
                <input type='password' id='password' name='Password' placeholder='Password' required><br />

                <label for='rippw'> Ripeti password: </label> <br/>
                <input type='password' id='rippw' name='RipPassword' placeholder='Password' required><span class='error'>$rippwErr</span><br />
                <br />

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
            header("location: UtDashboard.php");

        }
        else {
            header("location: signin.php");
            echo "<div id=form>
                <div id=contentForm>
                    <form method='post' action='signin.php'> 
                    
                        Come vuoi registrarti? <br />
                        <input type='radio' id='azienda' name='tiporegistrazione' value='azienda' checked> <label for='azienda'>Azienda</label>
                        <input type='radio' id='utente' name='tiporegistrazione' value='utente'> <label for='utente'> Utente</label> <br/>

                        <label for='nome'> Nome: </label> <br/>
                        <input type='text' id='nome' name='Nome' value=$Nome required><br /> 
                        
                        <label for='cognome'> Cognome </label> <br/>
                        <input type='text' id='cognome' name='Cognome' value=$Cognome required><br />
                        
                        <label for='email'> E-mail: </label> <br/>
                        <input type='text' id='email' name='Email' value=$Email pattern='[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$' required><span class='error'>$emailErr</span><br />        
                        
                        <label for='username'> Username: </label> <br/>
                        <input type='text' id='username' name='Username' value=$Username required><span class='error'>$usernameErr</span><br />
                        
                        <label for='password'> Password: </label> <br/>
                        <input type='password' id='password' name='Password' placeholder='Password' required><br />

                        <label for='rippw'> Ripeti password: </label> <br/>
                        <input type='password' id='rippw' name='RipPassword' placeholder='Password' required><span class='error'>$rippwErr</span><br />
                        <br />

                        <input type='submit' value='Registrati' name='submit'>

                    </form>
                </div>
            </div>";
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