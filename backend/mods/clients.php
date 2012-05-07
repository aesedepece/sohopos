<?php

function search($db){
	$q = mysql_query("
	SELECT id, name, surname, `default-discount_id`
	FROM clients
	WHERE `".$_POST['searchby']."` = '".$_POST['value']."'
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
