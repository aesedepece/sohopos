<?php

class Units extends Cnt{

	function Units($app){
		parent::Cnt($app);
	}

	public function move(){
		$move = $_POST['move'];
		$this->insert($move);
		if($move['freeunits']>0){
			$free = $move;
			$free['units'] = $free['freeunits'];
			$free['pricebuy'] = 0;
			$this->insert($free);
		};
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

}
