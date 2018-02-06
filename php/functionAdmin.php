<?php


function menu($page) {
	echo"<div class='container-menu'>
	        <ul class='ap-menu'>
	            <li> "; 
                if($page === 'Dashboard') 
                       echo "<a id='this'> 
                                <img class='logo' src='../IMG/dashboard.svg'>
					           <p>Dashboard</p>
                            </a>
                       </li>"; 
                   else 
                       echo "<a href='AdminDashboard.php'>
                                <img class='logo' src='../IMG/dashboard.svg'>
					           <p>Dashboard</p>
                            </a>
                       </li>"; 
    
	            echo"<li>";
                if($page === 'Sezione Utenti') 
                       echo "<a id='this'> 
                            <img class='logo' src='../IMG/annunci.svg'>
					           <p>Sezione Utenti</p>
                            </a>
                       </li>"; 
                   else 
                       echo "<a href='AdminModUtenti.php'> 
                                <img class='logo' src='../IMG/annunci.svg'>
					           <p>Sezione Utenti</p>
                            </a>
                       </li>"; 
    
	            echo "<li>";
                if($page === 'Sezione Aziende') 
                       echo "<a id='this'> 
                                <img class='logo' src='../IMG/list.svg'>
					           <p>Sezione Aziende</p>
                            </a>
                       </li>"; 
                   else 
                       echo "<a href='AdminModAziende.php'> 
                                <img class='logo' src='../IMG/list.svg'>
					           <p>Sezione Aziende</p>
                            </a>
                       </li>"; 
   
	            echo "<li>";
                if($page === 'Sezione Annunci') 
                       echo "<a id='this'> 
                                <img class='logo' src='../IMG/edit.svg'>
					           <p>Sezione Annunci</p>
                            </a>
                       </li>"; 
                   else 
                       echo "<a href='AdminModAnnunci.php'> 
                                <img class='logo' src='../IMG/edit.svg'>
					           <p>Sezione Annunci</p>
                            </a>
                       </li>"; 
	            echo "
                    </ul>
	    </div>";
}
    

//returns the number of the registered users
function registeredUsers() {
    $result = mysqli_query(openDB(),"SELECT Email FROM Utenti");
       
    $num_rows = mysqli_num_rows($result);
  
    return $num_rows; 
}


//returns the number of the registered companies
function registeredCompanies() {
    $result = mysqli_query(openDB(),"SELECT Email FROM Aziende");
       
    $num_rows = mysqli_num_rows($result);
  
    return $num_rows; 
}


//returns number of the published adds
function publishedAdds() {
    $result = mysqli_query(openDB(),"SELECT Codice FROM Annunci");
       
    $num_rows = mysqli_num_rows($result);
  
    return $num_rows;
}
?>