<header id="topbar">
	<a href="<?php echo$this->app->s['r']; ?>" id="logo"><img src="<?php echo$this->app->s['r']; ?>res/img/logo.png" alt="librePOS" /></a>
	<nav>
		<ul>
			<li><a href="<?php echo$this->app->s['r']; ?>sales" id="navsales">VENTAS</a></li>
			<li><a href="<?php echo$this->app->s['r']; ?>management" id="navmanagement">GESTIÓN</a></li>
			<li><a href="<?php echo$this->app->s['r']; ?>system" id="navsystem">SISTEMA</a></li>
		</ul>
	</nav>
	<div id="context">
		<?php $this->Import("context"); ?>
	</div>
	<a href="<?php echo$this->app->s['r']; ?>session/exit" id="exit">Salir <img src="<?php echo$this->app->s['r']; ?>res/img/icons/exit.png" alt="→" /></a>
	<div id="session">
		<span id="clock"></span>
		<br />
		<span id="user"></span>
	</div>
</header>
