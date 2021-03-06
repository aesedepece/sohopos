<?php header('Content-type: text/css'); ?>
@font-face{
	font-family: Roboto;
	src: url('../fonts/Roboto-Regular.eot');
}
@font-face{
	font-family: Roboto;
	src: url('../fonts/Roboto-Regular.ttf');
}
*{
	border: none;
	margin: 0;
	padding: 0;
	background: none;
	font-family: Roboto;
	letter-spacing: -0.03em;
}
html{
	height: 100%;
}
body{
	min-width: 990px;
	background-color: black;
	color: white;
	background-image: url("../img/texture.png");
}
.l{
	float: left;
}
.r{
	float: right;
}
a{
	cursor: pointer;
}
hr.cb{
	clear: both;
}
header#topbar{
	width: 100%;
	height: 60px;
	background-color: #222;
	border-top: 1px solid #333;
	border-bottom: 1px solid #1A1A1A;
	background-image: url("../img/texture.png");
}
header#topbar a{
	color: #FFF;
	text-decoration: none;
}
header#topbar a#logo{
	float: left;
	display: block;
	width: 150px;
	height: 60px;
	border-right: 1px solid #1A1A1A;
}
header#topbar a#logo img{
	margin: 21px 0 0 10px;
}
header#topbar nav{
	float: left;
	height: 60px;
}
header#topbar nav ul{
	list-style-type: none;
}
header#topbar nav ul li{
	float: left;
	border-left: 1px solid #333;
	border-right: 1px solid #1A1A1A;
}
header#topbar nav ul li a{
	display: block;
	padding: 22px 20px 21px 20px;
	font-weight: bold;
	font-size: 0.9em;
}
header#topbar nav ul li a:visited{
	color: #FFF;
}
header#topbar nav ul li a.selected{
	padding-bottom: 17px;
	border-bottom: 4px solid #9C0;
}
header#topbar div#context{
	float: left;
	padding: 10px;
	height: 41px;
	border-left: 1px solid #333;
}
header#topbar div#session{
	float: right;
	text-align: right;
	border-right: 1px solid #1A1A1A;
	height: 60px;
	padding-right: 15px;
}
header#topbar div#session span#clock{
	display: block;
	margin-top: 6px;
	height: 6px;
	font-size: 1.4em;
}
header#topbar div#session span#user{
	font-weight: bold;
}
header#topbar a#exit{
	float: right;
	padding: 20px 20px 18px 20px;
	border-left: 1px solid #333
}
