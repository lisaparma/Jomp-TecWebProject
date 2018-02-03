function whereIam() {
	var lista = document.getElementsByTagName("li");
	for(i=0; i < lista.length; i++) {
		var el = lista.item(i).firstElementChild;
		if(el.href == document.URL){
	    	lista.item(i).classList.add("here");
		}
	}
}


function reduceHeader(){
	var header = document.getElementById("header");
	var sticky = header.offsetTop;

	if (window.pageYOffset > sticky+50) {
		header.classList.add("small");
	} else {
		header.classList.remove("small");
}

}

// Convalida form registrazione

function checkName() {
	var valido = false;
	if(!document.getElementById("nome").value) {
		// elemento da inserire da inserire 
		var err = document.createElement("p");
		err.innerHTML = "<div id='errNom' class='errorForm'> Inserire dato</div>";

		var list = document.getElementById("listImp");
		var errPrec = document.getElementById("errNom");
		if(!errPrec){ // se ho già segnato errore ...
			var qui = document.getElementById("nome");
			list.insertBefore(err, qui)
		}
	}
	else { // se è giusto e ho l'errore...
		var list = document.getElementById("listImp");
		var errPrec = document.getElementById("errNom");
		if(errPrec){ 
			errPrec.parentNode.removeChild(errPrec);

		}
		valido = true;
	}

}

function checkSurname() {
	var valido = false;
	if(!document.getElementById("cognome").value) {
		// elemento da inserire da inserire 
		var err = document.createElement("p");
		err.innerHTML = "<div id='errCog' class='errorForm'> Inserire dato</div>";

		var list = document.getElementById("listImp");
		var errPrec = document.getElementById("errCog");
		if(!errPrec){ // se ho già segnato errore ...
			var qui = document.getElementById("cognome");
			list.insertBefore(err, qui)
		}
	}
	else { // se è giusto e ho l'errore...
		var list = document.getElementById("listImp");
		var errPrec = document.getElementById("errCog");
		if(errPrec){ 
			errPrec.parentNode.removeChild(errPrec);

		}
		valido = true;
	}

}

function checkEmail() {
	var valido = false;
	var ExpReg = /[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$/;
	if(!ExpReg.test(document.getElementById("email").value)) {
		// elemento da inserire da inserire 
		var err = document.createElement("p");
		err.innerHTML = "<div id='errEm' class='errorForm'> Formato e-mail non valido</div>";

		var list = document.getElementById("listImp");
		var errPrec = document.getElementById("errEm");
		if(!errPrec){ // se ho già segnato errore ...
			var qui = document.getElementById("email");
			list.insertBefore(err, qui)
		}
	}
	else { // se è giusto e ho l'errore...
		var list = document.getElementById("listImp");
		var errPrec = document.getElementById("errEm");
		if(errPrec){ 
			errPrec.parentNode.removeChild(errPrec);

		}
		valido = true;
	}

}

function checkUsername() {
	var valido = false;
	if(!document.getElementById("username").value) {
		// elemento da inserire da inserire 
		var err = document.createElement("p");
		err.innerHTML = "<div id='errSN' class='errorForm'> Inserire dato</div>";

		var list = document.getElementById("listImp");
		var errPrec = document.getElementById("errSN");
		if(!errPrec){ // se ho già segnato errore ...
			var qui = document.getElementById("username");
			list.insertBefore(err, qui)
		}
	}
	else { // se è giusto e ho l'errore...
		var list = document.getElementById("listImp");
		var errPrec = document.getElementById("errSN");
		if(errPrec){ 
			errPrec.parentNode.removeChild(errPrec);

		}
		valido = true;
	}

}

function checkPassword() {
	var valido = false;
	var pass = document.getElementById("password").value;
	if(!pass || pass.length <8 ) {
		// elemento da inserire da inserire 
		var err = document.createElement("p");
		if(!pass)
			err.innerHTML = "<div id='errPa' class='errorForm'> Inserire dato</div>";
		else {
			err.innerHTML = "<div id='errPa' class='errorForm'> Password troppo corta! Minimo 8 caratteri</div>";
		}

		var list = document.getElementById("listImp");
		var errPrec = document.getElementById("errPa");
		if(!errPrec){ // se non ho già segnato errore ...
			var qui = document.getElementById("password");
			list.insertBefore(err, qui)
		}
		else {
			errPrec.parentNode.removeChild(errPrec);
			var qui = document.getElementById("password");
			list.insertBefore(err, qui)
		}
	}
	else { // se è giusto e ho l'errore...
		var list = document.getElementById("listImp");
		var errPrec = document.getElementById("errPa");
		if(errPrec){ 
			errPrec.parentNode.removeChild(errPrec);

		}
		valido = true;
	}

}

function checkRipPassword() {
var valido = false;
	var pass = document.getElementById("rippw").value;
	if(!pass || pass != document.getElementById("password").value) {
		// elemento da inserire da inserire 
		var err = document.createElement("p");
		if(!pass)
			err.innerHTML = "<div id='errRP' class='errorForm'> Inserire dato</div>";
		else {
			err.innerHTML = "<div id='errRP' class='errorForm'> La password immessa è diversa da quella precedente</div>";
		}

		var list = document.getElementById("listImp");
		var errPrec = document.getElementById("errRP");
		if(!errPrec){ // se non ho già segnato errore ...
			var qui = document.getElementById("rippw");
			list.insertBefore(err, qui)
		}
		else {
			errPrec.parentNode.removeChild(errPrec);
			var qui = document.getElementById("rippw");
			list.insertBefore(err, qui)
		}
	}
	else { // se è giusto e ho l'errore...
		var list = document.getElementById("listImp");
		var errPrec = document.getElementById("errRP");
		if(errPrec){ 
			errPrec.parentNode.removeChild(errPrec);

		}
		valido = true;
	}

}

function validateForm() {
	if(checkEmail() & checkName() & checkSurname() & checkUsername() & checkPassword() & checkRipPassword())
			return true;
	else 
		return false;

    
}