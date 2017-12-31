<?php

function menuHome() {
	echo "<ul id='menu'>
	        <li><a href='sectionChiSiamo.php'> Chi siamo </a></li>";
    if(isset($_SESSION['login'])) {
        if(get_class($_SESSION['login'])=='Utente')
	        echo "<li><a href='UtDashboard.php'> Area personale </a></li>";
        else
            echo "<li><a href='AzDashboard.php'> Area personale </a></li>";
    }
    else
        echo "<li><a href='login.php'> Login </a></li>";
    echo "<li><a href='sectionAziendePartner.php'> Aziende partner </a></li>
	       <li><a href=''> Aree professionali </a></li>
	       </ul>" ;
}


function search() {
	echo "<div id='ricerca'> 
	        <form action='home.php' method='post'>
	            <fieldset id='fieldset'>
					<h2> Ricerca offerte </h2>

	                <div id='titolo'> 
	                    <label for='titolo'>Titolo:<br/></label>
	                    <input type='text' id='boxtitolo' name='Title' tabindex=''> <!--</input>-->
	                </div>

	                <div id='regione'> 
	                    <label for='citta'>Città:<br/></label>
	                    <input type='text' id='boxcitta' name='City' tabindex=''> <!--</input>-->
	                </div>

	                <div id='tipologia'> 
	                    <label for='titolo'>Tipologia:<br/></label>
	                    <select name='Type'>
                            <option value='all' selected> TUTTE ";
                            $result = mysqli_query(openDB(), "SELECT * FROM Tipo");
	                        while($row = $result->fetch_array(MYSQLI_ASSOC)) {
                                echo "<option value='".$row['CodLavoro']."'>".$row['Lavoro']."</option>";
                            }
                    echo" 
	                    </select>
	                </div>

	            <input type='submit' id='cerca' value='Cerca' tabindex='' name='cerca'>
	            </fieldset>

	        </form>
	    </div>" ;
    
    
    
    if(isset($_POST['cerca'])) {
    	$title = $_POST['Title'];
        $city=$_POST['City'];
        $type=$_POST['Type'];
        $plus1="";
        $plus2="";
        
        if($city)
            $plus1=" AND Aziende.Citta='$city'";
        if($type!='all')
            $plus2=" AND Annunci.Tipologia='$type'";
        
        $result = mysqli_query(openDB(), "SELECT * FROM Annunci JOIN Aziende ON Aziende.Nome=Annunci.Azienda WHERE Annunci.Descrizione LIKE '%$title%' $plus1 $plus2 ORDER BY Data DESC");
        
        
        if($result->num_rows) {
            echo "<div id='listannunci'>
                    <p>Risultati:</p>
                        <ul id='annunci'>";
                            while($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
                                echo "</br></br>
                                    <li id='fogli'>
                                        <div id='foglio'>
                                            <h3>".$row['Titolo']."</h3>
                                            <p>Pubblicato il: ".$row['Data']."</p>
                                            <p>Descrizione:<br/><p>".$row['Descrizione']."</p>
                                        </div>
                                    </li>
                                    </br>
                                    </br>";
            }	
            echo "</ul>
                    </div>" ;       
        }
        else {
            echo "Nessun annuncio corrispondente";
        }
        return false;
    }
    else
    return true;
}


//prende gli ultimi 5 annunci che sono stati inseriti nel database
function lastAds() {
	$result = mysqli_query(openDB(), "SELECT * FROM Annunci ORDER BY Data DESC LIMIT 5");

	if($result) {
		echo "<div id='listannunci'>
		    	<p>Aggiunti di recente:</p>
		    		<ul id='annunci'>";
		while($row = $result->fetch_array(MYSQLI_ASSOC)) {
			echo "</br></br>
                <li id='fogli'>
                    <div id='foglio'>
                        <h3>".$row['Titolo']."</h3>
						<p>Pubblicato il: ".$row['Data']."</p><br/>
						<p>Descrizione:<br/><p>".$row['Descrizione']."</p>
                    </div>
				</li>
                </br>
                </br>"
                ;
		}	
		echo "</ul>
    			</div>" ;       
	}
	else {
		echo "Ancora nessun annuncio è stato pubblicato";
	}
}

?>