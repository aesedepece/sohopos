<?php

class Cnt{

	public $app;

	function Cnt($app){
		session_start();
		$this->app = $app;
	}

}

?>
