<?php

class System extends Mod{

	public $tool;

	function System($app){
		parent::Mod($app);
		parent::resImport("header");
		if(isset($this->app->tool)){switch($this->app->tool){
			default:
				$this->tool = "default";
				break;
		}}else $this->tool = "default";
		parent::Import("main");
	}
	
}

