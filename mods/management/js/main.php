<?php header('Content-type: text/javascript'); 
session_start();
$s = $_SESSION['s'];
?>

var tool = "default";

$('document').ready(function(){
	$("body#management > nav > ul > li#" + tool).addClass("selected");
});

function productSearch(searchby, value){
	var proddata = $.ajax({
		type: "POST",       
		url: "<?php echo$s['r']; ?>products/search",
		data: { searchby: searchby, value: value },
		dataType: "json",
		context: document.body,
		global: false,
		async:false,
		success: function(data) {
			return data;
		}
	}).responseText;
	return JSON.parse(proddata);
}

function distributorsGetFromProduct(product){
	var distributors = $.ajax({
		type: "POST",       
		url: "<?php echo$s['r']; ?>distributors/getFromProduct",
		data: { product: product },
		dataType: "json",
		context: document.body,
		global: false,
		async:false,
		success: function(data) {
			return data;
		}
	}).responseText;
	return JSON.parse(distributors);
}
