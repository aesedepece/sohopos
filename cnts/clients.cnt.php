<?php

class Clients extends Cnt{

	function Clients($app){
		parent::Cnt($app);
	}
	
	public function search(){
		$clients = NULL;
		$q = mysql_query("
		SELECT *
		FROM clients
		WHERE CONCAT_WS( ' ', name, surname ) LIKE '%".$_POST['value']."%'
		LIMIT 5
		", $this->app->db);
		if(mysql_num_rows($q)){
			$i = 0;
			while($client =  mysql_fetch_assoc($q)){
				$clients[$i] = $client;
				$i++;
			}
		}
		echo json_encode($clients);
	}

	public function get(){
		$clients = NULL;
		$q = mysql_query("
		SELECT *
		FROM clients
		WHERE id = '".$_POST['id']."'
		LIMIT 1
		", $this->app->db);
		if(mysql_num_rows($q)){
			$i = 0;
			while($client =  mysql_fetch_assoc($q)){
				$clients[$i] = $client;
				$i++;
			}
		}
		echo json_encode($clients);
	}

	public function top(){
		$clients = NULL;
		$q = mysql_query("
		SELECT *
		FROM v_topClients
		LIMIT ".$_POST['qty'], $this->app->db);
		if(mysql_num_rows($q)){
			$i = 0;
			while($client =  mysql_fetch_assoc($q)){
				$clients[$i] = $client;
				$i++;
			}
		}
		echo json_encode($clients);
	}
	
}
