<?php
session_start();
$s = $_SESSION['s'];
?>
<script type="text/javascript">
	tool = "environment";
	function save(){
		$("body#system > div#panel > form > fieldset > input").each(function(){
			$.post("<?php echo$s['r']; ?>settings/update", {key: this.id, value: this.value});
		});
		alert("Operación realizada con éxito");
		window.location.reload();
	}
</script>
<h1>Variables de entorno</h1>
<form action="">
	<a id="ok" onclick="save();"><img src="<?php echo $this->app->s['r']; ?>res/img/icons/tick.png" alt="→" /> Guardar</a>
	<p>Edita los valores que quieras cambiar y luego pulsa en guardar. <br />No toques nada si no sabes lo que haces, podrías estropear el programa.</p>
	<br />
<?php
	$sql = mysql_query("SELECT `key`, value, comment FROM settings", $this->app->db);
	while($set = mysql_fetch_assoc($sql)){
		echo"<fieldset>
				<label for=\"".$set['key']."\">".$set['key']."</label>
				<input type=\"text\" name=\"".$set['key']."\" id=\"".$set['key']."\" value=\"".$set['value']."\"/>
				<small>".$set['comment']."</small>
			</fieldset>";
	}
?>
</form>
