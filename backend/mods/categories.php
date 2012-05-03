<?php

function search($db){
	$q = mysql_query("
	SELECT id, name , parent_id
	FROM categories
	WHERE ".$_POST['searchby']." = '".$_POST['value']."'
	", $db);
	if(mysql_num_rows($q)){
		$i = 0;
		while($category =  mysql_fetch_assoc($q)){
			$categories[$i] = $category;
			$i++;
		}
	}
	echo json_encode($categories);
}
