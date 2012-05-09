<?php header('Content-type: text/javascript'); 
session_start();
$s = $_SESSION['s'];
?>
var sales = new Array();
var curSale;
var selItem;
var ib = 0;
var editing = false;
var curCategory = 1;
var tool = "products";

function Item(data){
	this.id = data.id;
	this.title = data.name + " " + data.make;
	this.subprice = data.pricesell;
	this.qty = 1;
	this.tax = data.tax;
	this.ttax = this.subprice * this.qty * this.tax / 100;
	this.total = this.subprice * this.qty + this.ttax;
}

function Sale(saledata){
	if(saledata==undefined||typeof(saledata)==undefined){
		saledata = JSON.parse($.ajax({
			type: "GET",       
			url: "<?php echo$s['r']; ?>sales/saleNew",
			dataType: "json",
			context: document.body,
			global: false,
			async:false,
			success: function(data) {
				return data;
			}
		}).responseText);
	}
	this.id = saledata.id;
	this.startdate = saledata.startdate;
	this.items = new Array();
	this.subtotal = 0;
	this.ttax = 0;
	this.total = 0;
	this.client = 0;
}

function saleNew(){
	var empty = firstEmptySaleGet();
	if(empty>=0){
		saleTouch(empty);
		salesSave();
		ticketChange(empty);
		ticketList();
		saleShow(empty);
	}else{
		sales[sales.length] = new Sale();
		curSale = sales.length-1;
	}
}

function saleEnd(){

}

function saleDel(sale){
	console.log(sales[sale]);
	if(typeof(sale)!=undefined && sales[sale].items.length){
		sales.splice(sale, 1);
		if(sale>0)curSale = sale-1;
		else curSale = 0;
		salesSave();
		saleNewIfNoSale();
		saleShow(curSale);
	}
	ticketList();
}

function saleTouch(id){
	var saledata = JSON.parse($.ajax({
		type: "POST",       
		url: "<?php echo$s['r']; ?>sales/saleTouch",
		data: { id: sales[id].id },
		dataType: "json",
		context: document.body,
		global: false,
		async:false,
		success: function(data) {
			return data;
		}
	}).responseText);
	console.log(saledata);
	sales[id].startdate = saledata.startdate;
	sales[id].id = saledata.id;
}

function firstEmptySaleGet(){
	for(i=0;i<sales.length;i++){
		if(sales[i].items.length==0)return i;
	}
}

function saleNewIfNoSale(){
	if(!sales)sales = new Array();
	if(sales.length==0){
		saleNew();
		curSale = 0;
	}else if(sales[curSale] && sales[curSale].items.length==0){
		saleTouch(curSale);
	}
	salesSave();
}

function savedSalesLoad(){
	if(localStorage.getItem("sales")!=undefined&&localStorage.getItem("curSale")!=undefined){
		sales = JSON.parse(localStorage.getItem("sales"));
		curSale = localStorage.getItem("curSale");
		selItem = sales[curSale||0].items.length-1;
	}
	var dbSales = JSON.parse($.ajax({
		type: "POST",       
		url: "<?php echo$s['r']; ?>sales/getFromDB",
		dataType: "json",
		context: document.body,
		global: false,
		async:false,
		success: function(data) {
			return data;
		}
	}).responseText);
	if(dbSales){
		$.each(dbSales, function(){
			var is = false;
			for(i=0;i<sales.length;i++){
				if(sales[i].id==this.id){
					is=true;
					break;
				}
			}
			var saledata = new Array();
			saledata.id = this.id;
			saledata.startdate = this.startdate;
			if(!is){
				sales[sales.length] = new Sale(saledata);
				curSale = sales.length-1;
			}
		});
	}
}

function salesSave(){
	localStorage.setItem("sales", JSON.stringify(sales));
	localStorage.setItem("curSale", curSale);
}

function saleShow(sale){
	$("section#articles table tbody tr").remove();
	sales[sale].subtotal = 0;
	sales[sale].ttax = 0;
	sales[sale].total = 0;
	for(i=0;i<sales[sale].items.length;i++){
		item = sales[sale].items[i];
		$("section#articles table tbody").append("<tr><td class=\"article\">"+item.title+"</td><td id=\"subprice\" contenteditable>"+parseFloat(item.subprice).toFixed(2)+"</td><td id=\"qty\" contenteditable>"+parseInt(item.qty)+"</td><td id=\"ttax\">"+parseFloat(item.ttax).toFixed(2)+"</td><td id=\"total\" contenteditable>"+parseFloat(item.total).toFixed(2)+"</td></tr>");
		sales[sale].subtotal += parseFloat(item.subprice*item.qty);
		sales[sale].ttax += parseFloat(item.ttax);
		sales[sale].total += parseFloat(item.total);
	}
	$($("section#articles table tbody tr").get(selItem)).addClass("selected");
	$("section#sum > div#subtotal > span.value").html(sales[sale].subtotal.toFixed(2)+"€");
	$("section#sum > div#taxes > span.value").html(sales[sale].ttax.toFixed(2)+"€");
	$("section#sum > div#total > span.value").html(sales[sale].total.toFixed(2)+"€");
	$("header#topbar > div#context > div#ticketinfo > span#ticketno").html(sales[sale].id);
	$("header#topbar > div#context > div#ticketinfo > span#ticketdate").html(sales[sale].startdate);
	if(sales[sale].client>0){
		var clientData = clientGet(sales[sale].client)[0];
		$("section#pad > ul > li#butclients > span.label").html(clientData.name).show();
	}else $("section#pad > ul > li#butclients > span.label").html("").hide();
	bindEvents();
	salesSave();
}

function categoryShow(category){
	catData = categorySearch("id", category)[0];
	categories = categorySearch("parent_id", category);
	products = productSearch("category_id", category);
	grid = $("section#right>section#products>ul#grid");
	grid.empty();
	if(categories)$.each(categories, function(){
		grid.append("<li id=\"" + this.id + "\" class=\"category\" onclick=\"categoryShow(" + this.id + ");\"><img src=\"<?php echo$s['r']; ?>img/categories/" + this.id + ".jpg\" alt=\"NO PHOTO\" /><h1>" + this.name + " " + this.make + "</h1></li>");
	});
	if(products)$.each(products, function(){
		grid.append("<li id=\"" + this.id + "\" class=\"product\" onclick=\"itemAdd(productSearch('id', " + this.id + "));saleShow(curSale);\"><img src=\"<?php echo$s['r']; ?>img/products/" + this.id + ".jpg\" alt=\"NO PHOTO\" /><span class=\"price\">" + (this.pricesell*(1+this.tax/100)).toFixed(2) + "€</span><h1>" + this.name + " " + this.make + "</h1></li>");
	});
	if(category>1){
		route = $("section#right>section#products>header div.route#cat"+catData.parent_id);
		route.empty();
		route.append("<a onclick=\"categoryShow(" + catData.id + ");\">" + catData.name + "<img src=\"<?php echo$s['r']; ?>img/icons/arrow.png\" alt=\">\" /></a><div class=\"route\" id=\"cat" + catData.id + "\"></div>");
	}else{
		$("section#right>section#products>header>div.route#cat1").empty();
	}
	curCategory = category;
}

function itemIsInSale(item){
	res = -1;
	for(i=0;i<sales[curSale].items.length;i++){
		if(sales[curSale].items[i].id==item){
			res = i;
			break;
		}
	}
	return res;
}

function itemAdd(data){
	if(tool=="products"){
		if(data){
			data = data[0];
			s = itemIsInSale(data.id);
			if(s>-1){
				item = sales[curSale].items[s];
				item.qty++;
				item.ttax = item.subprice * item.qty * item.tax / 100;
				item.total = item.subprice * item.qty + item.ttax;
				itemSel(s);
			}else{
				l = sales[curSale].items.length;
				sales[curSale].items[l] = new Item(data);
				itemSel(l);
			}
			articles = $("section#articles")[0];
			setTimeout("articles.scrollTop = articles.scrollHeight", 1);
		}else alert("¡No se ha encontrado ningún producto!");
	}else alert("Sólo se pueden añadir artículos desde la ventana productos");
}

function itemSel(n){
	selItem = typeof(n) != 'undefined' ? n : selItem;
}

function itemDel(n){
	sales[curSale].items.splice(n, 1);
	if(n>0)selItem = n-1;
	saleShow(curSale);
}

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

function categorySearch(searchby, value){
	var catdata = $.ajax({
		type: "POST",       
		url: "<?php echo$s['r']; ?>categories/search",
		data: { searchby: searchby, value: value },
		dataType: "json",
		context: document.body,
		global: false,
		async:false,
		success: function(data) {
			return data;
		}
	}).responseText;
	return JSON.parse(catdata);
}

function ticketChange(ticket){
	 if(typeof ticket == "undefined") {
		if(tool=="tickets")window.location = "<?php echo$s['r']; ?>sales";
		else window.location = "<?php echo$s['r']; ?>sales/tickets";
	 }else{
	 	curSale = ticket;
	 	salesSave();
	 	saleShow(curSale);
	 	ticketHighlight();
	 }
}

function ticketHighlight(){
	 $("body>section#right>section#tickets>ul>li").removeClass("current");
	 $("body>section#right>section#tickets>ul>li:not(#ticketNew):eq("+curSale+")").addClass("current");
}

function ticketList(){
	ul = $("body>section#right>section#tickets>ul");
	ul.children("li:not(#ticketNew)").remove();
	$.each(sales, function(i){
		ul.append("<li><a onclick=\"ticketChange(" + i + ")\" class=\"caption\">TICKET Nº" + this.id + "<span class=\"date\">" + this.startdate + "</span></a></li>");
		if(this.items.length)ul.children("li:not(#ticketNew):eq("+i+")").append("<a onclick=\"saleDel(" + i + ");\" class=\"close\"><img src=\"<?php echo$s['r']; ?>img/icons/delete.png\" alt=\"X\" /></a>");
	});
	ticketHighlight()
}

function clientChange(client){
	 if(typeof client == "undefined") {
		if(tool=="clients")window.location = "<?php echo$s['r']; ?>sales";
		else window.location = "<?php echo$s['r']; ?>sales/clients";
	 }else{
	 	sales[curSale].client = client;
	 	salesSave();
	 	clientChange();
	 }
}

function clientSearch(value){
	var clientData = $.ajax({
		type: "POST",       
		url: "<?php echo$s['r']; ?>clients/search",
		data: { value: value },
		dataType: "json",
		context: document.body,
		global: false,
		async:false,
		success: function(data) {
			return data;
		}
	}).responseText;
	return JSON.parse(clientData);
}

function clientGet(id){
	var clientData = $.ajax({
		type: "POST",       
		url: "<?php echo$s['r']; ?>clients/get",
		data: { id: id },
		dataType: "json",
		context: document.body,
		global: false,
		async:false,
		success: function(data) {
			return data;
		}
	}).responseText;
	return JSON.parse(clientData);
}

function topClients(qty){
	if(typeof(qty)==undefined||qty<1)qty=5;
	var clientData = $.ajax({
		type: "POST",       
		url: "<?php echo$s['r']; ?>clients/top",
		data: { qty: qty },
		dataType: "json",
		context: document.body,
		global: false,
		async:false,
		success: function(data) {
			return data;
		}
	}).responseText;
	return JSON.parse(clientData);
}

function pad(object){
	key = $(object).html();
	if(key >= 0 && key <= 9){
		codify(key);
	}else{
		i = sales[curSale].items[selItem];
		switch(key){
			case "=":
				itemAdd(productSearch('id', ib));
				ib = 0;
				saleShow(curSale);
				break;
			case "+":
				i.qty++;
				i.ttax = i.subprice * i.qty * i.tax / 100;
				i.total = i.subprice * i.qty + i.ttax;
				itemSel();
				saleShow(curSale);
				break;
			case "-":
				if(i.qty>1){
				i.qty--;
				i.ttax = i.subprice * i.qty * i.tax / 100;
				i.total = i.subprice * i.qty + i.ttax;
				}else itemDel(selItem);
				itemSel();
				saleShow(curSale);
				break;
		}
	}
}

function codify(i){
	ib += i.toString();
}

function bindEvents(){
	$('section#articles table tbody tr td:first-child').click(function(){
		itemSel($(this).parent().index());
		saleShow(curSale);
	});
	$('section#articles table tbody tr td').focus(function(){
		editing = $(this);
	});
	$('section#articles table tbody tr td').blur(function(){
		n = editing.parent().index();
		i = sales[curSale].items[n];
		p = editing.index();
		switch(p){
			case 1:
				subprice = parseFloat(editing.html());
				i.subprice = subprice.toFixed(2);
				i.ttax = i.subprice * i.qty * i.tax / 100;
				i.total = i.subprice * i.qty + i.ttax;
				saleShow(curSale);
			case 2:
				q = parseFloat(editing.html());
				if(q>0){
					i.qty = q;
					i.ttax = i.subprice * i.qty * i.tax / 100;
					i.total = i.subprice * i.qty + i.ttax;
					itemSel();
				}else itemDel(n);
				saleShow(curSale);
				break;
			case 4:
				total = parseFloat(editing.html());
				i.total = total
				i.subprice = total / i.qty / (1 + i.tax / 100);
				i.ttax = i.subprice * i.qty * i.tax / 100;
				saleShow(curSale);
		}
		editing = false;
	});
}

$(document).ready(function(){
	savedSalesLoad();
	saleNewIfNoSale();
	saleShow(curSale);
	$(document).keydown(function(e){
		i = sales[curSale].items[selItem];
		switch(e.keyCode){
			case 8: //BASCKSPACE
				if(tool=="products"&&!editing){
					e.preventDefault();
					itemDel(selItem);
				}
				break;
			case 13: //RETURN
				e.preventDefault();
				if(editing){
					editing.blur();
				}else{
					itemAdd(productSearch('id', ib));
					ib = 0;
					saleShow(curSale);
				}
				break;
			case 38: //UP
				if(selItem>0)selItem--;
				else selItem = sales[curSale].items.length-1;
				saleShow(curSale);
				break;
			case 40: //DOWN
				if(selItem<sales[curSale].items.length-1)selItem++;
				else selItem = 0;
				saleShow(curSale);
				break;
			case 61: //+
				i.qty++;
				i.ttax = i.subprice * i.qty * i.tax / 100;
				i.total = i.subprice * i.qty + i.ttax;
				itemSel();
				saleShow(curSale);
				break;
				break;
			case 107: //+
				i.qty++;
				i.ttax = i.subprice * i.qty * i.tax / 100;
				i.total = i.subprice * i.qty + i.ttax;
				itemSel();
				saleShow(curSale);
				break;
			case 109: //-
				if(i.qty>1){
				i.qty--;
				i.ttax = i.subprice * i.qty * i.tax / 100;
				i.total = i.subprice * i.qty + i.ttax;
				}else itemDel(selItem);
				itemSel();
				saleShow(curSale);
				break;
			case 187: //+
				i.qty++;
				i.ttax = i.subprice * i.qty * i.tax / 100;
				i.total = i.subprice * i.qty + i.ttax;
				itemSel();
				saleShow(curSale);
				break;
			case 189: //-
				if(i.qty>1){
				i.qty--;
				i.ttax = i.subprice * i.qty * i.tax / 100;
				i.total = i.subprice * i.qty + i.ttax;
				}else itemDel(selItem);
				itemSel();
				saleShow(curSale);
				break;
			default:
				if(e.which >= 48 && e.which <=57)codify(e.which-48);
				if(e.which >= 96 && e.which <=105)codify(e.which-96);
				break;
		}
	});
	$('section#pad table td').click(function(){
		pad(this);
	});
});
