
<?php

function head($title)
{
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
			    <link href='../css/print.css' rel='stylesheet' type='text/css' media='print'/>
			    
			    <link href='../IMG/job.png' rel='icon' type='image/x-icon'/>
			    <link href='../IMG/job.png' rel='shortcut icon' type='image/x-icon'/>
			    
			</head>";
}




function headers()
{
	echo "<div id='header'>
	        <div id='box'>
	            <p class='button' id='login'>  <a href='login.php'>Log In</a> </p>
	            <p class='button' id='signin'> <a href='signin.php'>Sign In</a></p>
	        </div>
	        
	        <a href='home.php'>
	            <img id='logo' src='../IMG/jomp.png' alt='logo scritta jomp con lente d&rsquo;ingrandimento'>
	        </a>
	        
	        <h1> A jump in the job</h1>

	    </div>" ;
}




function footer()
{
	echo "<div id='footer'> 
        <p> Questo è il footer, ci scriverò qualcosa di sensato un giorno.</p>
    </div>" ;
}

?>