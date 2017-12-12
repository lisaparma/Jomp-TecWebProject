<?php


function breadcrumb($page)
{
	echo"<div id='breadcrumb'>
	        <p> Ti trovi in: <span xml:lang='en'> <a href='home.php'>  Home</a> >> $page </span> </p>
	    </div> " ;
}



function menu($page)
{
	echo"<div id='areaPersonale'>
	        <ul>
	            <li> "; if($page==="Dashboard") { 
	            			echo" Dashboard </li>";
	            		} else { 
	            			echo " <a href='UtDashboard.php'> Dashboard </a>  </li> "; 
	            		} echo"
	            <li> "; if($page==="Cerca annuncio") { 
	            			echo" Cerca annuncio </li>";
	            		} else { 
	            			echo " <a href='UtCercaAnnuncio.php'> Cerca annuncio </a>  </li> "; 
	            		} echo"
	            <li> "; if($page==="Annunci salvati") { 
	            			echo" Annunci salvati </li>";
	            		} else { 
	            			echo " <a href='UtAnnunciSalvati.php'> Annunci salvati </a>  </li> "; 
	            		} echo"
	            <li> "; if($page==="Modifica dati") { 
	            			echo" Modifica dati </li>";
	            		} else { 
	            			echo " <a href='UtModificaDati.php'> Modifica dati </a>  </li> "; 
	            		} echo"


	        </ul>
	    </div> " ;
}



function recap()
{
    if(isset($_SESSION['login']))
       {        
        $nome=$_SESSION["login"]['Nome'];
        $cognome=$_SESSION["login"]['Cognome'];
        $email=$_SESSION["login"]['Email'];
        $username=$_SESSION["login"]['Username'];
        $password=$_SESSION["login"]['Password'];
        
           echo" <div id='contenuto'>
	        <h3> Benvenuto $nome!</h3>
            
           <div>
           
            <h4> I tuoi dati: </h4>
            <form method='post' action='UserSignIn.php'> 

                <label for='nome'> Nome: </label> <br/>
                <input type='text' readonly='readonly' id='nome' value='$nome' name='Nome'><br /> 
                
                <label for='cognome'> Cognome </label> <br/>
                <input type='text' readonly='readonly' id='cognome' value='$cognome' name='Cognome'><br />
                
                <label for='email'> E-mail: </label> <br/>
                <input type='text' readonly='readonly' id='email' value='$email' name='Email'><br />        
                
                <label for='username'> Username: </label> <br/>
                <input type='text' readonly='readonly' id='username' value='$username' name='Username' value=''>
                <br />
                
                <label for='password'> Password: </label> <br/>
                <input type='password' readonly='readonly' id='password' name='Password' value='$password'><br />
                <br />

                <input type='submit' value='Registrati' name='submit'>

            </form>
            </div>
            </div>" ;
            
       }
    else {
	echo" <div id='contenuto'>
	        <p> :'( </p>
	    </div> " ;
    }
}
  



function cerca() 
{
	echo" <div id='contenuto'>
	        <p> Pubblichiamo un annuncio</p>
	    </div> " ;
}

function annunciSalvati()
{
	echo" <div id='contenuto'>
	        <p> facciamo un resoconto degli annunci</p>
	    </div> " ;
}

function modificaDati() 
{
	echo" <div id='contenuto'>
	        <p> modifichiamo i dati</p>
	    </div> " ;
}


?>