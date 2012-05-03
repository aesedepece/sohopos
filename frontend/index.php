<?php	
session_start();
$db = mysql_connect("server","librepos","password");
mysql_select_db("librepos", $db);
mysql_set_charset('utf8', $db);

$q = mysql_query("SELECT `key`, `value` FROM `settings`", $db);
if(mysql_num_rows($q)){
	while($setting =  mysql_fetch_assoc($q)){
		$s[$setting['key']] = utf8_encode($setting['value']);
	}
}

$_SESSION['s'] = $s;

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(dirname(__FILE__)));

$noiface = false;

if((!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')||$noiface){
	require_once (ROOT . DS . 'backend' . DS . 'main.php');
}else{
	require_once (ROOT . DS . 'frontend' . DS . 'iface.php');
}
