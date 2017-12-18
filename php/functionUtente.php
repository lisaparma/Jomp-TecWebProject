<?php

function breadcrumb($page)
{
	echo "<div id='breadcrumb'>
	        <p>Ti trovi in: <span xml:lang='en'><a href='home.php'>Home</a> >>$page</span></p>
	    </div>";
}


function menu($page)
{
	echo"<div id='areaPersonale'>
	        <ul>
	            <li>"; 
	            if($page === 'Dashboard') { 
	            	echo "Dashboard</li>";
	            } else { 
	            	echo "<a href='UtDashboard.php'>Dashboard</a></li>"; 
	            } 
	            echo"<li>";
	           	if($page === 'Cerca annuncio') { 
	            	echo "Cerca annuncio</li>";
	            } else { 
	            	echo "<a href='UtCercaAnnuncio.php'>Cerca annuncio</a></li>"; 
	            }
	            echo "<li>";
	            if($page === 'Annunci salvati') { 
	            	echo "Annunci salvati</li>";
	            } else { 
	            	echo "<a href='UtAnnunciSalvati.php'>Annunci salvati</a></li>"; 
	            } 
	            echo "<li>";
	            if($page === 'Modifica dati') { 
	            	echo "Modifica dati</li>";
	            } else { 
	            	echo "<a href='UtModificaDati.php'>Modifica dati</a></li>"; 
	            } 
	            echo "
	        </ul>
	    </div>";
}



function recap() // da fare
{
    if(isset($_SESSION['login'])){ 
        $name=$_SESSION["login"]['Nome'];
        $surname=$_SESSION["login"]['Cognome'];
        $email=$_SESSION["login"]['Email'];
        $username=$_SESSION["login"]['Username'];
        $password=$_SESSION["login"]['Password'];
        $sex=$_SESSION["login"]['Sesso'];
        echo"<div id='contenuto'>
                <h3> Benvenut";if($sex='f') echo"a "; else echo"o "; echo"$name!</h3>
                <h4> Ricapitoliamo i tuoi dati:</h4>
                <p> Nome: $name <br/> Cognome: $surname <br/> e-mail: $email <br/> Username: $username <br/> Sesso: ";
                if($sex='f=')
                    echo "donna";
                else
                    echo "uomo";
        echo " <br/><p> Se vuoi modificare le tue informazioni personali <a href='UtModificaDati.php'>clicca qui </a></p>
            </div>" ;
            
       }
    else {
	echo "<div id='contenuto'>
	        <p>Sessione scaduta, procedere con la riutenticazione.</p>
	    </div>";
    }
}
  


function search() //da fare
{
    if(isset($_SESSION['login'])){ 
        $name=$_SESSION["login"]['Nome'];
        $surname=$_SESSION["login"]['Cognome'];
        $email=$_SESSION["login"]['Email'];
        $username=$_SESSION["login"]['Username'];
        $password=$_SESSION["login"]['Password'];
        $sex=$_SESSION["login"]['Sesso'];
        echo"<div id='contenuto'>
               <h3> Annunci salvati</h3>";
        
        // Quando clicco Salva su un annuncio
        if(isset($_POST['Salva'])){
            $ad=$_POST['Salva'];
            $query="INSERT INTO Consultazioni(Utente, CodAnnuncio) VALUES ('$username', '$ad')";
            mysqli_query(openDB(), $query);
        }
        
        // Quando clicco Salvato su un annuncio
        if(isset($_POST['Salvato'])){
            $ad=$_POST['Salvato'];
            $query="DELETE FROM Consultazioni WHERE CodAnnuncio='$ad' AND Utente='$username'";
            mysqli_query(openDB(), $query);
        }
        
        // Stampa gli annunci 
        $result = mysqli_query(openDB(), "SELECT * FROM Annunci ORDER BY Data DESC LIMIT 5");
        if($result) {
            echo "<div id='listannunci'>
                    <p>Annunci recenti:</p>
                        <ul id='annunci'>";
            printAd($result, $username, 'UtCercaAnnuncio.php');
            echo "  </ul>
                </div>" ;       
        }
        else 
            echo "Ancora nessun annuncio è stato pubblicato";

        echo" </div>" ;
        }
        else {
            echo "  <div id='contenuto'>
                        <p>Sessione scaduta, procedere con la riutenticazione.</p>
                    </div>";
        }

}

function liked($username, $ad) {
    $query="SELECT * from Consultazioni WHERE CodAnnuncio='$ad' AND Utente='$username'";
    $result=mysqli_query(openDB(), $query);
    if(mysqli_num_rows($result))
        return true;
    else 
        return false;
}


function adsSalved() //da fare
{
    if(isset($_SESSION['login'])){ 
        $name=$_SESSION["login"]['Nome'];
        $surname=$_SESSION["login"]['Cognome'];
        $email=$_SESSION["login"]['Email'];
        $username=$_SESSION["login"]['Username'];
        $password=$_SESSION["login"]['Password'];
        $sex=$_SESSION["login"]['Sesso'];
        echo"<div id='contenuto'>
               <h3> Annunci salvati</h3>";
        
        // Quando clicco Salva su un annuncio
        if(isset($_POST['Salva'])){
            $ad=$_POST['Salva'];
            $query="INSERT INTO Consultazioni(Utente, CodAnnuncio) VALUES ('$username', '$ad')";
            mysqli_query(openDB(), $query);
        }
        
        // Quando clicco Salvato su un annuncio
        if(isset($_POST['Salvato'])){
            $ad=$_POST['Salvato'];
            $query="DELETE FROM Consultazioni WHERE CodAnnuncio='$ad' AND Utente='$username'";
            mysqli_query(openDB(), $query);
        }
        
        
        $result = mysqli_query(openDB(), "SELECT * FROM Consultazioni JOIN Annunci ON Consultazioni.CodAnnuncio=Annunci.Codice WHERE Consultazioni.Utente='$username'");
        if($result) {
            echo "<div id='listannunci'>
                    <p>Annunci salvati:</p>
                        <ul id='annunci'>";
            printAd($result, $username, 'UtAnnunciSalvati.php');
            echo "  </ul>
                </div>" ;       
        }
        else 
            echo "Nessun annuncio salvato";

        echo" </div>" ;
        }
        else {
            echo "  <div id='contenuto'>
                        <p>Sessione scaduta, procedere con la riutenticazione.</p>
                    </div>";
        }   
}

function printAd($result, $username, $page){
    while($row = $result->fetch_array(MYSQLI_ASSOC)) {
                $id=$row['Codice'];
                if(liked($username, $id))
                    $like="Salvato";
                else 
                    $like="Salva";
                echo "<li><h3>".$row['Titolo']."</h3>
                        <p>Pubblicato il: ".$row['Data']."</p><br/>
                        <p>Descrizione:<br/><p>".$row['Descrizione']."</p>
                        <form method='post' action=$page>
                            <button type='submit' name='$like' value='$id'>$like</button>
                        </form>
                    </li>";
            }	
}
function checkEmail($email) {
    $result = mysqli_query(openDB(),"SELECT Username FROM Utenti WHERE Email='$email'");
    $num_rows = mysqli_num_rows($result);
    if($num_rows == 1) {
        return true;
    }
    return false;
}
function checkUsername($username) {
    $result = mysqli_query(openDB(),"SELECT * FROM Utenti WHERE Username='$username'");
    $num_rows = mysqli_num_rows($result);
    if($num_rows == 1) {
        return true;
    }
    return false;
    
}

function editData()
{
    
if(isset($_SESSION['login'])) {  
    $name=$_SESSION["login"]['Nome'];
    $surname=$_SESSION["login"]['Cognome'];
    $email=$_SESSION["login"]['Email'];
    $username=$_SESSION["login"]['Username'];
    $password=$_SESSION["login"]['Password'];
    $sex=$_SESSION["login"]['Sesso'];
    $check1='';
    $check2='';

    if($sex==='m') 
        $check1='checked';
    else 
        $check2='checked';

    echo" <div id='contenuto'>
	        
            <h4> I tuoi dati: </h4>
	            <form method='post' action='UtModificaDati.php'> 

	                <label for='nome'> Nome: </label> <br/>
	                <input type='text' id='nome' value='$name' name='Nome'><br /> 
	                
	                <label for='cognome'> Cognome </label> <br/>
	                <input type='text' id='cognome' value='$surname' name='Cognome'><br />
	                
	                <label for='email'> E-mail: </label> <br/>
	                <input type='text' id='email' value='$email' name='Email'><br />        
	                
	                <label for='username'> Username: </label> <br/>
	                <input type='text' id='username' value='$username' name='Username' value=''>
	                <br />
	                
	                <label for='password'> Password: </label> <br/>
	                <input type='password' id='password' name='Password' value='$password'><br />

	                Sesso:
	                <input type='radio' id='uomo' name='button' value='m' $check1> <label for='uomo'> Uomo </label>
                    <input type='radio' id='donna' name='button' value='f' $check2> <label for='donna'> Donna</label> <br/>
                    
                    <input type='submit' value='Modifica' name='modifica'>

	            </form>
            </div>
        </div>" ;
        
    if(isset($_POST['modifica'])){
        
        try {
            $newName = $_POST['Nome'];
            $newSurname = $_POST['Cognome'];
            $newEmail = $_POST['Email'];
            $newUsername= $_POST['Username'];
            $newPassword = $_POST['Password'];
            $newSex = $_POST['button'];
            if($newUsername == $username) {
                if(checkEmail($newEmail)){
                    $sql = "UPDATE Utenti SET Nome='$newName', Cognome='$newSurname',Sesso='$newSex', Email='$newEmail', Password='$newPassword' WHERE Username='$username'";
                }
                else {
                    echo "ERRORE EMAIL NON DISPONIBILE";
                }
            }
            else{
                if($newEmail == $email) {
                    if(checkUsername($newUsername)){
                        $sql = "UPDATE Utenti SET Nome='$newName', Cognome='$newSurname', Sesso='$newSex', Username='$newUsername', Password='$newPassword'  WHERE Email='$email'";
                    }
                    else {
                        echo "ERRORE USERNAME NON DISPONIBILE";
                    }
                } 
                else {
                    echo"NON PUOI CAMBIARE SIA USERNAME CHE EMAIL STRONZO";
                }
            }
            
            if(mysqli_query(openDB(), $sql)) {
                $_SESSION["login"]['Nome']=$newName;
                $_SESSION["login"]['Cognome']=$newSurname;
                $_SESSION["login"]['Email']=$newEmail;
                $_SESSION["login"]['Username']=$newUsername;
                $_SESSION["login"]['Password']=$newPassword;
                $_SESSION["login"]['Sesso']=$newSex;
                header("location: UtModificaDati.php");
            }
            else {
                echo "Errore nell'aggiornare i propri dati.";
            }

        } 
        catch (Exception $e) {
            echo "Errore: " . $e->getMessage();
            die();
        }
    } 
            
}
else {
    echo "<div id='contenuto'>
            <p>Sessione scaduta, procedere con la riutenticazione.</p>
        </div>";
} 
}


?>