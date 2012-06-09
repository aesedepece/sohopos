<?php

class Frontend{

	public $db;

	public $s; // s stands for settings all app long

	public $mod;
	public $tool;
	public $mods;
	
	public $id;
	
	/**
	* Common initializer
	*
	*/ 
	function Frontend($db){
		session_start();
		//var_dump($_SESSION);
		$this->dbConnect($db);
		$this->paramsGet();
		$this->modsLoad();
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
			$_SESSION['s'] = $this->s;
		}else $this->err("NO SETTINGS");
		if(isset($_SESSION['uid']))$this->id = $_SESSION['uid'];
		mysql_set_charset('utf8');
	}
	
	/**
	* Gets and sets values for mod and tool
	*
	*/ 
	private function paramsGet(){
		$this->mod = "sales";
		if(isset($_GET['a']))$this->mod = $_GET['a'];
		if(isset($_GET['b']))$this->tool = $_GET['b'];
		if(!$this->id)$this->mod = "login";
		$_SESSION['mod'] = $this->mod;
		$_SESSION['tool'] = $this->tool;
	}
	
	/**
	* Gets an array with every .php file in /mods
	*
	*/ 
	private function modsLoad(){
		if($dir = opendir("mods")){
			$i=0;
			while(false !== ($entry = readdir($dir))) {
				if((substr($entry, 0, 1)!=".")&&!is_dir("mods/".$entry)){
					$this->mods[$i]=$entry;
					$i++;
				}
			}
		}else $this->err("MODS DIR ERROR");
	}

	/**
	* Shows queried mod
	*
	*/ 
	public function modShow(){
		if(in_array($this->mod.".mod.php", $this->mods)){
			require_once("mods/".$this->mod.".mod.php");
			if(class_exists($this->mod)){
				eval("\$o = new ".ucfirst($this->mod)."(\$this);");
			}else{
				$this->err("INEXISTENT CLASS");
			}
		}else $this->err("INEXISTENT MOD (".$this->mod.".mod.php)");
	}

}

?>
