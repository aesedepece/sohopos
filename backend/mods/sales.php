<?php

function saleNew($db){
	$sale['startdate'] = date("m/d/y \A \L\A\S G:i");
	mysql_query("INSERT INTO sales (seller_id) VALUES ('".$_SESSION['uid']."')");
	$sale['id'] = mysql_result(mysql_query("SELECT id FROM sales ORDER BY id DESC LIMIT 1", $db),0);
	echo json_encode($sale);
}

function saleTouch($db){
	mysql_query("UPDATE sales SET startdate = CURRENT_TIMESTAMP WHERE id = '".$_POST['id']."'", $db);
	$sale['startdate'] = date("m/d/y \A \L\A\S G:i");
	echo json_encode($sale);
}

function saleEnd($db){
	mysql_query("UPDATE sales SET enddate = CURRENT_TIMESTAMP WHERE id = '".$_POST['id']."'", $db);
}

?>
