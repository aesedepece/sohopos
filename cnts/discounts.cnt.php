<?php

class Discounts extends Cnt{

	function Clients($app){
		parent::Cnt($app);
	}
	
	public function get(){
		$clients = NULL;
		$q = mysql_query("
		SELECT *
		FROM discounts
		WHERE id = '".$_POST['id']."'
		LIMIT 1
		", $this->app->db);
		if(mysql_num_rows($q)){
			$i = 0;
			while($discount =  mysql_fetch_assoc($q)){
				$discounts[$i] = $discount;
				$i++;
			}
		}
		echo json_encode($discounts);
	}

}
