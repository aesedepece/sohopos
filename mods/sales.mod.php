<?php

class Sales extends Mod{

	public $tool;

	function Sales($app){
		parent::Mod($app);
		parent::resImport("header");
		if(isset($this->app->tool)){switch($this->app->tool){
			case "payment":
				$this->tool = "payment";
				break;
			case "clients":
				$this->tool = "clients";
				break;
			case "tickets":
				$this->tool = "tickets";
				break;
			default:
				$this->tool = "products";
				break;
		}}else $this->tool = "products";
		parent::Import("main");
	}
	
}

