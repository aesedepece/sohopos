<?php

function search($db){
	$clients = NULL;
	$q = mysql_query("
	SELECT *
	FROM clients
	WHERE CONCAT_WS( ' ', name, surname ) LIKE '%".$_POST['value']."%'
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
