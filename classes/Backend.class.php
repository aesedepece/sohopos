<?php

class Backend{

	public $db;

	public $s; // s stands for settings all app long

	public $controller;
	public $action;
	public $controllers;
	
	/**
	* Common initializer
	*
	*/ 
	function Backend($db){
		$this->dbConnect($db);
		$this->paramsGet();
		$this->controllersLoad();
	}
	
	/**
	* Shows error messages nicely
	*
	*/ 
	private function err($msg){
		require_once("res/php/err.php");
	}
	
	/**
	* Connects to the database
	*
	*/ 
	private function dbConnect($db){
		$this->db = mysql_connect($db['h'], $db['u'], $db['p']);
		mysql_select_db($db['n'], $this->db);
		$q = mysql_query("SELECT `key`, `value` FROM `settings`", $this->db);
		if(mysql_num_rows($q)){
			while($option = mysql_fetch_assoc($q)){
				$this->s[$option['key']] = utf8_encode($option['value']);
			}
		}else $this->err("NO SETTINGS");
		mysql_set_charset('utf8');
	}
	
	/**
	* Gets and sets values for controller and action
	*
	*/ 
	private function paramsGet(){
		$this->controller = "foo";
		$this->action = "bar";
		if(isset($_GET['a']))$this->controller = $_GET['a'];
		if(isset($_GET['b']))$this->action = $_GET['b'];
	}
	
	/**
	* Gets an array with every .php file in /controller
	*
	*/ 
	private function controllersLoad(){
		if($dir = opendir("cnts")){
			$i=0;
			while(false !== ($entry = readdir($dir))) {
				if((substr($entry, 0, 1)!=".")&&!is_dir("cnts/".$entry)){
					$this->controllers[$i]=$entry;
					$i++;
				}
			}
		}else $this->err("CONTROLLERS DIR ERROR");
	}

	/**
	* Executes queried controller
	*
	*/ 
	public function controllerRun(){
		if(in_array($this->controller.".cnt.php", $this->controllers)){
			require_once("cnts/".$this->controller.".cnt.php");
			if(class_exists($this->controller)){
				eval("\$o = new ".ucfirst($this->controller)."(\$this);");
				if(method_exists($o, $this->action)){
					eval("\$o->".$this->action."();");
				}else $this->err("INEXISTENT ACTION");
			}else{
				$this->err("INEXISTENT CLASS");
			}
		}else $this->err("INEXISTENT CONTROLLER (".$this->controller.".cnt.php)");
	}

}

?>
