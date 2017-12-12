<?php


require("structure.php");
require("functionHome.php");
require("connect.php");

$title="Jomp - Log In ";
head($title);

headers();

menuHome();

echo "<body>
        <form method='post' action='login.php'> 
                <label for='username'> Username o nome azienda: </label> <br/>
                <input type='text' id='username' name='Username' placeholder='Username'> <br />
                
                <label for='password'> Password: </label> <br/>
                <input type='password' id='password' name='Password' placeholder='Password'> <br />

                <input type='submit' value='Entra' name='submit'>

            </form>";

function checkDataUser($Username, $Password) {
    $user = mysqli_query(openDB(),"SELECT Username, Password FROM Utenti WHERE Username='".$Username."' AND Password='".$Password."'");    
    
    $num_rows = mysqli_num_rows($user);

    if($num_rows == 1) {        
        return true;
    }
    return false;
}


function openSessionUser($Username) {
    session_start();
    $user = mysqli_query(openDB(), "SELECT * FROM Utenti WHERE Username='".$Username."'");
    $_SESSION["login"] = $user->fetch_array(MYSQLI_ASSOC);
}


function checkDataCompany($Username, $Password) {
    $company = mysqli_query(openDB(),"SELECT Nome, Password FROM Aziende WHERE Nome='".$Username."' AND Password='".$Password."'");

    $num_rows = mysqli_num_rows($company);

    if($num_rows == 1) {      
        return true;
    }
    return false;
}


function openSessionCompany($Username) {
    session_start();
    $company = mysqli_query(openDB(), "SELECT * FROM Aziende WHERE Nome='".$Username."'"); 
    $_SESSION["login"] = $company->fetch_array(MYSQLI_ASSOC);
}


if(isset($_POST["submit"])){
    try {

        $db=openDB();
        
        $Username=$_POST["Username"];
        $Password=$_POST["Password"];

        //login per l'utente
        if(checkDataUser($Username, $Password)) {
            openSessionUser($Username);
            header("location: UtDashboard.php");
        }

        //login per l'azienda
        if(checkDataCompany($Username, $Password)) {
            openSessionCompany($Username);
            header("location: AzDashboard.php");
        }

        else{
            echo "<p>Attenzione! Username o Password non sono corretti.<p>";
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
