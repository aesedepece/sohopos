<?php

class Foo extends Cnt{

	function Foo($app){
		parent::Cnt($app);
	}
	
	public function bar(){
		echo "Hello world!";
	}

}
