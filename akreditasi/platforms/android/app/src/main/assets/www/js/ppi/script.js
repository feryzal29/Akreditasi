// JavaScript Document
var kode_unit;
var nama_unit;

window.onload = function(){
	try{
		var sent_keyword = window.location.search;
		if (sent_keyword.substring(0, 1) == '?') {
			sent_keyword = sent_keyword.substring(1);
			keyword = sent_keyword.split("&q=");
			
			document.getElementById("loading").style.display = "block";
			infounit(keyword[0],keyword[1]);
		}else{
			document.getElementById("notif").textContent = "empty param!";
			document.getElementById("notif").style.display = "block";
		}
	}
	catch(err_sent_keyword){
		document.getElementById("notif").textContent = err_sent_keyword;
		document.getElementById("notif").style.display = "block";
		console.log(err_sent_keyword.message);
	}
};