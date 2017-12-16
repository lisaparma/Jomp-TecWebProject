<?php

require("structure.php");
require("functionHome.php");
require("connect.php");

$title="Sign In - Jomp";
head($title);

echo "<body>";

headers();

menuHome();

echo   "<div id=form>
            <div id=contentForm>
                <form method='post' action=signin.php>
                    Come vuoi registrarti? <br />
                    <input type='radio' id='azienda' name='button' value='Company' checked> <label for='azienda'>Azienda</label>
                    <input type='radio' id='utente' name='button' value='User'> <label for='utente'> Utente</label> <br/>
                    <input type='submit' value='Continua' name='continue'>
                </form>
            </div>
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







