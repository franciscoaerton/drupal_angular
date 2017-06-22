<div  ng-controller="myCtrl">

<p ng-bind="statuscode"></p>
<p ng-bind="statustext"></p>
<p ng-bind="content"></p>

<table width='100%' border='1' cellPadding='1' cellSpacing='1'>
<tr>
<th valign='bottom' align='center'><b>ANO</th>
<th align='center'><b>JAN</th>
<th align='center'><b>FEV</th>
<th align='center'><b>MAR</th>
<th align='center'><b>ABR</th>
<th align='center'><b>MAI</th>
<th align='center'><b>JUN</th>
<th align='center'><b>JUL</th>
<th align='center'><b>AGO</th>
<th align='center'><b>SET</th>
<th align='center'><b>OUT</th>
<th align='center'><b>NOV</th>
<th align='center'><b>DEZ</th>
<th align='right'><b>TOTAL</th>
</tr>
<tr ng-repeat="t in orcArray">
	<td valign='bottom' align='center'><b>{{t.ano}}</td>
	<td align='center'>{{t.jan | realMoneyFormat}}</td>
	<td align='center'>{{t.fev | realMoneyFormat}}</td>
	<td align='center'>{{t.mar | realMoneyFormat}}</td>
	<td align='center'>{{t.abr | realMoneyFormat}}</td>
	<td align='center'>{{t.mai | realMoneyFormat}}</td>
	<td align='center'>{{t.jun | realMoneyFormat}}</td>
	<td align='center'>{{t.jul | realMoneyFormat}}</td>
	<td align='center'>{{t.ago | realMoneyFormat}}</td>
	<td align='center'>{{t.set | realMoneyFormat}}</td>
	<td align='center'>{{t.out | realMoneyFormat}}</td>
	<td align='center'>{{t.nov | realMoneyFormat}}</td>
	<td align='center'>{{t.dez | realMoneyFormat}}</td>
	<td align='right'><b>{{t.total | realMoneyFormat}}</td>
</tr>
		
<tr class='cabecalho'>
		<td align='center' colspan = "13">&nbsp;</td>

<td align='right'><b>{{totalGeral | realMoneyFormat}}</td>
</tr>
	</table>
    </br>
	</br>
	
	<table width='250px' border='1' cellPadding='1' cellSpacing='1'>
<tr>
<td valign='bottom' align='center'><b>ANO</td>
<td align='right'><b>TOTAL</td>
</tr>
<tr ng-repeat="t in orcArray">
	<td valign='bottom' align='center'><b>{{t.ano}}</td>
	<td align='right'><b>{{t.total | realMoneyFormat}}</td>
</tr>
		
<tr class='cabecalho'>
		<td align='center' >&nbsp;</td>

<td align='right'><b>{{totalGeral | realMoneyFormat}}</td>
</tr>
	</table>
	
</div>