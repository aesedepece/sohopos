<?php header('Content-type: text/javascript'); 
session_start();
$s = $_SESSION['s'];
?>
$(document).ready(function(){
	$("form#login").submit(function(event){
		event.preventDefault();
		user = $("input#user").val();
		pass = $("input#pass").val();
		$.post('<?php echo$s['r']; ?>sessions/login',
			{ user: user, pass: pass },
			function(userdata){
		 		if(userdata=="false"||typeof(userdata)==undefined){
		 			$("#logerror").css('display', 'block');
		 		}else{
		 			mydata = jQuery.parseJSON(userdata);
		 			if(typeof(mydata)==undefined)alert("SOMETHING WENT TERRIBLY WRONG!");
		 			else if(mydata.username==user){
		 				location.reload();
		 			}else{
		 				$("#logerror").css('display', 'block');
		 			}
		 		}
		});
		return false;
	});
});
