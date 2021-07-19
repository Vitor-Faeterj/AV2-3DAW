function remover() {
	
	let codBarra = document.getElementById('inputCodBarra').value;
	let url = "http://localhost/lojaXimbole/removeProd.php?codBarra=" + codBarra;

	let xmlHttp = new XMLHttpRequest();
	xmlHttp.open("GET", url, true);

	xmlHttp.onreadystatechange = function(){

		if(this.readyState === 4 && this.status === 200){
			let resposta = this.responseText;
        	console.log('Resposta: ' + resposta);
        	alert(resposta);
		}
	}

	xmlHttp.send();
}