<form id="login" method="POST" action="#">
	<img src="<?php echo$this->app->s['r']; ?>res/img/biglogo.png" alt="librePOS" id="logo" />
	<hr />
	<input type="text" name="user" id="user" placeholder="Nombre de usuario" /><br />
	<input type="password" name="pass" id="pass" placeholder="Contraseña" /><br />
	<span id="logerror">Error de inicio de sesión</span><br />
	<input type="submit" value="Entrar" />
	<hr />
	<p class="credits">
		© 2012 Adán Sánchez de Pedro Crespo. <br />
		This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version. <br />
	</p>
</form>
