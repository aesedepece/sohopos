<?php

class Distributors extends Cnt{

	function Distributors($app){
		parent::Cnt($app);
	}
	
	public function getFromProduct(){
		$q = mysql_query("
		SELECT distributors.*, distributors_products.pricebuy
		FROM distributors, distributors_products
		WHERE distributors.id = distributors_products.distributor_id
		AND distributors_products.product_id = '".$_POST['product']."'
		ORDER BY distributors_products.pricebuy ASC;
		", $this->app->db);
		if(mysql_num_rows($q)){
			$i = 0;
			while($distributor =  mysql_fetch_assoc($q)){
				$distributors[$i] = $distributor;
				$i++;
			}
		}
		echo json_encode($distributors);
	}

}
