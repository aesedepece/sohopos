<?php

class Settings extends Cnt{

	function Settings($app){
		parent::Cnt($app);
	}
	
	public function update(){
		$key = $_POST['key'];
		$value = $_POST['value'];
		$query = "UPDATE settings SET value = \"".$value."\" WHERE `key` = \"".$key."\"";
		mysql_query($query, $this->app->db);
	}

}
