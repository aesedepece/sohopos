<?php

$mod = $_GET['a'];
$action = $_GET['b'];

$r = "../backend";

if($dir = opendir($r."/mods")){
	$i=0;
	while(false !== ($entry = readdir($dir))) {
		if(substr($entry, 0, 1)!="."){
			$mods[$i]=$entry;
			$i++;
		}
	}
}

if(in_array($mod.".php", $mods)){
	include($r."/mods/".$mod.".php");
	if(function_exists($action)){
		print eval($action."(\$db);");
	}else echo "INEXISTENT ACTION\n";
}else{
	echo "INEXISTENT MOD (".$mod.".php)\n";
}
