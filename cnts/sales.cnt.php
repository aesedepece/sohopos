<?php

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
		mysql_query("	UPDATE sales 
				SET enddate = CURRENT_TIMESTAMP 
				WHERE id = '".$_POST['id']."'", $this->app->db);
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

}
