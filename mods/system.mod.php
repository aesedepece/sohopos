<?php

class System extends Mod{

	public $tool;

	function System($app){
		parent::Mod($app);
		parent::resImport("header");
		if(isset($this->app->tool)){switch($this->app->tool){
			case "environment":
				$this->tool = "environment";
				break;
			case "sellers":
				$this->tool = "sellers";
				break;
			case "credits":
				$this->tool = "credits";
				break;
			case "license":
				$this->tool = "license";
				break;
			default:
				$this->tool = "default";
				break;
		}}else $this->tool = "default";
		parent::Import("main");
	}
	
}

