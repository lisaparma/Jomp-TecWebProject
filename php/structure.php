<?php

function head($title) {
	echo "<!DOCTYPE html>

			<head> 
			    <title> $title </title>
			    <meta charset='utf-8' />
			    <meta name='title' content='$title'/>
			    <meta name='description' content='Descrizione'/>
			    <meta name='keywords' content='----'/>
			    <meta name='author' content='Lisa Parma, Sara Feltrin, Silvia Bazzeato'/>
			    <meta name='language' content='italian it'/>
			    <meta name='title' content='$title'/>
			    <meta name='viewport' content='width=device-width'/>
			    
			    <link href='../css/desktop.css' rel='stylesheet' type='text/css' media='screen'/>
			    <link href='../css/print.css' rel='stylesheet' type='text/css' media='print'/>
			    
			    <link href='../IMG/job.png' rel='icon' type='image/x-icon'/>
			    <link href='../IMG/job.png' rel='shortcut icon' type='image/x-icon'/>
                
                <script src='../JavaScript/javascript.js'></script>
			    
			</head>
            <body onLoad='whereIam();' onscroll='reduceHeader();'>";
}

function headers() {
    echo "<div id='header'>
            <div id='fascia'>
                <a href='home.php'>
                    <img id='logo' src='../IMG/jomp2.png' title='Logo Jomp - Home' alt='Logo del sito Jomp'>
                </a>
                <div id='primarymenu'>"; 
                    primaryMenu(); 
    echo "      </div>    
                <form method='post' action='";echo $_SERVER['PHP_SELF']; echo"'id='hamburger' onsubmit='return menuHamburger();'> 
                    <label for='sub'> <img src='../IMG/hamburger.svg' title='Menu' alt='menu'> </label>";
                    if(isset($_POST['hamb']))
                        echo"<input id='sub' type='submit' name='null'>";
                    else
                        echo"<input id='sub' type='submit' name='hamb'>";
                    
            echo"    </form>
            </div>";
            if(isset($_POST['hamb']))
                echo"<div id='mobilemenu'>"; 
            else 
                echo"<div id='mobilemenu' class='hidden'>"; 
            primarymenu(); 
    echo"   </div>
            </div>
     <div id='page'>";
}

function primaryMenu(){ 
	echo "<ul>
              <li><a href='home.php' tabindex='1'>Home </a></li>
			  <li><a href='sectionChiSiamo.php' tabindex='2'>Chi siamo</a></li>
			  <li><a href='sectionAziendePartner.php' tabindex='3'>Aziende partner</a> </li>";
	if(isset($_SESSION['login'])) {
	        if(get_class($_SESSION['login'])=='Utente')
		        echo "<li><a href='UtDashboard.php' tabindex='4'> Area personale </a>
                    <ul>
                        <li><a href='UtDashboard.php'tabindex='5'>Dashboard</a></li>
                        <li><a href='UtCercaAnnuncio.php'tabindex='6'>Cerca annuncio</a></li>
                        <li><a href='UtAnnunciSalvati.php'tabindex='7'>Annunci salvati</a></li>
                        <li><a href='UtModificaDati.php'tabindex='8'>Modifica dati</a></li>
                    </ul>
                    </li>
	                <li><a href='logout.php' tabindex='9'> Esci</a></li>";
	        if(get_class($_SESSION['login'])=='Azienda')
	            echo "<li><a href='AzDashboard.php' tabindex='4'> Area personale </a>
                    <ul>
                        <li><a href='AzDashboard.php' tabindex='5'>Dashboard</a></li>
                        <li><a href='AzPubblicaAnnuncio.php' tabindex='6'>Pubblica annuncio</a></li>
                        <li><a href='AzResocontoAnnunci.php' tabindex='7'>Resoconto Annunci</a></li>
                        <li><a href='AzModificaDati.php' tabindex='8'>Modifica dati</a></li>
                    </ul>
                    </li>
	                <li><a href='logout.php' tabindex='9'> Esci </a></li>";
            if(get_class($_SESSION['login'])=='Admin')
                echo "<li><a href='AdminDashboard.php' tabindex='4'> Area personale </a>
                    <ul>
                        <li><a href='AdminDashboard.php' tabindex='5'>Dashboard</a></li>
                        <li><a href='AdminModUtenti.php' tabindex='6'>Sezione utenti</a></li>
                        <li><a href='AdminModAziende.php' tabindex='7'>Sezione aziende</a></li>
                        <li><a href='AdminModAnnunci.php' tabindex='8'>Sezione annunci</a></li>
                    </ul>
                    </li>
                    <li><a href='logout.php' tabindex='9'> Esci </a></li>";
	    }
    else
        echo "<li><a href='login.php' tabindex='4'> Login </a></li>
            <li><a href='signin.php' tabindex='5'> Registrati </a>
                <ul>
                  <li><a href='CompanySignIn.php' tabindex='6'>Come Azienda</a></li>
                  <li><a href='UserSignIn.php' tabindex='7'>Come Utente</a></li>
                </ul>
            </li>";
	echo"
	</ul>";
}


function breadcrumb($pages){
    echo "<ul id='bc'>
            <li><a href='home.php'> <img class='icon' src='../IMG/home.svg' alt='Home' title='Home'/> </a></li>";
    for ($i = 0, $n = count($pages) ; $i < $n ; $i++)
    {
        echo "<li><a> $pages[$i]</a></li>";
    }
    echo "</ul>";
}

function footer() { 
    echo "
    <div id='footer'>
        <hr>
        <div id='link'>
            <ul> 
                <li><a href='sectionChiSiamo.php'>Chi siamo</a></li> 
                <li><a href='sectionPrivacy.php'>Privacy/Policy</a></li> 
                <li><a href='sectionTermCond.php'>Termini e condizioni</a></li> 
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
    </div>
    </div>"; 
} 
?>