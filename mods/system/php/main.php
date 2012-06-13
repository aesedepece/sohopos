<nav id="system">
<ul id="settings">
	<span>Ajustes</span>
	<li id="environment"><a href="<? echo$this->app->s['r']; ?>system/environment">Ajustes de entorno</a></li>
</ul>
<ul id="admin">
	<span>Administración</span>
	<li id="sellers"><a href="<? echo$this->app->s['r']; ?>system/sellers">Vendedores</a></li>
</ul>
<ul id="about">
	<span>Acerca de</span>
	<li id="credits"><a href="<? echo$this->app->s['r']; ?>system/credits">Créditos</a></li>
	<li id="license"><a href="<? echo$this->app->s['r']; ?>system/license">Licencia</a></li>
</ul>
</nav>
<div id="panel">
	<?php $this->Import($this->tool); ?>
</div>
