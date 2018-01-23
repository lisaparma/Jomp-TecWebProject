<?php

function head($title) {
	echo "<!DOCTYPE HTML PUBLIC '-//W3C//DTD XHTML 1.0 Strict//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'>
			<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='it' lang='it' >

			<head> 
			    <title> $title </title>
			    <meta http-equiv='Content-Type' content='text/html; charset=utf-8' /> 
			    <meta name='title' content='$title'/>
			    <meta name='description' content='Descrizione'/>
			    <meta name='keywords' content='----'/>
			    <meta name='author' content='Lisa Parma, Sara Feltrin, Silvia Bazzeato'/>
			    <meta name='language' content='italian it'/>
			    <meta name='title' content='$title'/>
			    <meta name='viewport' content='width=device-width'/>
			    
			    <link href='../css/desktop.css' rel='stylesheet' type='text/css' media='screen'/>
			    <!-- <link href='../css/print.css' rel='stylesheet' type='text/css' media='print'/> -->
			    
			    <link href='../IMG/job.png' rel='icon' type='image/x-icon'/>
			    <link href='../IMG/job.png' rel='shortcut icon' type='image/x-icon'/>
                
                <script language='JavaScript' type='text/javascript' src='../JavaScript/javascript.js'></script>

			    
			</head>
            <body onLoad='whereIam();'>";
}

function primaryMenu(){ 
	echo "<div id='primarymenu'>
			<ul>
			  <li ><a id='qui' href='sectionChiSiamo.php'>Chi siamo</a></li>
			  <li ><a id='qui' href='sectionAziendePartner.php'>Aziende partner</a> </li>";
	if(isset($_SESSION['login'])) {
	        if(get_class($_SESSION['login'])=='Utente')
		        echo "<li><a id='qui' href='UtDashboard.php'> Area personale </a></li>
	                <li><a id='qui' href='logout.php'> Esci </a></li>";
	        else
	            echo "<li><a id='qui' href='AzDashboard.php'> Area personale </a></li>
	                <li><a id='qui' href='logout.php'> Esci </a></li>";
	    }
    else
        echo "<li><a id='qui' href='login.php'> Login </a></li>
            <li><a id='qui' href='signin.php'> Registrati </a>
                <ul>
                  <li><a href='CompanySignIn.php'>Come Azienda</a></li>
                  <li><a href='UserSignIn.php'>Come Utente</a></li>
                  <li><a href='sectionPerchèIscriversi.php'>Perchè registrarsi</a> </li>
                </ul>
            </li>";
	echo"
	  

	  
	</ul>
	</div>";
}

function headers() {
	echo "<div class='header'>";
	if(!isset($_SESSION['login'])) {
	        echo " 	<div id='box'>
			            <p class='button' id='login'><a href='login.php'>Log In</a></p>
			            <p class='button' id='signin'><a href='signin.php'>Sign In</a></p>
			        </div>";
	}
	else {
		echo " 	<div id='box'>
			            <p class='button' id='logout'><a href='logout.php'>Log out</a></p>
			        </div>";
	}
	echo "		<a href='home.php'>
		            <img id='logo' src='../IMG/jomp2.png' alt='logo scritta jomp con lente d&rsquo;ingrandimento'>
		        </a>";
                primaryMenu();

	 echo"   </div>
     <div id='page'>";
}


function breadcrumb($pages){
    echo "<ul id='bc'>
            <li><a href='home.php'> <img class='icon' src='../IMG/home.svg'></img> </a></li>";
    for ($i = 0, $n = count($pages) ; $i < $n ; $i++)
    {
        echo "<li><a><span class='icon'> </span> $pages[$i]</a></li>";
    }
    echo "</ul>";
}

function footer() { 
    echo "<div id='footer'>
        <div id='link'>
            <ul> 
                <li><a href=''>Chi siamo</a></li> 
                <li><a href=''>Privacy/Policy</a></li> 
                <li><a href=''>Termini e condizioni</a></li> 
            </ul> 
        </div>
        <div id='social'>
            <ul>
                <li><a href='http://www.facebook.com'><div id='fb'></div></a></li> 
                <li><a href='http://www.instagram.com'><div id='ig'></div></a></li> 
                <li><a href='http://www.plus.google.com'><div id='gg'></div></a></li> 
                <li><a href='http://www.twitter.com'><div id='tw'></div></a></li> 
            </ul> 
        </div> 
        <p> SLS Group <br/> Sede legale: Via Trieste 63, 35121 Padova (Italy) <br/> Contatti: sara.feltrin.2@studenti.unipd.it, lisa.parma@studenti.unipd.it, silvia.bazzeato@studenti.unipd.it</p> 
    </div>"; 
} 
?>