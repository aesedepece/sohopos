<?php header('Content-type: text/javascript'); 
session_start();
?>
var mod = "<?php echo $_SESSION['mod']; ?>";

function clockize(clock){
	var cT = new Date();
	clock.html((cT.getHours() < 10 ? '0' : '') + cT.getHours() + ":" + (cT.getMinutes() < 10 ? '0' : '') + cT.getMinutes()); //>
	setTimeout(function(){clockize(clock)}, 60000);
}

function logOut(e){
	e.preventDefault();
	if(confirm("¿Estás seguro de querer salir?")){
		$.post('session/logout', function(){
 			location.reload();
		});
	}
}

$(document).ready(function(){
	$("header#topbar nav ul li a#nav<?php echo $_SESSION['mod']; ?>").addClass("selected");
	clockize($("header#topbar div#session span#clock"));
	$("header#topbar div#session span#user").html("<?php echo $_SESSION['me']['name']; ?>");
	$("header#topbar a#exit").click(function(e){
		logOut(e);
	});
	$("body").keypress(function(e){
		if(e.keyCode==27)logOut(e);
	});
});
