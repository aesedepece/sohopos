<?php header('Content-type: text/javascript'); 
session_start();
?>
$(document).ready(function(){
	$("form#login").submit(function(event){
		event.preventDefault();
		user = $("input#user").val();
		pass = $("input#pass").val();
		$.post('session/login',
			{ user: user, pass: pass },
			function(userdata){
		 		if(userdata=="false"){
		 			$("#logerror").css('display', 'block');
		 		}else{
		 			mydata = jQuery.parseJSON(userdata);
		 			if(mydata.username==user){
		 				location.reload();
		 			}else{
		 				alert("SOMETHING WENT TERRIBLY WRONG!");
		 			}
		 		}
		});
		return false;
	});
});
