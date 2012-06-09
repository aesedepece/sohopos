<?php

function move($db){
	$move = $_POST['move'];
	switch($move['type']){
		case "in_buy":
			insert($db, $move);
			if($move['freeunits']>0){
				$free = $move;
				$free['units'] = $free['freeunits'];
				$free['pricebuy'] = 0;
				insert($db, $free);
			};
			$oldpricebuy = mysql_result(mysql_query("SELECT pricebuy FROM distributors_products WHERE distributor_id = '".$move['dist']."' AND product_id = '".$move['prod']."'", $db), 0);
			if($oldpricebuy!=$move['pricebuy'])mysql_query("UPDATE distributors_products SET pricebuy = '".$move['pricebuy']."' WHERE distributor_id = '".$move['dist']."' AND product_id = '".$move['prod']."'", $db);
			break;
		case "in_trans":
		
			
		case "out_sell":
			withdraw($db, $move);
			break;
	}

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

function withdraw($db, $move){
	
}
