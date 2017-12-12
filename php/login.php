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
                <label for='username'> Username: </label> <br/>
                <input type='text' id='username' name='Username' placeholder='Username'> <br />
                
                <label for='password'> Password: </label> <br/>
                <input type='password' id='password' name='Password' placeholder='Password'> <br />

                <input type='submit' value='Entra' name='submit'>

            </form>";

if(isset($_POST["submit"])){
    try {

        $db=openDB();
        
        $Username=$_POST["Username"];
        $Password=$_POST["Password"];

       
        if ($Username && $Password ) {
            $sql = "SELECT  COUNT(*) FROM Utenti WHERE Username='$Username' AND Password='$Password'";
            $result=$db->query($sql);
            if($result->fetchColumn() > 0) {
                session start();
                $SESSION['login'] = $Username;
                
                header("location: UtDashboard.php");

            }
            else{
                echo"<script type= 'text/javascript'>alert('Utente non registrato');</script>";
            }
        }
        else {
            echo "<script type= 'text/javascript'>alert('Inserisci tutti i dati per continuare');</script>";
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
