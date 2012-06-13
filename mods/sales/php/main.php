<section id="left">
	<section id="articles">
		<table>
			<thead>
				<tr>
					<th class="article">Artículo</th>
					<th>Precio</th>
					<th>Cant.</th>
					<th>Impuestos</th>
					<th>Importe</th>
				</tr>
			</thead>
			<tbody>
			</tbody>
		</table>
	</section>
	<section id="sumpad">
		<section id="sum">
			<div id="subtotal" class="l"><span class="label">Subtotal</span><span class="value"></span></div>
			<div id="taxes" class="l"><span class="label">Impuestos</span><span class="value"></span></div>
			<div id="total" class="r"><span class="label">Total</span><span class="value"></span></div>
		</section>
		<section id="pad">
			<table id="nums">
				<tr><td colspan="2">CE</td><td>*</td><td>-</td></tr>
				<tr><td>7</td><td>8</td><td>9</td><td rowspan="2">+</td></tr>
				<tr><td>4</td><td>5</td><td>6</td></tr>
				<tr><td>1</td><td>2</td><td>3</td><td rowspan="2">=</td></tr>
				<tr><td colspan="2">0</td><td>.</td></tr>
			</table>
			<ul>
				<li id="butpayment" onclick="pay();">Pago</li>
				<li id="butprint" onclick="ticketPrint();">Imprimir</li>
				<li id="butopendrawer" onclick="drawerOpen();">Abrir cajón</li>
				<li id="butclients" onclick="clientChange();">Clientes<span class="label"></span></li>
				<li id="butdiscounts" onclick="discountChange();">Descuentos<span class="label"></span></li>
			</ul>
		</section>
	</section>
</section>
<section id="right">
	<?php
		echo"<section id=\"".$this->tool."\">";
		$this->Import($this->tool);
		echo"\n\t</section>";
	?>
	
</section>
