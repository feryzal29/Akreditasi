function infounit(keyword,unit){
	var xmlhttp;
	// JSON INPUT
	obj = {"key":Number(keyword)};
	fparam = JSON.stringify(obj);
	
	document.getElementsByClassName("sub-content")[0].innerHTML = "";
	document.getElementById("save").disabled = true;
	
	if (window.XMLHttpRequest)
	{	// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	}
	else
	{	// code for IE6, IE5
	  xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	xmlhttp.onreadystatechange = function()
	{
	  if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
		{
			try{
				var outp = JSON.parse(this.responseText);
				kode_unit = keyword;
				nama_unit = unit;
//				document.getElementsByClassName("unit")[0].textContent = outp[0].unit;
				document.getElementById("tanggal").value = outp[0].tgl;
//				document.getElementsByName("radio")[0].checked = true;
				document.getElementById("submit").disabled = false;
				document.getElementById("loading").style.display = "none"; 
			}catch(e){
				console.log(e);
				document.getElementById("submit").disabled = true;
				document.getElementById("notif").textContent = e;
				document.getElementById("notif").style.display = "block";
				document.getElementById("loading").style.display = "none";
			}
		}
	}
	
	xmlhttp.onerror = function(){
		console.log("Network Unavailable!");
		document.getElementById("notif").textContent = "Network Unavailable!";
		document.getElementById("notif").style.display = "block";
	}
	
	xmlhttp.open("POST","php/info_unit.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("fparam="+fparam);
}

function indikator(){	
	var xmlhttp;
	// JSON INPUT
	//obj = {"tipe":document.querySelector("input[name='radio']:checked").value,"tgl":document.getElementById("tanggal").value,"kode":kode_unit};
	obj	= {"key":"sometext"};
	fparam = JSON.stringify(obj);
	
	document.getElementById("notif").style.display = "none";
	document.getElementById("loading").style.display = "block";
	document.getElementsByClassName("sub-content")[0].innerHTML = "";
	document.getElementById("save").disabled = true;

	if (window.XMLHttpRequest)
	{	// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	}
	else
	{	// code for IE6, IE5
	  xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	xmlhttp.onreadystatechange = function()
	{
	  if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
		{
			try{ 
				var outp = JSON.parse(this.responseText);
				document.getElementById("loading").style.display = "none";
				dparse(outp,function(total){
					total<1?alert("Empty result!"):document.getElementById("save").disabled = false;
				});
			}catch(e){
				console.log(e);
				document.getElementById("notif").textContent = e;
				document.getElementById("notif").style.display = "block";
				document.getElementById("loading").style.display = "none";
			}
		}
	}
	
	xmlhttp.onerror = function(){
		console.log("Network Unavailable!");
		document.getElementById("notif").textContent = "Network Unavailable!";
		document.getElementById("notif").style.display = "block";
	}
	
	xmlhttp.open("POST","php/indikator.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("fparam="+fparam);
}

function dparse(outp,callback){
	var parent = document.getElementsByClassName("sub-content")[0];
	var before;
	var i = 0;
	while(i<outp.length){
		if(before==outp[i].nama){
			before = outp[i].nama;		//	Marking Variable
			var indikator = document.querySelector("div[class='indikator']:last-child");
			
		//	var formula = document.createElement("div");
		//	formula.className = "formula";
		//	formula.textContent = outp[i].simbol+": "+outp[i].nama;
			
			var nilai = document.createElement("input");
			nilai.id = outp[i].id;
			nilai.className = "nilai";
			nilai.setAttribute("type","number");
			nilai.setAttribute("min","0");
			nilai.setAttribute("max","100");
			nilai.setAttribute("placeholder","0-100");
			
		//	indikator.appendChild(formula);
			indikator.appendChild(nilai);
		}else{
			before = outp[i].nama;		//	Marking Variable
			var indikator = document.createElement("div");
			indikator.className = "indikator";
			
			var judul = document.createElement("div");
			judul.className = "judul";
			judul.textContent = outp[i].nama;
			
		//	var formula = document.createElement("div");
		//	formula.className = "formula";
		//	formula.textContent = outp[i].simbol+": "+outp[i].nama;
			
			var nilai = document.createElement("input");
			nilai.id = outp[i].id;
			nilai.className = "nilai";
			nilai.setAttribute("type","number");
			nilai.setAttribute("min","0");
			nilai.setAttribute("max","100");
			nilai.setAttribute("placeholder","0-100");
	
			//	Append Elements
			indikator.appendChild(judul);
		//	indikator.appendChild(formula);
			indikator.appendChild(nilai);
			parent.appendChild(indikator);
		}		
		i++
	}
	callback(outp.length);
}

function dsave(){
	var result = new Array();
	var obj = document.getElementsByClassName("nilai");
	var i = 0;
	
	while(i<obj.length){
		var temp = {"formula_id":Number(obj[i].id),"skor":obj[i].value==""?0:Number(obj[i].value)};
		result.push(temp);
		i++;
	}
	
	isave(kode_unit,nama_unit,document.getElementById("tanggal").value,JSON.stringify(result));
}

function isave(kode,unit,tanggal,obj){
	var xmlhttp;
	
	document.getElementById("loading").style.display="block";
	document.getElementById("save").disabled=true;
	document.body.scrollTop = 0; // For Safari
	document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
	
	if (window.XMLHttpRequest)
	{	// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	}
	else
	{	// code for IE6, IE5
	  xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	xmlhttp.onreadystatechange = function()
	{
	  if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
		{
			try{ 
				var outp = JSON.parse(this.responseText);
				var i = 0;
				var x = 0;
				while(i<outp.length){
					outp[i]==false?x++:void(0);
					i++
				}	
			
				document.getElementsByClassName("sub-content")[0].innerHTML = "";
				document.getElementById("notif").style.display = "block";
				
				if(outp.length==x){
					document.getElementById("notif").innerHTML = "<font style='color:green'>data successfully inserted!</font>";
				}else{
					document.getElementById("notif").textContent = "Problem occured! contact administrator for this date.";
				}
				
				document.getElementById("loading").style.display = "none";
			}catch(e){
				console.log(e);
				document.getElementById("notif").textContent = e;
				document.getElementById("notif").style.display = "block";
				document.getElementById("loading").style.display = "none";
				document.getElementById("save").disabled=false;
			}
		}
	}
	
	xmlhttp.onerror = function(){
		console.log("Network Unavailable!");
		document.getElementById("notif").textContent = "Network Unavailable!";
		document.getElementById("notif").style.display = "block";
		document.getElementById("loading").style.display = "none";
		document.getElementById("save").disabled=false;
	}
	
	xmlhttp.open("POST","php/isave.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("fparam="+obj+"&tgl="+tanggal+"&kode="+kode+"&unit="+unit);
}