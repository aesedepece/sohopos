<?php header('Content-type: text/css'); ?>

body#system{
	background-color: #14171a;
	background-image: url("../../../res/img/texture.png"), -webkit-linear-gradient(top, #020202 0%, #262b32 100%);
	background-image: url("../../../res/img/texture.png"), -moz-linear-gradient(top, #020202 0%, #262b32 100%);
	background-image: url("../../../res/img/texture.png"), -o-linear-gradient(top, #020202 0%, #262b32 100%);
	background-image: url("../../../res/img/texture.png"), linear-gradient(top, #020202 0%, #262b32 100%);
	color: white;
}
body#system p{
	margin: 10px 0;
}
body#system > nav{
	position: absolute;
	width: 300px;
	max-height: 100%;
	top: 100px;
	left: 40px;
	bottom: 40px;
	border-right: 1px solid #666;
	overflow: auto;
}
body#system > nav > ul{
	margin-bottom: 5px;
	list-style-type: none;
}
body#system > nav > ul > span{
	display: block;
	padding: 5px;
	font-size: 0.8em;
	text-transform: uppercase;
	border-bottom: 1px solid #666;
	color: #AAA;
	font-weight: bold;
}
body#system > nav > ul > li.selected{
	background-color: rgba(255, 255, 255, 0.2);
}
body#system > nav > ul > li > a{
	display: block;
	padding: 14px 15px 10px 15px;
	border-top: 1px solid #666;
	cursor: pointer;
	color: #FFF;
	text-decoration: none;
}
body#system > nav > ul > li:hover{
	background-color:  rgba(255, 255, 255, 0.1);
}
body#system > nav > ul > li:active{
	background-color:  rgba(255, 255, 255, 0.4);
}
body#system > nav > ul > li.selected{
	background-color: 
}
body#system > div#panel{
	position: absolute;
	max-height: 100%;
	padding: 40px;
	top: 100px;
	left: 340px;
	right: 40px;
	bottom: 40px;
	border: 2px solid #111;
	outline: 1px solid #666;
	background-color: #333;
	background-image: url("../../../res/img/texture.png");
	overflow: auto;
}
body#system > div#panel > form > a#ok{
	float: right;
	margin-top: -75px;
	margin-right: 10px;
	padding: 10px 20px;
	background-color: #690;
	color: #FFF;
	border-radius: 2px;
	border-top: 1px solid #9C0;
	border-bottom: 1px solid  #360;
	font-size: 0.8em;
	font-weight: bold;
	text-transform: uppercase;
}
body#system > div#panel > form > a#ok > img{
	margin-bottom: -3px;
}
body#system > div#panel > h1{
	font-size: 1.2em;
	font-weight: normal;
	margin-bottom: 30px;
	border-bottom: 1px solid #666;
	padding: 5px;	
}
body#system > div#panel > form > fieldset{
	margin-bottom: 10px;
	margin-left: 10px;
}
body#system > div#panel > form > fieldset > input{
	min-width: 200px;
	margin-top: -5px;
	margin-right: 5px;
	border: 4px solid;
	-moz-border-image: url('../../../res/img/input-text-corners.png') 4 4 4 4 repeat;
	-webkit-border-image: url('../../../res/img/input-text-corners.png') 4 4 4 4 repeat;
	border-image: url('../../../res/img/input-text-corners.png') 4 4 4 4 repeat;
	color: #AAA;
	text-align: right;
}
body#system > div#panel > form > fieldset > input:focus{
	-moz-border-image: url('../../../res/img/input-text-corners-selected.png') 4 4 4 4 repeat;
	-webkit-border-image: url('../../../res/img/input-text-corners-selected.png') 4 4 4 4 repeat;
	border-image: url('../../../res/img/input-text-corners-selected.png') 4 4 4 4 repeat;
	color: #FFF;
}
body#system > div#panel > form > fieldset > select{
	min-width: 200px;
	margin-top: -5px;
	border: 4px solid;
	-moz-border-image: url('../../../res/img/input-text-corners.png') 4 4 4 4 repeat;
	-webkit-border-image: url('../../../res/img/input-text-corners.png') 4 4 4 4 repeat;
	border-image: url('../../../res/img/input-text-corners.png') 4 4 4 4 repeat;
	color: #AAA;
}
body#system > div#panel > form > fieldset > select:focus{
	-moz-border-image: url('../../../res/img/input-text-corners-selected.png') 4 4 4 4 repeat;
	-webkit-border-image: url('../../../res/img/input-text-corners-selected.png') 4 4 4 4 repeat;
	border-image: url('../../../res/img/input-text-corners-selected.png') 4 4 4 4 repeat;
	color: #FFF;
}
body#system > div#panel > form > fieldset > label{
	display: block;
	float: left;
	min-width: 150px;
	color: #CCC;
}
body#system > div#panel > form > fieldset > button.qty{
	position: relative;
	top: -3px;
	margin-right: -5px;
	padding: 5px 8px;
	background-color: #222;
	color: #999;
	border-top: 1px solid #555;
	border-bottom: 1px solid #111;
	font-weight: bold;
}
body#system > div#panel > form > fieldset > button.qty:hover{
	background-color: #690;
	color: #FFF;
	border-top: 1px solid #9C0;
	border-bottom: 1px solid  #360;
}
body#system > div#panel > form > fieldset > button.minus{
	border-top-left-radius: 2px;
	border-bottom-left-radius: 2px;
}
body#system > div#panel > form > fieldset > button.plus{
	border-left: 1px solid #333;
	border-top-right-radius: 2px;
	border-bottom-right-radius: 2px;
}
body#system > div#panel > form > figure#product{
	display: none;
	float: right;
	margin: -15px 10px 20px 20px;
	padding: 10px;
	border: 1px solid #000;
	outline: 1px solid #666;
	background-color: #222;
	background-image: url("../../../res/img/texture.png");
}
body#system > div#panel > form > figure#product img{
	width: 120px;
	border: 5px solid #DDD;
	outline: 1px solid #000;
	background-image: url("../../../res/img/texture.png");
}
body#system > div#panel > form > figure#product figcaption{
	text-align: center;
}
body#system > div#panel > form > figure#product figcaption h1{
	font-size: 0.8em;
}
body#system > div#panel > form > figure#product figcaption h2{
	font-size: 0.6em;
}
