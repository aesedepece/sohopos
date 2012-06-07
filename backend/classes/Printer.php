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
		$this->write("<drawerOpen>");
	}
	
	private function encode($string){
		$codeMap = array(
			"/á/" => array(160),
			"/é/" => array(130),
			"/í/" => array(161),
			"/ó/" => array(162),
			"/ú/" => array(163),
			"/ñ/" => array(164),
			"/Á/" => array(181),
			"/É/" => array(144),
			"/Í/" => array(214),
			"/Ó/" => array(224),
			"/Ú/" => array(233),
			"/Ñ/" =>array(165),
			"/¡/" => array(173),
			"/€/" => array(213),
			"/<reset>/" => array(27, 64),
			"/<euro>/" => array(27, 116, 19),
			"/<drawerOpen>/" => array(27, 61, 1, 27, 112, 0, 50, 250),
			"/<stripeCut>/" => array(27, 109),
			"/<fullCut>/" => array(29, 86, 65),
			"/<halfCut>/" => array(29, 86, 66),
			"/<sp(\d+)>/" => array(27, 32),
			"/<u>/" => array(27, 45, 1),
			"/<\/u>/" => array(27, 45, 0),
			"/<du>/" => array(27, 45, 2),
			"/<em>/" => array(27, 69, 1),
			"/<\/em>/" => array(27, 69, 0),
			"/<strong>/" => array(27, 71, 1),
			"/<\/strong>/" => array(27, 71, 0),
			"/<left>/" => array(27, 97, 0),
			"/<center>/" => array(27, 97, 1),
			"/<right>/" => array(27, 97, 2),
			"/<font(\d+)>/" => array(27, 77),
			"/<hr>/" => array(196,  196,  196,  196,  196,  196, 196, 196, 196, 196, 196, 196, 196, 196, 196, 196, 196, 196, 196, 196, 196, 196, 196, 196, 196, 196, 196, 196, 196, 196, 196, 196, 196, 196, 196, 196, 196, 196, 196, 196, 196, 196, 196, 196, 196, 196, 196, 196),
			"/<big>/" => array(29, 33, 1),
		);
		foreach($codeMap as $pattern => $code){
			$seq = "";
			foreach($code as $byte)$seq .= sprintf("%c", $byte);
			$string = preg_replace($pattern, $seq.'$1', $string);
		}
		return $string;
	}
	
	public function fullCut(){
		$this->write("<fullCut>");
	}
	
	public function halfCut(){
		$this->write("<halfCut>");
	}
	
	public function ticketPrint($ticket, $format){
		echo $format;
	}

	private function out($string){
		file_put_contents($this->port, $string);
		echo $string;
	}

}

$p = new Printer("/dev/usb/lp0");
$ticket['user'] = "Adán";
$format = file_get_contents("ticket.php");
$p->ticketPrint($ticket, $format);
