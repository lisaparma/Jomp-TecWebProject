<?php

require_once("structure.php");
require_once("functionHome.php");
require_once("connect.php");

$title="Sign In - Jomp";
head($title);

echo "<body>";

headers();


echo   "<div id=signinform>
            <h1> Come vuoi registrarti? </h1>
            <form method='post' action=signin.php> 
                <input type='radio' id='azienda' name='button' value='Company' checked> <label for='azienda'>Azienda</label>
                <input type='radio' id='utente' name='button' value='User'> <label for='utente'> Utente</label> <br/>
                <input type='submit' value='Continua' name='continue'>
            </form>
        </div>";

if(isset($_POST['continue'])){
    try {

        $value = $_POST['button'];

        if($value == 'User') {
            header("location: UserSignIn.php");
        }
        else
            header("location: CompanySignIn.php");

    } catch (PDOException $e) {
        echo "Errore: " . $e->getMessage();
        die();
    }
}



footer();
 
echo "</body> \n </html>";
?>







