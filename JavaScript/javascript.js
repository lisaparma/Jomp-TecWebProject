// Funzione per evidenziare nel menù dove sono
function whereIam() {
	var menu = document.getElementById("header");
	var lista = menu.getElementsByTagName("li");
	for(i=0; i < lista.length; i++) {
		var el = lista.item(i).firstElementChild;
		if(el.href == document.URL){
	    	lista.item(i).classList.add("here");
		}
	}
}

// Funzione per rimpicciolire l'header allo scroll della pagina 
function reduceHeader(){
	var header = document.getElementById("fascia");
	var sticky = header.offsetTop;

	if (window.pageYOffset > sticky+50) {
		header.classList.add("small");
	} else {
		header.classList.remove("small");
}

}

// Convalida form registrazione utenti
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
			list.insertBefore(err, qui);
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
	return valido;
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
			list.insertBefore(err, qui);
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
	return valido;
}

function checkDate() {
	var valido = false;
	var ExpReg = /^[0-9]{4}\-[0-9]{1,2}\-[0-9]{1,2}/;
	if(!ExpReg.test(document.getElementById("date").value) || !document.getElementById("date").value) {
		// elemento da inserire da inserire 
		var err = document.createElement("p");
		if(!document.getElementById("date").value)
			err.innerHTML = "<div id='errDa' class='errorForm'> Inserire dato";
		else 
			err.innerHTML = "<div id='errDa' class='errorForm'> Formato data non valido! <br/> Deve essere del tipo: AAAA-MM-GG</div>";

		var list = document.getElementById("listImp");
		var errPrec = document.getElementById("errDa");
		if(!errPrec){
			var qui = document.getElementById("date");
			list.insertBefore(err, qui);
		}
		else {
			errPrec.parentNode.removeChild(errDa);
			var qui = document.getElementById("date");
			list.insertBefore(err, qui);
		}
	}
	else { // se è giusto e ho l'errore...
		var list = document.getElementById("listImp");
		var errPrec = document.getElementById("errDa");
		if(errPrec){ 
			errPrec.parentNode.removeChild(errPrec);
		}
		valido = true;
	}
	return valido;
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
			list.insertBefore(err, qui);
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
	return valido;
}

function checkUsername() {
	var valido = false;
	if(!document.getElementById("username").value || document.getElementById("username").value.length<5 || document.getElementById("username").value.length>15) {
		// elemento da inserire da inserire 
		var err = document.createElement("p");
		if(!document.getElementById("username").value) 
			err.innerHTML = "<div id='errSN' class='errorForm'> Inserire dato</div>";
		else
			err.innerHTML = "<div id='errSN' class='errorForm'> L'username deve essere lugo dai 5 ai 15 caratteri.</div>";
		
		var list = document.getElementById("listImp");
		var errPrec = document.getElementById("errSN");
		if(!errPrec){ // se non ho già segnato errore ...
			var qui = document.getElementById("username");
			list.insertBefore(err, qui);
		}
		else {
			errPrec.parentNode.removeChild(errPrec);
			var qui = document.getElementById("username");
			list.insertBefore(err, qui);
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
	return valido;
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
		if(!errPrec){ 
			var qui = document.getElementById("password");
			list.insertBefore(err, qui)
		}
		else {
			errPrec.parentNode.removeChild(errPrec);
			var qui = document.getElementById("password");
			list.insertBefore(err, qui);
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
	return valido;
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
			list.insertBefore(err, qui);
		}
		else {
			errPrec.parentNode.removeChild(errPrec);
			var qui = document.getElementById("rippw");
			list.insertBefore(err, qui);
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
	return valido;
}

function validateForm() {
	if(checkEmail() & checkName() & checkSurname() & checkUsername() & checkPassword() & checkRipPassword() &&checkDate())
		return true;
	else 
		return false;
}

// Validazione form registrazione aziende

function checkPiva() {
	var valido = false;
	var pIva = document.getElementById("pIva").value;
	var ExpReg = /[0-9]$/;
	if(!pIva || pIva.length != 11 || !ExpReg.test(pIva)) {
		// elemento da inserire da inserire 
		var err = document.createElement("p");
		if(!pIva)
			err.innerHTML = "<div id='errPI' class='errorForm'> Inserire dato</div>";
		else {
			err.innerHTML = "<div id='errPI' class='errorForm'> Deve contenere esattamente 11 cifre</div>";
		}

		var list = document.getElementById("listImp");
		var errPrec = document.getElementById("errPI");
		if(!errPrec){ // se non ho già segnato errore ...
			var qui = document.getElementById("pIva");
			list.insertBefore(err, qui);
		}
		else {
			errPrec.parentNode.removeChild(errPrec);
			var qui = document.getElementById("pIva");
			list.insertBefore(err, qui);
		}
	}
	else { // se è giusto e ho l'errore...
		var list = document.getElementById("listImp");
		var errPrec = document.getElementById("errPI");
		if(errPrec){ 
			errPrec.parentNode.removeChild(errPrec);
		}
		valido = true;
	}
	return valido;
}

function checkSito() {
	var valido = false;
	var ExpReg = /^www+\.[a-z0-9.-]+\.[a-z]{2,3}$/;
	if(!ExpReg.test(document.getElementById("sito").value)) {
		// elemento da inserire da inserire 
		var err = document.createElement("p");
		err.innerHTML = "<div id='errSi' class='errorForm'> Formato sito web non valido</div>";

		var list = document.getElementById("listImp");
		var errPrec = document.getElementById("errSi");
		if(!errPrec){ // se non ho già segnato errore ...
			var qui = document.getElementById("sito");
			list.insertBefore(err, qui);
		}
	}
	else { // se è giusto e ho l'errore...
		var list = document.getElementById("listImp");
		var errPrec = document.getElementById("errSi");
		if(errPrec){ 
			errPrec.parentNode.removeChild(errPrec);
		}
		valido = true;
	}
	return valido;
}

function checkCitta() {
	var valido = false;
	if(!document.getElementById("city").value) {
		// elemento da inserire da inserire 
		var err = document.createElement("p");
		err.innerHTML = "<div id='errCi' class='errorForm'> Inserire dato</div>";

		var list = document.getElementById("listImp");
		var errPrec = document.getElementById("errCi");
		if(!errPrec){ // se non ho già segnato errore ...
			var qui = document.getElementById("city");
			list.insertBefore(err, qui);
		}
	}
	else { // se è giusto e ho l'errore...
		var list = document.getElementById("listImp");
		var errPrec = document.getElementById("errCi");
		if(errPrec){ 
			errPrec.parentNode.removeChild(errPrec);
		}
		valido = true;
	}
	return valido;
}

function checkDesc() {
	var valido = false;
	var desc = document.getElementById("description").value;
	if(!desc || desc.length > 1000 ) {
		// elemento da inserire da inserire 
		var err = document.createElement("p");
		if(!desc)
			err.innerHTML = "<div id='errDe' class='errorForm'> Inserire dato</div>";
		else {
			err.innerHTML = "<div id='errDe' class='errorForm'> Inserire massimo 1000 caratteri</div>";
		}

		var list = document.getElementById("listImp");
		var errPrec = document.getElementById("errDe");
		if(!errPrec){ // se non ho già segnato errore ...
			var qui = document.getElementById("description");
			list.insertBefore(err, qui);
		}
		else {
			errPrec.parentNode.removeChild(errPrec);
			var qui = document.getElementById("description");
			list.insertBefore(err, qui);
		}
	}
	else { // se è giusto e ho l'errore...
		var list = document.getElementById("listImp");
		var errPrec = document.getElementById("errDe");
		if(errPrec){ 
			errPrec.parentNode.removeChild(errPrec);
		}
		valido = true;
	}
	return valido;
}

function validateFormCompany() {
	if(checkEmail() & checkName() & checkPassword() & checkRipPassword() & checkPiva() & checkSito() & checkCitta() & checkDesc())
		return true;
	else 
		return false;
}



