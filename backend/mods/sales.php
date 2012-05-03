<?php

function saleNew($db){
	$sale['startdate'] = date("m/d/y \A \L\A\S G:i");
	mysql_query("	INSERT INTO sales (seller_id) 
			VALUES ('".$_SESSION['uid']."')");
	$sale['id'] = mysql_result(mysql_query("	SELECT id 
							FROM sales 
							ORDER BY id DESC
							LIMIT 1", $db),0);
	echo json_encode($sale);
}

function saleTouch($db){
	$q = mysql_query("UPDATE sales 
			SET startdate = CURRENT_TIMESTAMP 
			WHERE id = '".$_POST['id']."'", $db);
	if(mysql_affected_rows($db)){
		$sale['startdate'] = date("m/d/y \A \L\A\S G:i");
		$sale['id'] = $_POST['id'];
		echo json_encode($sale);
	}else{
		saleNew($db);
	}
}

function saleEnd($db){
	mysql_query("	UPDATE sales 
			SET enddate = CURRENT_TIMESTAMP 
			WHERE id = '".$_POST['id']."'", $db);
}

function getFromDB($db){
	$sales = null;
	$q = @mysql_query("	SELECT * 
				FROM sales 
				WHERE enddate IS NULL");
	if(mysql_num_rows($q)){
		$i = 0;
		while($sale = mysql_fetch_assoc($q)){
			$sales[$i] = $sale;
			$i++;
		}
	}
	echo json_encode($sales);
}

?>
