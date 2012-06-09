<?php

class Management extends Mod{

	public $tool;

	function Management($app){
		parent::Mod($app);
		parent::resImport("header");
		if(isset($this->app->tool)){switch($this->app->tool){
			case "stock":
				$this->tool = "stock";
				break;
			default:
				$this->tool = "default";
				break;
		}}else $this->tool = "default";
		parent::Import("main");
	}
	
}

