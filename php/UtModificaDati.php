<?php

require_once("structure.php");
require_once("functionUtente.php");
require_once("connect.php");
require_once("classUtente.php");

session_start();

$title = "Modifica dati - Jomp";
head($title);

headers();


# -----------------------------------------


if(isset($_SESSION['login'])){ // Solo se in sessione vedi questo 
    $page = "Modifica dati";
    breadcrumb(array('Area Personale', $page));
    menu($page);
    
    $user = &$_SESSION['login'];
    
    $check1='';
    $check2='';

    if($user->getSex()==='m') 
        $check1='checked';
    else 
        $check2='checked';


    // Quando clicco su "MODIFICA"...
    if(isset($_POST['modifica'])){
        
        try {
            $newName = $_POST['Nome'];
            $newSurname = $_POST['Cognome'];
            $newEmail = $_POST['Email'];
            $newUsername= $_POST['Username'];
            $newPassword = $_POST['Password'];
            $newSex = $_POST['button'];
            $newNascita = $_POST['Nascita'];
            $sql="";
            
            // ... controllo che username ed email (che devono essere unici) non siano già utilizzati
            if($newUsername == $user->getUsername()) {
                if(($newEmail!=$user->getEmail() && checkEmail($newEmail)) || ($newEmail==$user->getEmail() && !checkEmail($newEmail))){
                    $sql = "UPDATE Utenti SET Nome='$newName', Cognome='$newSurname',Sesso='$newSex', Email='$newEmail', Password='$newPassword', Nascita='$newNascita' WHERE Username='".$user->getUsername()."'";
                }
                else {
                    echo "ERRORE EMAIL NON DISPONIBILE";
                }
            }
            else{
                if($newEmail == $user->getEmail()) {
                    if(($newUsername!=$user->getUsername() && checkUsername($newUsername))||($newUsername==$user->getUsername() && !checkUsername($newUsername))){
                        $sql = "UPDATE Utenti SET Nome='$newName', Cognome='$newSurname', Sesso='$newSex', Username='$newUsername', Password='$newPassword', Nascita='$newNascita'  WHERE Email='".$user->getEmail."'";
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
                $user->setBirth($newNascita);

                echo"<div class='successMsg'>Dati aggiornati con successo!</div>";                 
            }

        } 
        catch (Exception $e) {
            echo "Errore: " . $e->getMessage();
            die();
        }
    }

    
    // Stampo il form per cambiare i dati con quelli vecchi già inseriti
    echo" <div id='contenuto'>
            <h3> I tuoi dati: </h3>
            <p> Visualizza i tuoi dati e modificali in ogni momento! <br/>
                Ricorda: non puoi modificare contemporaneamente <strong> username </strong> ed <strong> e-mail </strong>!</p>

	            <form method='post' class='formMod' action='UtModificaDati.php'> 
                    <div class='inner-wrap'>
	                <label for='nome'> Nome: </label>
	                <input type='text' id='nome' value='".$user->getName()."' name='Nome'>
	                
	                <label for='cognome'> Cognome: </label> 
	                <input type='text' id='cognome' value='".$user->getSurname()."' name='Cognome'>
	                
                    <label for='date'> Data di nascita: </label>
                    <input type='date' id='date' value='".$user->getBirth()."' name='Nascita'>

	                <label for='email'> E-mail: </label> 
	                <input type='text' id='email' value='".$user->getEmail()."' name='Email'>     
	                
	                <label for='username'> Username: </label> 
	                <input type='text' id='username' value='".$user->getUsername()."' name='Username' value=''>
	                
	                
	                <label for='password'> Password: </label>
	                <input type='password' id='password' name='Password' value='".$user->getPassword()."'>

	                <label> Sesso: </label>
	                <input type='radio' id='uomo' name='button' value='m' $check1> <label id='man' for='uomo'> Uomo </label>
                    <input type='radio' id='donna' name='button' value='f' $check2> <label id='woman' for='donna'> Donna</label>
                    </div>
                    <input type='submit' value='Modifica' name='modifica'>

	            </form>
        </div>" ;
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