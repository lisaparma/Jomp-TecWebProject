<?php

function head($title) {
	echo "<!DOCTYPE html>

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
            <body onLoad='whereIam();' onscroll='reduceHeader();'>";
}

function headers() {
    echo "<div id='header'>
            <div id='fascia'>
            <a href='home.php'>
                <img id='logo' src='../IMG/jomp2.png' alt='logo scritta jomp con lente d&rsquo;ingrandimento'>
            </a>
            <div id='primarymenu'>"; 
                primaryMenu(); 
    echo "</div> 
            <div id='hamburger' onClick='menuHamburger();'> <img src='../IMG/hamburger.svg' alt='menu'/> 
            </div>
            </div>
            <div id='mobilemenu'>"; 
                primarymenu(); 
     echo" </div> 
        </div>
     <div id='page'>";
}

function primaryMenu(){ 
	echo "<ul>
              <li><a href='home.php'>Home </a></li>
			  <li><a href='sectionChiSiamo.php'>Chi siamo</a></li>
			  <li><a href='sectionAziendePartner.php'>Aziende partner</a> </li>";
	if(isset($_SESSION['login'])) {
	        if(get_class($_SESSION['login'])=='Utente')
		        echo "<li><a href='UtDashboard.php'> Area personale </a>
                    <ul>
                        <li><a href='UtDashboard.php'>Dashboard</a></li>
                        <li><a href='UtCercaAnnuncio.php'>Cerca annuncio</a></li>
                        <li><a href='UtAnnunciSalvati.php'>Annunci salvati</a></li>
                        <li><a href='UtModificaDati.php'>Modifica dati</a></li>
                    </ul>
                    </li>
	                <li><a href='logout.php'> Esci </a></li>";
	        if(get_class($_SESSION['login'])=='Azienda')
	            echo "<li><a href='AzDashboard.php'> Area personale </a>
                    <ul>
                        <li><a href='AzDashboard.php'>Dashboard</a></li>
                        <li><a href='AzPubblicaAnnuncio.php'>Pubblica annuncio</a></li>
                        <li><a href='AzResocontoAnnunci.php'>Resoconto Annunci</a></li>
                        <li><a href='AzModificaDati.php'>Modifica dati</a></li>
                    </ul>
                    </li>
	                <li><a href='logout.php'> Esci </a></li>";
            if(get_class($_SESSION['login'])=='Admin')
                echo "<li><a href='AzDashboard.php'> Area personale </a>
                    <ul>
                        <li><a href='AdminDashboard.php'>Dashboard</a></li>
                        <li><a href='AdminModUtenti.php'>Sezione utenti</a></li>
                        <li><a href='AdminModAziende.php'>Sezione aziende</a></li>
                        <li><a href='AdminModAnnunci.php'>Sezione annunci</a></li>
                    </ul>
                    </li>
                    <li><a href='logout.php'> Esci </a></li>";
	    }
    else
        echo "<li><a href='login.php'> Login </a></li>
            <li><a href='signin.php'> Registrati </a>
                <ul>
                  <li><a href='CompanySignIn.php'>Come Azienda</a></li>
                  <li><a href='UserSignIn.php'>Come Utente</a></li>
                </ul>
            </li>";
	echo"
	</ul>";
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
    echo "
    <div id='footer'>
        <hr>
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
    </div>
    </div>"; 
} 
?>