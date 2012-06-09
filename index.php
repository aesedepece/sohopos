<?php

$db['h'] = "localhost"; // Database host
$db['n'] = "librepos"; // Database name
$db['u'] = "librepos"; // Database username
$db['p'] = "password"; // Database password

if(isset($_GET['back']))$forcebackend = true;

if((!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')||$forcebackend){
	require_once ('backend.php');
}else{
	require_once ('frontend.php');
}

?>
