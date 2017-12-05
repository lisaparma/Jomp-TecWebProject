<?php


require("structure.php");
require("functionHome.php");

$title="Jomp - Log In ";
head($title);

echo "<body>";

headers();

menuHome();

echo "<form method='post' action='sign_in.php'> <!-- i titoletti vanno in label-->
        Nome: <br />
        <input type='text' name='Nome' placeholder='Nome'> <br /> <!-- placeholder non esiste in xhtml -->
        
        Cognome: <br />
        <input type='text' name='Cognome' placeholder='Cognome'> <br />
        
        Email: <br />
        <input type='text' name='Email' placeholder='Email'> <br />        
        
        Username: <br />
        <input type='text' name='Username' placeholder='Username'> <br />
        
        Password: <br />
        <input type='text' name='Password' placeholder='Password'> <br />
        <br />
        <input type='submit' value='Registrati' name='submit'>
        
        
    </form>";

footer();
 
echo "</body> \n </html>";
?>