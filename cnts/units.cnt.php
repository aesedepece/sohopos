<?php

class Units extends Cnt{

	function Units($app){
		parent::Cnt($app);
	}
	
	public function insert($move){
		for($i=0;$i<$move['units'];$i++){
			$sql = "INSERT INTO units
				(product_id, distributor_id, pricebuy, expiry)
				VALUES
				(".$move['prod'].", ".$move['dist'].", ".$move['pricebuy'].", '".date("Y-m-d" ,strtotime($move['expiry']))."')";
			mysql_query($sql, $this->app->db);
		}
	}

	public function cashPost($move, $caption){
		require_once("cash.cnt.php");
		$cash = new Cash();
		for($i=0;$i<$move['units'];$i++){	
			$cash->add($move['pricebuy'], $caption);
		}
	}

}
