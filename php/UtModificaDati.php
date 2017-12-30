<?php

require_once("structure.php");
require_once("functionUtente.php");
require_once("connect.php");
require_once("classUtente.php");

session_start();

$title = "Modifica dati - Jomp";
head($title);

echo "<body>";

headers();


# -----------------------------------------


if(isset($_SESSION['login'])){
    $page = "Modifica dati";
    breadcrumb($page);
    menu($page);
    
    $user = &$_SESSION['login'];
    
    $check1='';
    $check2='';

    if($user->getSex()==='m') 
        $check1='checked';
    else 
        $check2='checked';
    
    // Stampo il form per cambiare i dati con quelli vecchi già inseriti
    echo" <div id='contenuto'>
	        
            <h4> I tuoi dati: </h4>
	            <form method='post' action='UtModificaDati.php'> 

	                <label for='nome'> Nome: </label> <br/>
	                <input type='text' id='nome' value='".$user->getName()."' name='Nome'><br /> 
	                
	                <label for='cognome'> Cognome </label> <br/>
	                <input type='text' id='cognome' value='".$user->getSurname()."' name='Cognome'><br />
	                
	                <label for='email'> E-mail: </label> <br/>
	                <input type='text' id='email' value='".$user->getEmail()."' name='Email'><br />        
	                
	                <label for='username'> Username: </label> <br/>
	                <input type='text' id='username' value='".$user->getUsername()."' name='Username' value=''>
	                <br />
	                
	                <label for='password'> Password: </label> <br/>
	                <input type='password' id='password' name='Password' value='".$user->getPassword()."'><br />

	                Sesso:
	                <input type='radio' id='uomo' name='button' value='m' $check1> <label for='uomo'> Uomo </label>
                    <input type='radio' id='donna' name='button' value='f' $check2> <label for='donna'> Donna</label> <br/>
                    
                    <input type='submit' value='Modifica' name='modifica'>

	            </form>
            </div>
        </div>" ;
        
    // Quando clicco su "MODIFICA"...
    if(isset($_POST['modifica'])){
        
        try {
            $newName = $_POST['Nome'];
            $newSurname = $_POST['Cognome'];
            $newEmail = $_POST['Email'];
            $newUsername= $_POST['Username'];
            $newPassword = $_POST['Password'];
            $newSex = $_POST['button'];
            $sql="";
            
            // ... controllo che username ed email (che devono essere unici) non siano già utilizzati
            if($newUsername == $user->getUsername()) {
                if(($newEmail!=$user->getEmail() && checkEmail($newEmail)) || ($newEmail==$user->getEmail() && !checkEmail($newEmail))){
                    $sql = "UPDATE Utenti SET Nome='$newName', Cognome='$newSurname',Sesso='$newSex', Email='$newEmail', Password='$newPassword' WHERE Username='".$user->getUsername()."'";
                }
                else {
                    echo "ERRORE EMAIL NON DISPONIBILE";
                }
            }
            else{
                if($newEmail == $user->getEmail()) {
                    if(($newUsername!=$user->getUsername() && checkUsername($newUsername))||($newUsername==$user->getUsername() && !checkUsername($newUsername))){
                        $sql = "UPDATE Utenti SET Nome='$newName', Cognome='$newSurname', Sesso='$newSex', Username='$newUsername', Password='$newPassword'  WHERE Email='".$user->getEmail."'";
                    }
                    else {
                        echo "ERRORE USERNAME NON DISPONIBILE";
                    }
                } 
                else {
                    echo"NON PUOI CAMBIARE SIA USERNAME CHE EMAIL STRONZO";
                }
            }
            
            // ... e cambio i dati dell'oggetto Utente (essendo un "puntatore" cambiano anche sulla variabile sessione)
            if($sql && mysqli_query(openDB(), $sql)) {
                $user->setName($newName);
                $user->setSurname($newSurname);
                $user->setEmail($newEmail);
                $user->setUsername($newUsername);
                $user->setPassword($newPassword);
                $user->setSex($newSex);
                
                header("location: UtModificaDati.php");
            }

        } 
        catch (Exception $e) {
            echo "Errore: " . $e->getMessage();
            die();
        }
    } 
    

    
    
}
else{
    echo " <div id='contenuto'>
	           <p>Sessione scaduta, procedere con la riutenticazione.</p>
	       </div>";
}

# ----------------------------------------

footer();
 
echo "</body> \n </html>";

?>