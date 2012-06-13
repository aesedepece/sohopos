<?php

class Cash extends Cnt{

	function Cash($app){
		parent::Cnt($app);
	}
	
	public function add($value, $caption){
		$sql = "INSERT INTO cashposts (value, caption) VALUES ('".$value."', '".$caption."')";
		mysql_query($sql, $this->app->db);
	}
	
}
