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
	echo" <div id='contenuto'>
	        <p> Ricapitoliamo tutti i dati importanti dell'azienda nome, annunci scritti, ecc..</p>
	    </div> " ;
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