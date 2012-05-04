<?php

class Printer{

	private $port;

	public function Printer($port){
		$this->port = $port;
	}

	public function write($string){
		$string = $this->encode($string);
		$this->out($string);
	}

	public function drawerOpen(){

	}
	
	private function encode($string){
		return $string."\n";
	}
	
	private function fullCut(){

	}

	private function partialCut(){

	}

	private function out($string){
		file_put_contents($this->port, $string);
	}

}

$p = new Printer("./ticket");
$p->write("Hola Mundo");
