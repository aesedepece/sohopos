<?php
?>
<script type="text/javascript">
	$("document").ready(function(){
		tool = "discounts";
	});
</script>
<h1>Descuentos</h1>
<ul>
<?php
	$discounts = $this->discountsList();
	foreach($discounts as $discount){
		echo"<li id=\"".$discount['id']."\" onclick=\"discountChange(".$discount['id'].")\">".$discount['caption']." (-".$discount['value']."%)</li>";
	}
?>
</ul>
