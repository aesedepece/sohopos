<?php

function move($db){
	$move = $_POST['move'];
	insert($db, $move);
	if($move['freeunits']>0){
		$free = $move;
		$free['units'] = $free['freeunits'];
		$free['pricebuy'] = 0;
		insert($db, $free);
	};
}

function insert($db, $move){
	for($i=0;$i<$move['units'];$i++){
		$sql = "INSERT INTO units
			(product_id, distributor_id, pricebuy, expiry)
			VALUES
			(".$move['prod'].", ".$move['dist'].", ".$move['pricebuy'].", '".date("Y-m-d" ,strtotime($move['expiry']))."')";
		mysql_query($sql, $db);
	}
}
