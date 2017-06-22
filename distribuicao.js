var app = angular.module("distribuicao", []); 

app.filter('realMoneyFormat', function () {
	return function (item) {
	var string = item.toString();
	var parts = string.split(".");
	var cents = "";
	var centsInit = parts[1];

	if(parts.length == 1){
		cents = "00";
		}else{
		switch(centsInit.length) {
			case 1:
			//window.alert(centsInit);
			cents = centsInit + "0";
			//window.alert(cents);
        break;
			default:
			//window.alert(centsInit);
			cents = centsInit.substring(0, 2);
		}
	}
	var algarismoArray = parts[0].split("");
	var loopParts = algarismoArray.length;
	var reverseAlgarismo = algarismoArray.reverse();
	var newStrig = "";
	//var cents = "";

	for (i = 0; i < loopParts; i++) { 
			//inclui o ponto para cada centena
			if (i%3 == 0 && i > 0){
			newStrig += '.';
			}
			newStrig += reverseAlgarismo[i];
		}
	var newStrigArray = newStrig.split("");
	var reverseNewString = newStrigArray.reverse();
	var finalString = reverseNewString.join("") +  ',' + cents;
    return finalString;
  };
});


app.controller("myCtrl", function($scope) {
		$scope.numParcelas = 60;
		$scope.anoInicio = 2017;
		$scope.mesInicio = '0';
		$scope.totalGeral = 0,00;
	
    $scope.calcRows = function () {
    	var Months = [
    		"jan","fev","mar","abr","mai","jun",
		"jul","ago","set", "out","nov","dez"
		];
		
		var loopCounter = $scope.numParcelas;
		var loopAno = $scope.anoInicio;
		var loopMes = $scope.mesInicio;
		var loopValor = parseFloat($scope.valorParcela);
		var isBreakMonth = true;
		var isBreakYear = false;
		var temp = [];
		var subtotalAng = [];
		counter = 12;
		i=0;
        $scope.orcArray = [];     
        var parcelasWhile = 0;
		var totalGeralLoop = 0;
		
		
	    while (parcelasWhile < $scope.numParcelas) {
			var subtotal = 0;
			subtotalAng = [];
			//calcula os meses
			for (mt = 0; mt < 12; mt++) {
			if (parcelasWhile == $scope.numParcelas){
				isBreakYear = true;
				}
			if (mt == loopMes ){
				isBreakMonth = false;
				}
			if (isBreakYear == true ){
				isBreakMonth = true;
				}
			if (isBreakMonth == false && isBreakYear == false){
				temp[Months[mt]] = loopValor;
				subtotal += parseFloat(loopValor);
				parcelasWhile ++ ;
					}else{
				temp[Months[mt]] = 0.00;
				}
				 
				
			}
		totalGeralLoop += parseFloat(subtotal);
		temp["total"] = parseFloat(subtotal);
				
		$scope.totalGeral = totalGeralLoop;
		//$scope.totalJan = parseFloat(totalJan);
		$scope.orcArray.push(
			{"ano":loopAno,
			"jan":Number(temp["jan"]),
			"fev":Number(temp["fev"]),
			"mar":Number(temp["mar"]),
			"abr":temp["abr"],
			"mai":temp["mai"],
			"jun":temp["jun"],
			"jul":temp["jul"],
			"ago":temp["ago"],
			"set":temp["set"],
			"out":temp["out"],
			"nov":temp["nov"],
			"dez":temp["dez"],
			"total":temp["jan"] + temp["fev"] + temp["mar"]
		});
			
	       
	    loopAno ++;
	    } 
	    
    }
       		
});