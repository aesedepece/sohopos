<header>
	<a onclick="categoryShow(1);">
		Todos los productos <img src="<?php echo$this->app->s['r']; ?>res/img/icons/arrow.png" alt=">" />
	</a>
	<div class="route" id="cat1">
	</div>
</header>
<ul id="grid"></ul>
<script type="text/javascript">categoryShow(1);</script>
