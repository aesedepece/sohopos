<nav id="management">
<ul id="humanres">
	<span>Recursos humanos</span>
	<li id="clients"><a href="<? echo$this->app->s['r']; ?>management/clients">Clientes</a></li>
	<li id="distributors"><a href="<? echo$this->app->s['r']; ?>management/distributors">Distribuidores</a></li>
</ul>
<ul id="store">
	<span>Almacén</span>
	<li id="products"><a href="<? echo$this->app->s['r']; ?>management/products">Productos</a></li>
	<li id="makes"><a href="<? echo$this->app->s['r']; ?>management/makes">Marcas</a></li>
	<li id="categories"><a href="<? echo$this->app->s['r']; ?>management/categories">Categorías</a></li>
	<li id="stock"><a href="<? echo$this->app->s['r']; ?>management/stock">Existencias</a></li>
	<li id="orders"><a href="<? echo$this->app->s['r']; ?>management/orders">Pedidos</a></li>
</ul>
<ul id="accounts">
	<span>Contabilidad</span>
	<li id="discounts"><a href="<? echo$this->app->s['r']; ?>management/discounts">Descuentos</a></li>
	<li id="taxes"><a href="<? echo$this->app->s['r']; ?>management/taxes">Impuestos</a></li>
</ul>
<ul id="informs">
	<span>Informes</span>
	<li id="i_sales"><a href="<? echo$this->app->s['r']; ?>management/isales">Ventas</a></li>
	<li id="i_stock"><a href="<? echo$this->app->s['r']; ?>management/istock">Existencias</a></li>
	<li id="i_clients"><a href="<? echo$this->app->s['r']; ?>management/iclients">Clientes</a></li>
</ul>
</nav>
<div id="panel">
	<?php $this->Import($this->tool); ?>
</div>
