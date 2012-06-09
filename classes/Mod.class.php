<?php

class Mod{

	public $app;

	function Mod($app){
		session_start();
		$this->app = $app;
	}
	
	public function resImport($name){
		include("res/php/".$name.".php");
	}
	
	public function Import($name){
		include("mods/".$this->app->mod."/php/".$name.".php");
	}
	
}

?>
