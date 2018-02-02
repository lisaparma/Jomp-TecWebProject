<?php

require_once("structure.php");
require_once("functionHome.php");
require_once("connect.php");
require_once("classUtente.php");
require_once("classAzienda.php");

$title="Jomp - Log In ";

session_start();

head($title);

headers();

$page='Accedi';
breadcrumb(array($page));

echo "<div id='intro'>
        <h2>Accedi subito!</h2>
        <p>Che tu sia un'azienda o un utente privato, accedi subito alla tua area privata per gestire gli annunci di lavoro!<br/>
        Inserisci l'e-mail con cui ti sei registrato e la password:</p>
    </div>";


if(isset($_POST['submit'])){
    try {

        $db=openDB();
        
        $email=trim($_POST['Email']);
        $Password=trim($_POST['Password']);

        //login per l'utente
        if(checkDataUser($email, $Password)) {
            $user = mysqli_query(openDB(), "SELECT * FROM Utenti WHERE Email='".$email."'");
            $login = $user->fetch_array(MYSQLI_ASSOC);
            $_SESSION['login'] = new Utente($login);
            header("location: UtDashboard.php");
        }

        //login per l'azienda
        if(checkDataCompany($email, $Password)) {
            $company = mysqli_query(openDB(), "SELECT * FROM Aziende WHERE Email='".$email."'"); 
            $login = $company->fetch_array(MYSQLI_ASSOC);
            $_SESSION['login'] = new Azienda($login);
            header("location: AzDashboard.php");
        }

        else{
            echo "<div class='erroreDati'> Attenzione! Username e/o password non sono corretti.</div>";
        }


        closeDB($db);
    } catch (PDOException $e) {
        echo "Errore: " . $e->getMessage();
        die();
    }

}

echo "<div class='form'>
            <h1> Accedi </h1>
            <form method='post' action='login.php'> 
                    <div class='inner-wrap'>
                    <label for='email'> E-mail: </label> <br/>
                    <input type='text' id='email' name='Email' placeholder='E-mail'> <br />
                    
                    <label for='password'> Password: </label> <br/>
                    <input type='password' id='password' name='Password' placeholder='Password'> <br />
                </div>
                <input type='submit' value='Entra' name='submit'>
            </form>
        </div>";

function checkDataUser($email, $Password) {
    $user = mysqli_query(openDB(),"SELECT Email, Password FROM Utenti WHERE Email='".$email."' AND Password='".$Password."'");    
    
    $num_rows = mysqli_num_rows($user);

    if($num_rows == 1) {        
        return true;
    }
    return false;
}

function checkDataCompany($email, $Password) {
    $company = mysqli_query(openDB(),"SELECT Email, Password FROM Aziende WHERE Email='".$email."' AND Password='".$Password."'");

    $num_rows = mysqli_num_rows($company);

    if($num_rows == 1) {      
        return true;
    }
    return false;
}


footer();
 
echo "</body> \n </html>";
?>
