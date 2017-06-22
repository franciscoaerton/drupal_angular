
<div  ng-controller="myCtrl">
	Parcelas: <input ng-model="numParcelas" ng-init="24" size="3" maxlength="3" min="1" max="240" type="number"></br>
	Valor: <input ng-model="valorParcela" type="number" ></br>
	Início MÊS-ANO:
		<select ng-model="mesInicio">
		<option value=0 selected>JAN</option>
		<option value=1>FEV</option>
		<option value=2>MAR</option>
		<option value=3>ABR</option>
		<option value=4>MAI</option>
		<option value=5>JUN</option>
		<option value=6>JUL</option>
		<option value=7>AGO</option>
		<option value=8>SET</option>
		<option value=9>OUT</option>
		<option value=10>NOV</option>
		<option value=11>DEZ</option>
		</select> 
	<input ng-model="anoInicio" size="4" maxlength="4" min="2000" max="2100"></br>
    <button ng-click="calcRows()">Calcular</button>
</br>
</br>
</br>
	<table class="displayNone" width="100%" border='1' cellPadding='1' cellSpacing='1'>
<tr>
<th class="tableWid tableHead"><b>ANO</th>
<th class="tableHead">JAN</th>
<th class="tableHead">FEV</th>
<th class="tableHead">MAR</th>
<th class="tableHead">ABR</th>
<th class="tableHead">MAI</th>
<th class="tableHead">JUN</th>
<th class="tableHead">JUL</th>
<th class="tableHead">AGO</th>
<th class="tableHead">SET</th>
<th class="tableHead">OUT</th>
<th class="tableHead">NOV</th>
<th class="tableHead">DEZ</th>
</tr>
<tr ng-repeat="t in orcArray">
	<td class="cellTable">{{t.ano}}</td>
	<td class="cellTable"><input type="number" class="clearInput" ng-model="orcArray[[$index]].jan"></td>
	<td class="cellTable"><input type="number" class="clearInput" ng-model="orcArray[[$index]].fev"></td> 
	<td class="cellTable"><input type="number" class="clearInput" ng-model="orcArray[[$index]].mar"></td>
	<td class="cellTable"><input type="number" class="clearInput" ng-model="orcArray[[$index]].abr"</td>
	<td class="cellTable"><input type="number" class="clearInput" ng-model="orcArray[[$index]].mai"</td>
	<td class="cellTable"><input type="number" class="clearInput" ng-model="orcArray[[$index]].jun"</td>
	<td class="cellTable"><input type="number" class="clearInput" ng-model="orcArray[[$index]].jul"</td>
	<td class="cellTable"><input type="number" class="clearInput" ng-model="orcArray[[$index]].ago"</td>
	<td class="cellTable"><input type="number" class="clearInput" ng-model="orcArray[[$index]].set"</td>
	<td class="cellTable"><input type="number" class="clearInput" ng-model="orcArray[[$index]].out"</td>
	<td class="cellTable"><input type="number" class="clearInput" ng-model="orcArray[[$index]].nov"</td>
	<td class="cellTable"><input type="number" class="clearInput" ng-model="orcArray[[$index]].dez"</td>
	</tr>
</table>
    </br>
	</br>
	<table width="100%" border='1' cellPadding='1' cellSpacing='1'>
<tr>
<th class="tableWid tableHead"><b>ANO</th>
<th class="tableHead"><b>JAN</th>
<th class="tableHead"><b>FEV</th>
<th class="tableHead"><b>MAR</th>
<th class="tableHead"><b>ABR</th>
<th class="tableHead"><b>MAI</th>
<th class="tableHead"><b>JUN</th>
<th class="tableHead"><b>JUL</th>
<th class="tableHead"><b>AGO</th>
<th class="tableHead"><b>SET</th>
<th class="tableHead"><b>OUT</th>
<th class="tableHead"><b>NOV</th>
<th class="tableHead"><b>DEZ</th>
<th class="tableHead"><b>TOTAL</th>
</tr>
<tr ng-repeat="t in orcArray">
	<td valign='bottom' align='center'><b>{{t.ano}}</td>
	<td align='center'>{{t.jan | realMoneyFormat }}</td>
	<td align='center'>{{t.fev | realMoneyFormat }}</td> 
	<td align='center'>{{t.mar | realMoneyFormat }}</td>
	<td align='center'>{{t.abr | realMoneyFormat }}</td>
	<td align='center'>{{t.mai | realMoneyFormat }}</td>
	<td align='center'>{{t.jun | realMoneyFormat }}</td>
	<td align='center'>{{t.jul | realMoneyFormat }}</td>
	<td align='center'>{{t.ago | realMoneyFormat }}</td>
	<td align='center'>{{t.set | realMoneyFormat }}</td>
	<td align='center'>{{t.out | realMoneyFormat }}</td>
	<td align='center'>{{t.nov | realMoneyFormat }}</td>
	<td align='center'>{{t.dez | realMoneyFormat }}</td>
	<td align='right'><b>{{t.jan + t.fev + t.mar + t.abr + t.mai + t.jun + t.jul + t.ago + t.set + t.out + t.nov + t.dez | realMoneyFormat}}</td>
</tr>
		
<tr class='cabecalho'>
		<td align='center' colspan = "13">&nbsp;</td>

<td align='right'><b>{{totalGeral | realMoneyFormat}}</td>
</tr>
	</table>
	</br></br>
	<table width='250px' border='1' cellPadding='1' cellSpacing='1'>
<tr>
	<td>
		NID ORÇAMENTO
	</td>
<td valign='bottom' align='center'><b>ANO</td>
<td align='right'><b>TOTAL</td>
</tr>
<tr ng-repeat="t in orcArray">
	<td valign='bottom' align='center'><b>{{t.ano}}</td>
	<td align='right'><b>{{t.total | realMoneyFormat}}</td>
</tr>
		
<tr class='cabecalho'>
		<td align='center' >&nbsp;</td>

<td align='right'><b>{{t.jan + t.fev + t.mar + t.abr + t.mai + t.jun + t.jul + t.ago + t.set + t.out + t.nov + t.dez | realMoneyFormat}}</td>
<td>
	<span> MINUTA X </span>
	<span> UPLOAD </span>
	<span> DELETE </span>
</td>
	</tr>
	</table>
	
	
</div>
