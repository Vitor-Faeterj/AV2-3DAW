function redirecionar(op){

	switch(op){

			case 'adc':
				window.location.href = "/lojaXimbole/view/adcProd.html";
			break;
			case 'rem':
				window.location.href = "/lojaXimbole/view/remProd.html";
			break;
			case 'lis':
				window.location.href = "/lojaXimbole/view/lisProd.html";
			break;
			case 'bus':
				window.location.href = "/lojaXimbole/view/busProd.html";
			break;
			case 'att':
				window.location.href = "/lojaXimbole/view/attProd.html";
			break;
			case 'hom':
				window.location.href = "/lojaXimbole/view/landingPage.html";
			break;
		}
}