<?php

require_once("units.cnt.php");
require_once("cash.cnt.php");

class Sales extends Cnt{

	function Sales($app){
		parent::Cnt($app);
	}

	public function saleNew(){
		$sale['startdate'] = date("m/d/y \A \L\A\S G:i");
		mysql_query("	INSERT INTO sales (seller_id) 
				VALUES ('".$_SESSION['uid']."')");
		$sale['id'] = mysql_result(mysql_query("	SELECT id 
								FROM sales 
								ORDER BY id DESC
								LIMIT 1", $this->app->db),0);
		echo json_encode($sale);
		return $sale;
	}

	public function saleTouch(){
		$q = mysql_query("UPDATE sales 
				SET startdate = CURRENT_TIMESTAMP 
				WHERE id = '".$_POST['id']."'", $this->app->db);
		if(mysql_affected_rows($this->app->db)){
			$sale['startdate'] = date("m/d/y \A \L\A\S G:i");
			$sale['id'] = $_POST['id'];
			echo json_encode($sale);
		}else{
			saleNew($this->app->db);
		}
	}

	public function saleEnd(){
		$this->close($_POST['id'], $_POST['articles']);
	}

	public function getFromDB(){
		$sales = null;
		$q = @mysql_query("	SELECT * 
					FROM sales 
					WHERE enddate IS NULL
					AND seller_id = '".$_SESSION['uid']."'
					ORDER BY id ASC");
		if(mysql_num_rows($q)){
			$i = 0;
			while($sale = mysql_fetch_assoc($q)){
				$sales[$i] = $sale;
				$i++;
			}
		}
		echo json_encode($sales);
	}
	
	public function move(){
		$units = new Units($this->app);
		$cash = new Cash($this->app);
		$move = $_POST['move'];
		switch($move['type']){
			case "in_buy":
				$units->insert($move);
				if($move['freeunits']>0){
					$free = $move;
					$free['units'] = $free['freeunits'];
					$free['pricebuy'] = 0;
					$units->insert($free);
				}
				$oldpricebuy = mysql_result(mysql_query("SELECT pricebuy FROM distributors_products WHERE distributor_id = '".$move['dist']."' AND product_id = '".$move['prod']."'", $this->app->db), 0);
				if($oldpricebuy!=$move['pricebuy'])mysql_query("UPDATE distributors_products SET pricebuy = '".$move['pricebuy']."' WHERE distributor_id = '".$move['dist']."' AND product_id = '".$move['prod']."'", $this->app->db);
				break;
			case "in_trans":
				$units->insert($move);
				break;
			case "in_back":
				$units->insert($move);
				$cash->add(($move['pricesell']*$move['units']), "BACK ".$move['prod']."x".$move['units']);
				break;
			case "out_sell":
				$sale = $this->saleNew();
				$articles[0]['id'] = $move['prod'];
				$articles[0]['qty'] = $move['units'];
				$articles[0]['subprice'] = $move['pricesell'];
				$this->close($sale['id'], $articles);
				break;
		}
	}
	
	private function close($id, $articles){
		mysql_query("	UPDATE sales 
				SET enddate = CURRENT_TIMESTAMP 
				WHERE id = '".$id."'"
		, $this->app->db);
		foreach($articles as $article){
			$sql = mysql_query("	SELECT id 
						FROM v_curUnits 
						WHERE product_id = '".$article['id']."'
						ORDER BY expiry, indate ASC LIMIT '".$article['units']."'"
			, $this->app->db)
			if(mysql_num_rows($sql)=>$unit['units']){
				while($unit = mysql_fetch_assoc($sql)){
					mysql_query("	INSERT INTO units_sales (unit_id, sale_id)
							VALUES ('".$unit['id']."', '".$id."')"
					, $this->app->db);
				}
			}
		}
		
	}

}
