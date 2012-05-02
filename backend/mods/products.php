<?php

function search($db){
	$q = mysql_query("
	SELECT `products`.`id`,
	`products`.`name`,
	`products`.`pricesell`,
	`taxes`.`rate` AS `tax`
	FROM `products` INNER JOIN `taxes`
	WHERE `products`.`tax_id` = `taxes`.`id`
	AND `products`.`".$_POST['searchby']."` = '".$_POST['value']."'
	", $db);
	if(mysql_num_rows($q)){
		$i = 0;
		while($product =  mysql_fetch_assoc($q)){
			$products[$i] = $product;
			$i++;
		}
	}
	echo json_encode($products);
}
