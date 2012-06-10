<?php

class Units extends Cnt{

	function Units($app){
		parent::Cnt($app);
	}

	public function move(){
		$move = $_POST['move'];
		switch($move['type']){
			case "in_buy":
				$this->insert($move);
				if($move['freeunits']>0){
					$free = $move;
					$free['units'] = $free['freeunits'];
					$free['pricebuy'] = 0;
					$this->insert($free);
				}
				$oldpricebuy = mysql_result(mysql_query("SELECT pricebuy FROM distributors_products WHERE distributor_id = '".$move['dist']."' AND product_id = '".$move['prod']."'", $this->app->db), 0);
				if($oldpricebuy!=$move['pricebuy'])mysql_query("UPDATE distributors_products SET pricebuy = '".$move['pricebuy']."' WHERE distributor_id = '".$move['dist']."' AND product_id = '".$move['prod']."'", $this->app->db);
				break;
			case "in_trans":
				$this->insert($move);
				break;
		}
		echo"Operación realizada correctamente";
	}

	private function insert($move){
		for($i=0;$i<$move['units'];$i++){
			$sql = "INSERT INTO units
				(product_id, distributor_id, pricebuy, expiry)
				VALUES
				(".$move['prod'].", ".$move['dist'].", ".$move['pricebuy'].", '".date("Y-m-d" ,strtotime($move['expiry']))."')";
			mysql_query($sql, $this->app->db);
		}
	}
	
	private function withdraw($amount){
		
	}

}
