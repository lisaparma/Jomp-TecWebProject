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

	if (window.pageYOffset > sticky+150) {
		header.classList.add("small");
	} else {
		header.classList.remove("small");
}

}