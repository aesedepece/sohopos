<?php 
session_start();
$s = $_SESSION['s'];
?>
<script type="text/javascript">
	tool = "stock";
	
	function Foo(){
	}
	
	var move = new Foo();
	
	function productShow(product){
		$("body#management > div#panel > form >  figure#product > figcaption").html(
			"<h1>" + product.name + "</h1>" + 
			"<h2>" + product.make + "</h2>"
		);
		$("body#management > div#panel > form >  figure#product > img").attr("src","<?php echo$s['r'] ?>img/products/" + product.id + ".jpg");
		$("body#management > div#panel > form >  figure#product").show();
	}

	function distributorsList(product){
		var distributors = distributorsGetFromProduct(product.id);
		move.distributors = distributors;
		var select = $("body#management > div#panel > form >  fieldset > select#distributor");
		select.empty();
		$.each(distributors, function(i){
			select.append("<option value=\"" + i + "\">" + this.name + "</option>");
		});
	}
	
	function save(){
		var form = new Foo();
		form.type = $("body#management > div#panel > form > fieldset > select#type").val();
		form.prod = move.product.id;
		form.units = $("body#management > div#panel > form > fieldset > input#units").val();
		form.freeunits = $("body#management > div#panel > form > fieldset > input#freeunits").val();
		form.dist = move.distributors[$("body#management > div#panel > form > fieldset > select#distributor").val()].id;
		form.pricebuy = $("body#management > div#panel > form > fieldset > input#pricebuy").val();
		form.pricesell = $("body#management > div#panel > form > fieldset > input#pricesell").val();
		form.expiry = $("body#management > div#panel > form > fieldset > input#expiry").val();
		$.post("<?php echo$s['r']; ?>units/move", { move: form }, function(data) {
 			 alert(data);
		});
	}

	$(document).ready(function(){
		var now = new Date();
		var day = now.getDate()
		var month  = now.getMonth();
		var year = now.getFullYear();
		$("body#management > div#panel > form > fieldset > input#date").val((day > 9 ? day : "0"+day) + "-" + (month > 9 ? month : "0"+month)  + "-" + year);
		$("body#management > div#panel > form > fieldset > select.static").change(function(){
			sessionStorage.setItem("management_" + this.id, this.value);
		});
		$("body#management > div#panel > form > fieldset > select.static").val(sessionStorage.getItem("management_type"));
		$("body#management > div#panel > form > fieldset > input#prod_code").keypress(function(e){
			if(e.keyCode == 13){
				e.preventDefault();
				res = productSearch('code', $(this).val())[0];
				if(res){
					move.product = res;
					productShow(move.product);
					distributorsList(move.product);
					$("body#management > div#panel > form > fieldset > select#distributor").change();
				}else alert("No se encontró tal producto");
			}
		});
		$("body#management > div#panel > form > fieldset > select#distributor").change(function(){
			$("body#management > div#panel > form > fieldset > input#pricebuy").val(move.distributors[this.value].pricebuy);
			$("body#management > div#panel > form > fieldset > input#pricesell").val((move.product.pricesell*(1+move.product.tax/100)).toFixed(2));
		});
		
		$("body#management > div#panel > form > fieldset > button.minus").click(function(e){
			e.preventDefault();
			var input = $(this).siblings('input');
			var cur = parseInt(input.val());
			var res = cur>input.attr('min') ? cur-1 : cur;
			input.val(res);
		});
		$("body#management > div#panel > form > fieldset > button.plus").click(function(e){
			e.preventDefault();
			var input = $(this).siblings('input');
			var cur = parseInt(input.val());
			var res = cur+1;
			input.val(res);
		});
	});
</script>
<h1>Movimiento de existencias</h1>
<form action="">
	<a id="ok" onclick="save();"><img src="<?php echo $this->app->s['r']; ?>res/img/icons/tick.png" alt="→" /> Guardar</a>
	<figure id="product">
		<img src="" alt="" />
		<figcaption></figcaption>
	</figure>
	<fieldset>
		<label for="date">Fecha</label>
		<input type="date" name="date" id="date" disabled/>
	</fieldset>
	<fieldset>
		<label for="type">Razón</label>
		<select name="type" id="type" class="static" required />
			<option value="in_buy">← Compra</option>
			<option value="in_back">← Devolución</option>
			<option value="in_trans">← Traspaso</option>
			<option value="out_sell">Venta →</option>
			<option value="out_back">Devolución →</option>
			<option value="out_broken">Rotura →</option>
			<option value="out_trans">Traspaso →</option>
		</select>
	</fieldset>
	<fieldset>
		<label for="prod_code">Producto</label>
		<input type="number" name="prod_code" id="prod_code" required autofocus />
	</fieldset>
	<fieldset>
		<label for="distributor">Distribuidor</label>
		<select name="distributor" id="distributor" required />
		</select>
	</fieldset>
	<fieldset>
		<label for="pricebuy">Precio/u</label>
		<input type="number" name="pricebuy" id="pricebuy" min="0" required />
	</fieldset>
	<fieldset>
		<label for="pricebuy">PVP</label>
		<input type="number" name="pricesell" id="pricesell" min="0" required />
	</fieldset>
	<fieldset>
		<label for="units">Unidades</label>
		<input type="number" name="units" id="units" value="1" min="1" step="1" required />
		<button class="qty minus">-</button>
		<button class="qty plus">+</button>
	</fieldset>
	<fieldset>
		<label for="freeunits">U. gratis</label>
		<input type="number" name="freeunits" id="freeunits" value="0" min="0" step="1" />
		<button class="qty minus">-</button>
		<button class="qty plus">+</button>
	</fieldset>
	<fieldset>
		<label for="expiry">Caducidad</label>
		<input type="date" name="expiry" id="expiry" />
	</fieldset>
</form>
