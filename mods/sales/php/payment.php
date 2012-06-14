<script type="text/javascript">
tool = "payment";

function payMethodChange(method){
	sales[curSale].payMethod = method;
	if(method=="cash"){
		$("body#sales > section#right > section#payment > div#cashTool").show();
	}
	else{
		$("body#sales > section#right > section#payment > div#cashTool").hide();
	}
	$("body#sales > section#right > section#payment > ul#payMethods > li#" + sales[curSale].payMethod).addClass("current").siblings().removeClass("current");
	if(sales[curSale].payed>=sales[curSale].total || method!="cash"){
		$("body#sales > section#right > section#payment > a#ok").show();
	}else{
		$("body#sales > section#right > section#payment > a#ok").hide();
	}
	salesSave();
}

function bnPay(button){
	if(sales[curSale].payed==undefined)sales[curSale].payed=0;
	sales[curSale].payed += (button.id/100);
	$("body#sales > section#right > section#payment > table#top td#payed > span").html(sales[curSale].payed.toFixed(2) + "€");
	$("body#sales > section#right > section#payment > table#top td#change > span").html((sales[curSale].payed-sales[curSale].total).toFixed(2) + "€");
	if(sales[curSale].payed>=sales[curSale].total || sales[curSale].payMethod!="cash"){
		$("body#sales > section#right > section#payment > a#ok").show();
	}else{
		$("body#sales > section#right > section#payment > a#ok").hide();
	}
	salesSave();
}

$(document).ready(function(){
	if(!sales[curSale].payMethod)payMethodChange("cash");
	if(sales[curSale].payMethod=="cash")$("body#sales > section#right > section#payment > div#cashTool").show();
	if(sales[curSale].payed>=sales[curSale].total || sales[curSale].payMethod!="cash"){
		$("body#sales > section#right > section#payment > a#ok").show();
	}else{
		$("body#sales > section#right > section#payment > a#ok").hide();
	}	
	$("body#sales > section#right > section#payment > ul#payMethods > li#" + sales[curSale].payMethod).addClass("current");
	$("body#sales > section#right > section#payment > ul#payMethods > li").click(function(){
		payMethodChange(this.id);
		$(this).addClass("current");
	});
	$("body#sales > section#right > section#payment > div#cashTool > ul#banknotes > li#exact").click(function(){
		this.id = sales[curSale].total*100;
		sales[curSale].payed = 0;
		bnPay(this);
	});
	$("body#sales > section#right > section#payment > table#top td#total").html(sales[curSale].total.toFixed(2) + "€");
	$("body#sales > section#right > section#payment > table#top td#payed > span").html(sales[curSale].payed.toFixed(2) + "€");
	$("body#sales > section#right > section#payment > table#top td#change > span").html((sales[curSale].payed-sales[curSale].total).toFixed(2) + "€");
});
</script>
<table id="top">
	<tr>
		<td id="total"></td>
		<td id="payed">Abonado: <span></span></td>
		<td id="change">Vuelta: <span></span></td>
	</tr>
</table>
<ul id="payMethods">
	<li id="cash">Efectivo</li>
	<li id="card">Tarjeta de débito</li>
	<li id="debt">A deber</li>
	<li id="cheque">Vale</li>
	<li id="free">Gratis</li>
</ul>
<div id="cashTool">
	<ul id="banknotes">
	<?php
		$banknotes = array(0.01, 0.02, 0.05, 0.1, 0.2, 0.5, 1, 2, 5, 10, 20, 50, 100, 200);
		foreach($banknotes as $banknote){
			echo "<li id=\"".($banknote*100)."\"onclick=\"bnPay(this);\">".$banknote."€</li>";
		}
	?>
		<li id="exact">EXACTO</li>
	</ul>
</div>
<a id="ok" onclick="saleEnd();"><img src="<?php echo $this->app->s['r']; ?>res/img/icons/tick.png" alt="→" /> Cerrar venta</a>
