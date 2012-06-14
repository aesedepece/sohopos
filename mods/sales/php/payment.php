<script type="text/javascript">
tool = "payment";

function payMethodChange(method){
	sales[curSale].payMethod = method;
	if(method=="cash"){
		$("body#sales > section#right > section#payment > ul#payMethods > div#cashTool")
	}
}

$(document).ready(function(){
	if(!sales[curSale].payMethod)payMethodChange("cash");
	$("body#sales > section#right > section#payment > ul#payMethods > li#" + sales[curSale].payMethod).addClass("current");
	$("body#sales > section#right > section#payment > ul#payMethods > li").click(function(){
		payMethodChange(this.id);
		$(this).addClass("current");
	});
	$("body#sales > section#right > section#payment > span#total").html(sales[curSale].total.toFixed(2) + "€");
});
</script><h1>Pago</h1>
<span id="total"></span>
<ul id="payMethods">
	<li id="cash">Al contado</li>
	<li id="card">Tarjeta de débito</li>
	<li id="debt">A deber</li>
	<li id="cheque">Vale</li>
	<li id="free">Gratis</li>
</ul>
<div id="cashTool">
	<ul id="banknotes">
	<?php
		$banknotes = array(0.01, 0.02, 0.05, 0.1, 0.2, 0.5, 1, 2, 5, 10, 20, 50, 100, 200, 500);
		foreach($banknotes as $banknote){
			echo "<li>".$banknote."€</li>";
		}
	?>
	</ul>
</div>
