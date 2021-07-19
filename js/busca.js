function busca(){
let codBarra = document.getElementById('inputCodBarra').value;
		let xmlHttp = new XMLHttpRequest();
		let url = "http://localhost/lojaXimbole/buscarProd.php?codProd=" + codBarra; 
		xmlHttp.open("GET", url, true);

		xmlHttp.onreadystatechange = function(){
			if(this.readyState == 4 && this.status == 200){
				let resposta = this.responseText;
				console.log(resposta);
				montarResposta(resposta);
			}
		}

	xmlHttp.send();
}