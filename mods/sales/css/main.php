<?php header('Content-type: text/css'); ?>
body#sales{
	height: 100%;
}
body#sales > section{
	display: block;
	position: fixed;
	top: 62px;
	bottom: 0;
}
body#sales > section#left{
	left: 0;
	width: 39%;
	border-right: 1px solid #999;
	background-color: #FFF;
}
body#sales > section#right{
	right: 0;
	left: 39%;
	background-color: #B3B3B3;
	border-left: 1px solid #E6E6E6;
	margin-left: 1px;
	overflow-x: hidden;
	overflow-y: auto;
	background-image: url("../../../res/img/texture.png");
}
body#sales > section#left > section#articles{
	position: absolute;
	top: 0;
	left: 0;
	right: 0;
	bottom: 250px;
	background-color: #FFF;
	overflow: auto;
}

body#sales > section#left > section#articles table{
	width: 100%;
	border-spacing: 0;
}

body#sales > section#left > section#articles table thead{
	background-color: #333;
	font-size: 0.8em;
}
body#sales > section#left > section#articles table tr{
	cursor: pointer;
}
body#sales > section#left > section#articles table tr.selected{
	background-color: #DDFF77;
}
body#sales > section#left > section#articles table tr td, body#sales > section#left > section#articles table thead th{
	height: 30px;
	border-bottom: 1px solid #E6E6E6;
}
body#sales > section#left > section#articles table tr td{
	color: #999;
	font-size: 0.9em;
	text-align: center;
}
body#sales > section#left > section#articles table tr td:first-child, body#sales > section#left > section#articles table tr th:first-child{
	width: 50%;
	padding-left: 10px;
	text-align: left;
}
body#sales > section#left > section#articles table tr td:last-child, body#sales > section#left > section#articles table tr th:last-child{
	padding-right: 10px;
}
body#sales > section#left > section#articles table tr td.article{
	color: #666;
}
body#sales > section#left > section#sumpad{
	position: absolute;
	bottom: 0;
	left: 0;
	right: 0;
	height: 250px;
}
body#sales > section#left > section#sumpad > section#sum{
	position: relative;
	height: 20px;
	padding: 7px 2px 3px 2px;
	background-color: #FFF;
	border-top: 1px solid #E6E6E6;
	border-bottom: 1px solid #999;
	color: #999;
	font-weight: bold;
	font-size: 0.9em;
}
body#sales > section#left > section#sumpad > section#sum > div{
	display: inline;
	margin: 0 10px;
}
body#sales > section#left > section#sumpad > section#sum > div > span.value{
	margin-left: 5px;
	color: #4D4D4D;
}
body#sales > section#left > section#sumpad > section#pad{
	height: 100%;
	background-color: #333;
	border-top: 1px solid #E6E6E6;
	background-image: url("../../../res/img/texture.png");
}
body#sales > section#left > section#sumpad > section#pad > table#nums{
	float: right;
	margin: 10px;
	background-color: #4D4D4D;
	border-radius: 2px;
	font-size: 1.5em;
	font-weight: bold;
	border-collapse:collapse;
}
body#sales > section#left > section#sumpad > section#pad > table#nums td{
	width: 55px;
	margin: 0;
	padding: 6px 0 4px 0;
	text-align: center;
	border-top: 1px solid #666;
	border-left: 1px solid #666;
	background-image: url("../../../res/img/texture.png");
	cursor: pointer;
}
body#sales > section#left > section#sumpad > section#pad > table#nums tr:first-child td{
	border-top: none;
}
body#sales > section#left > section#sumpad > section#pad > table#nums tr td:first-child{
	border-left: none;
}
body#sales > section#left > section#sumpad > section#pad > table#nums td:hover{
	background-color: #555;
	border-radius: 2px;
	background-image: url("../../../res/img/texture.png");
}
body#sales > section#left > section#sumpad > section#pad > table#nums td:active{
	background-color: #222;
	background-image: url("../../../res/img/texture.png");
	padding: 8px 0 2px 0;
}
body#sales > section#left > section#sumpad > section#pad ul{
	position: absolute;
	left: 10px;
	top: 42px;
	bottom: 0;
	right: 250px;
	list-style-type: none;
}
body#sales > section#left > section#sumpad > section#pad li{
	padding: 16px 0 5px 5px;
	border-bottom: 1px solid #808080;
	font-size: 0.9em;
	cursor: pointer;
}
body#sales > section#left > section#sumpad > section#pad li span.label{
	float: right;
	margin-top: 2px;
	margin-right: 5px;
	padding: 0px 5px;
	background-color: #680;
	border-radius: 10px;
	font-size: 0.8em;
}
body#sales > section#left > section#sumpad > section#pad li:hover{
	background-color: #444;
	background-image: url("../../../res/img/texture.png");
}
body#sales > section#left > section#sumpad > section#pad li:active{
	background-color: #222;
	background-image: url("../../../res/img/texture.png");
}
body#sales > section#right > section#products > header{
	width: 100%;
	padding: 15px 10px;
	background-color: #4D4D4D;
	border-bottom: 1px solid #E6E6E6;
	font-size: 0.9em;
	background-image: url("../../../res/img/texture.png");
	height: 15px;
}
body#sales > section#right > section#products > header a{
	float: left;
	margin-right: 10px;
}
body#sales > section#right > section#products > header img{
	margin-left: 10px;
	margin-bottom: -1px;
}
body#sales > section#right > section#products > ul#grid{
	width: 100%;
	border-top: 1px solid #999;
}
body#sales > section#right > section#products > ul#grid li{
	position: relative;
	float: left;
	width: 120px;
	height: 120px;
	list-style-type: none;
	background-color: #FFF;
	cursor: pointer;
}
body#sales > section#right > section#products > ul#grid li h1{
	position: absolute;
	height: 40px;
	padding: 5px;
	bottom: 0;
	left: 0;
	right: 0;
	font-size: 0.8em;
	font-weight: normal;
	line-height: 1em;
	background-color: rgba(0, 0, 0, 0.5);
	overflow: hidden;
}
body#sales > section#right > section#products > ul#grid li.category h1{
	background-color: rgba(0, 0, 0, 0.7);
}
body#sales > section#right > section#products > ul#grid li img{
	width: 120px;
	height: 120px;
}
body#sales > section#right > section#products > ul#grid li span.price{
	padding: 2px 4px;
	position: absolute;
	top: 2px;
	right: 2px;
	border-radius: 2px;
	background-color: rgba(0, 0, 0, 0.5);
	font-size: 0.8em;
}
body#sales > section#right > section#tickets{
	position: absolute;
	top: 0;
	bottom: 0;
	left: 0;
	right: 0;
	background-color: #333;
	background-image: url("../../../res/img/texture.png");
}
body#sales > section#right > section#tickets ul{
	margin: 50px auto;
	padding: 30px 60px 30px 30px;
	width: 40%;
	background-color: #444;
	text-align: center;
	border-top: 1px solid #4D4D4D;
	border-bottom: 1px solid #1A1A1A;
	border-radius: 2px;
	background-image: url("../../../res/img/texture.png");
}
body#sales > section#right > section#tickets ul li{
	list-style-type: none;
	background-color: #555;
	border-top: 1px solid #666;
	border-bottom: 1px solid #222;
	border-radius: 2px;
	background-image: url("../../../res/img/texture.png");
	cursor: pointer;
}
body#sales > section#right > section#tickets ul li.current{
	background-color: #680;
}
body#sales > section#right > section#tickets ul li a.caption{
	display: block;
	padding: 10px;
}
body#sales > section#right > section#tickets ul li a.caption span.date{
	margin-left: 10px;
	font-size: 0.7em;
	color: #DDD;
}
body#sales > section#right > section#tickets ul li a.close{
	float: right;
	margin: -40px -30px 0 0;
	padding: 10px;
	background-color: #333;
	border-top: 1px solid #4D4D4D;
	border-bottom: 1px solid #1A1A1A;
	background-image: url("../../../res/img/texture.png");
}
body#sales > section#right > section#clients{
	position: absolute;
	top: 0;
	bottom: 0;
	left: 0;
	right: 0;
	background-color: #333;
	background-image: url("../../../res/img/texture.png");
}
body#sales > section#right > section#clients > h1{
	display: block;
	margin: 20px auto;
	font-size: 1.5em;
	text-align: center;
}
body#sales > section#right > section#clients > div{
	margin: 0 auto;
	padding: 30px;
	background-color: #444;
	text-align: center;
	border-top: 1px solid #4D4D4D;
	border-bottom: 1px solid #1A1A1A;
	border-radius: 2px;
	background-image: url("../../../res/img/texture.png");
}
body#sales > section#right > section#clients > div > section{
	display: block;
	float: left;
	text-align: left;
}
body#sales > section#right > section#clients > div > section > h1{
	margin-bottom: 15px;
}
body#sales > section#right > section#clients > div > section#clientsBrowser{
	width: 55%;
	border-right: 1px solid #666;
}
body#sales > section#right > section#clients > div > section#clientsBrowser input[type=text]{
	width: 80%;
	border: 4px solid;
	-moz-border-image: url('../../../res/img/input-text-corners.png') 4 4 4 4 repeat;
	-webkit-border-image: url('../../../res/img/input-text-corners.png') 4 4 4 4 repeat;
	border-image: url('../../../res/img/input-text-corners.png') 4 4 4 4 repeat;
	color: #777;
}
body#sales > section#right > section#clients > div > section#clientsBrowser input[type=text]:focus{
	-moz-border-image: url('../../../res/img/input-text-corners-selected.png') 4 4 4 4 repeat;
	-webkit-border-image: url('../../../res/img/input-text-corners-selected.png') 4 4 4 4 repeat;
	border-image: url('../../../res/img/input-text-corners-selected.png') 4 4 4 4 repeat;
	color: #FFF;
}
body#sales > section#right > section#clients > div > section#clientsBrowser > ul{
	margin-top: 15px;
	list-style-type: none;
}
body#sales > section#right > section#clients > div > section#clientsBrowser > ul > li{
	margin-bottom: -1px;
	padding: 10px;
	width: 80%;
	background-color: #333;
	background-image: url("../../../res/img/texture.png");
	border: 1px solid #666;
	cursor: pointer;
}
body#sales > section#right > section#clients > div > section#topClients{
	width: 30%;
	margin-left: 20px;
}
body#sales > section#right > section#clients > div > section#topClients > ul{
	margin-top: 15px;
	list-style-type: none;
}
body#sales > section#right > section#clients > div > section#topClients > ul > li{
	margin-bottom: -1px;
	padding: 10px;
	width: 100%;
	background-color: #333;
	background-image: url("../../../res/img/texture.png");
	border: 1px solid #666;
	cursor: pointer;
}
header#topbar div#context div#ticketinfo{
	height: 30px;
	padding: 5px 10px;
	background-color: #333;
	border-top: 1px solid #4D4D4D;
	border-bottom: 1px solid #1A1A1A;
	border-radius: 2px;
	font-weight: bold;
	text-align: center;
	color: #E6E6E6;
	cursor: pointer;
	background-image: url("../../../res/img/texture.png");
}
header#topbar div#context div#ticketinfo span#ticketdate{
	position: relative;
	top: -0.6em;
	font-size: 0.7em;
	color: #999;
}
