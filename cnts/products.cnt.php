<?php

class Products extends Cnt{

	function Products($app){
		parent::Cnt($app);
	}
	
	public function search(){
		$q = mysql_query("
		SELECT products.id, 
		products.name, 
		products.pricesell,
		taxes.rate AS tax, 
		makes.name AS make 
		FROM products, taxes, makes 
		WHERE products.tax_id = taxes.id 
		AND products.make_id = makes.id 
		AND products.".$_POST['searchby']." = '".$_POST['value']."'
		", $this->app->db);
		if(mysql_num_rows($q)){
			$i = 0;
			while($product =  mysql_fetch_assoc($q)){
				$products[$i] = $product;
				$i++;
			}
		}
		echo json_encode($products);
	}
}
