<?php

function search($db){
	$clients = NULL;
	$q = mysql_query("
	SELECT *
	FROM clients
	WHERE CONCAT_WS( ' ', name, surname ) LIKE '%".$_POST['value']."%'
	LIMIT 5
	", $db);
	if(mysql_num_rows($q)){
		$i = 0;
		while($client =  mysql_fetch_assoc($q)){
			$clients[$i] = $client;
			$i++;
		}
	}
	echo json_encode($clients);
}

function get($db){
	$clients = NULL;
	$q = mysql_query("
	SELECT *
	FROM clients
	WHERE id = '".$_POST['id']."'
	LIMIT 1
	", $db);
	if(mysql_num_rows($q)){
		$i = 0;
		while($client =  mysql_fetch_assoc($q)){
			$clients[$i] = $client;
			$i++;
		}
	}
	echo json_encode($clients);
}

function top($db){
	$clients = NULL;
	$q = mysql_query("
	SELECT *
	FROM v_topClients
	LIMIT ".$_POST['qty'], $db);
	if(mysql_num_rows($q)){
		$i = 0;
		while($client =  mysql_fetch_assoc($q)){
			$clients[$i] = $client;
			$i++;
		}
	}
	echo json_encode($clients);
}
