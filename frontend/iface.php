<?php

print_r($_SESSION);

if(isset($_SESSION['uid']))$id = $_SESSION['uid'];

if(isset($_GET['a']))$mod = $_GET['a'];

include("html/head.phtml");

if(!$id)$mod = "login";
switch($mod){
	case "management":
		break;
	case "system":
		break;
	case "login":
		break;
	default:
		$mod = "sale";
		break;
}
$_SESSION['mod'] = $mod;
?>
	<link rel="stylesheet" href="<?php echo$s['r']; ?>css/<?php echo$mod ?>.dcss" />
	<script type="text/javascript" src="<?php echo$s['r']; ?>js/<?php echo$mod ?>.djs"></script>
<?php
include("html/between.phtml");
include("html/".$mod."/index.phtml");
include("html/foot.phtml");
