var app = angular.module("teste_angularjs", []); 

app.filter('realMoneyFormat', function () {
	return function (item) {
		if (item === undefined) {
	return 0;
		}
	console.log(" log "+item);
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
        window.alert(cents);
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

////
app.controller("myCtrl", function($scope, $http) {
	//var angulaNidOrc = 5994;
	var urlBrowser = window.location.href;
	//window.alert(urlBrowser);
	var parts = urlBrowser.split("/");
	var angulaNidOrc = parts[5];
	
	console.log(parts[5]);
	
	
	
	
	var url = "/../../../node.json?type=distribuicao_orcamento&field_nid_disorc=" + angulaNidOrc;
	//var url = "http://a.sig.adm.br/node.json?type=distribuicao_orcamento&field_nid_disorc=5994";
	var orc = [];
	$scope.totalGeral = 0.00
	$scope.orcArray = [];
	$http.get(url)
    .then(function(response) {
		
		//var arrayDruapal = JSON.stringify(response.data.list);
		var arrayDruapal = response.data.list;
		//window.alert("item:" + arrayDruapal);
		//window.alert("Length:" + response.data.list.length);
		var loopLength = response.data.list.length;
		var totalLoop = 0;
		
		for (var i = 0; i < loopLength; i++) {
			
			//window.alert("item:" + arrayDruapal[i].field_ano_disorc);
		  //console.log(i);
		  
		  totalLoop = Number(arrayDruapal[i].field_total_disorc);
		  //window.alert("total:" + i + " >> "+totalLoop);
		  if (!isNaN(totalLoop)){
		  $scope.totalGeral += $scope.totalGeral + 0.00 + Number(totalLoop);
		  }
		  $scope.orcArray.push(
			{"ano":arrayDruapal[i].field_ano_disorc,
			"jan":arrayDruapal[i].field_jan_disorc,
			"fev":arrayDruapal[i].field_fev_disorc,
			"mar":arrayDruapal[i].field_mar_disorc,
			"abr":arrayDruapal[i].field_abr_disorc,
			"mai":arrayDruapal[i].field_mai_disorc,
			"jun":arrayDruapal[i].field_jun_disorc,
			"jul":arrayDruapal[i].field_jul_disorc,
			"ago":arrayDruapal[i].field_ago_disorc,
			"set":arrayDruapal[i].field_set_disorc,
			"out":arrayDruapal[i].field_out_disorc,
			"nov":arrayDruapal[i].field_nov_disorc,
			"dez":arrayDruapal[i].field_dez_disorc,
			"total":arrayDruapal[i].field_total_disorc
			
		});
		 
		  
		  
		  
		  
		  
		  
		  
		}
			
		var myJSON = JSON.stringify(response.data);
		//var myJSON[];
		//var counter = myJSON.length;
		//window.alert("Resultado:" + counter);
		
		//window.alert("Resultadommmmmm:" + response.data.list[0].field_jan_disorc);
		//console.log(response.data); 

		
		//window.alert("beta" );
        //$scope.content = "content  >>" + JSON.stringify($scope.orcArray); 
        //$scope.statuscode = "statuscode  >>" +response.data;
        //$scope.statustext = "statustext  >>" +response.statustext; 
    });
 });  
 ////
 
 
