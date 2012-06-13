<?php
?>
<script type="text/javascript">
	$("document").ready(function(){
		tool = "discounts";
		$("body#sales > section#right > section#discounts > ul > li#"+sales[curSale].discount).addClass("current");
	});
</script>
<h1>Descuentos</h1>
<ul>
<?php
	$discounts = $this->discountsList();
	foreach($discounts as $discount){
		echo"<li id=\"".$discount['id']."\" onclick=\"discountChange(".$discount['id'].");\">".$discount['caption']." (-".$discount['value']."%)</li>";
	}
?>
</ul>
