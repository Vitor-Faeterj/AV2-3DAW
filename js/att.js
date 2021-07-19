function atualizar(){
let xmlHttp = new XMLHttpRequest();

	//Lê todos os valores!
	let codProd = document.getElementById('inputCodBarra').value;
	let nomeProd = document.getElementById('inputNomeProd').value;
	let fabricanteProd = document.getElementById('inputFabricanteProd').value;
	let categoria = document.getElementById('categoriaProd').value;
	let tipoProd = document.getElementById('inputProdTipo').value;
	let precoProd = document.getElementById('inputPrecoProd').value;
	let qtdEstoque = document.getElementById('inputQtdEstoque').value;
	let pesoProd = document.getElementById('inputPesoProd').value;
	let dataInclusao = document.getElementById('inputDataInclusao').value;

	let url = "http://localhost/lojaXimbole/atualizarProd.php?codProd="+codProd+"&nomeProd="+nomeProd+"&fabricante="+fabricanteProd+"&categoriaProd="+categoria+"&tipoProd="+tipoProd+"&precoProd="+precoProd+"&qtdEstoque="+qtdEstoque+"&pesoProd="+pesoProd+"&dataInclusao="+dataInclusao;

	xmlHttp.onreadystatechange = function() {

        if (this.readyState === 4 && this.status === 200) {
        	let resposta = this.responseText;
        	console.log('Resposta: ' + resposta);
        	alert(resposta);
        }
    };
    xmlHttp.open("GET", url, true);
    xmlHttp.send();
}