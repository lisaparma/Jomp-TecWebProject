<?php


require("structure.php");
require("functionHome.php");
require("connect.php");

$title="Jomp - Registrazione Azienda";
head($title);

headers();

menuHome();

//inizializzo gli errori come una stringa vuota
$emailErr = $usernameErr = $rippwErr = "";

echo "<div id=form>
        <div id=contentForm>
            <form method='post' action='CompanySignIn.php'> 

                <label for='nome'> Nome: </label><br/>
                <input type='text' id='nome' name='Nome' placeholder='Nome'required><br/> 
                
                <label for='email'> E-mail: </label><br/>
                <input type='text' id='email' name='Email' placeholder='Email' pattern='[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$' required><span class='error'>$emailErr</span><br/> 
                
                <label for='citta'> Città: </label><br/>
                <input type='text' id='citta' name='Citta' placeholder='Città' required><br/>       
                
                <label for='username'> Username: </label><br/>
                <input type='text' id='username' name='Username' placeholder='Username' required><span class='error'>$usernameErr</span><br />
                
                <label for='password'> Password: </label><br/>
                <input type='password' id='password' name='Password' placeholder='Password' required><br/>

                <label for='rippw'> Ripeti password: </label><br/>
                <input type='password' id='rippw' name='RipPassword' placeholder='Password' required><span class='error'>$rippwErr</span><br/>
                <br/>

                <input type='submit' value='Registrati' name='submit'>

            </form>
        </div>
    </div>";



footer();
 
echo "</body> \n </html>";
?>