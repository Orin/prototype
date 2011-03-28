
function highlightSelect(inOut, id, totalPsngrs) {
	//var thisFlight = evt.target;
	var thisFlight = document.getElementById(id);
	
	if (thisFlight.className == inOut) {
		var rows = document.getElementsByClassName(inOut);
		for (var i=0; i < rows.length; i++) {
			rows[i].className = inOut;
		}
		thisFlight.className = inOut + " pickedFlt";
		updateLeft(thisFlight, inOut, totalPsngrs);
	} 
} 

function updateLeft(thsFlight, inOut, totalPsngrs) {
	document.getElementById("div-display-selected-" + inOut).style.visibility = "visible";
	document.getElementById("div-selected-total").style.visibility = "visible";
	document.getElementById("display-selected-" + inOut).innerHTML = '<table class="table-selected">'+ thsFlight.innerHTML + '</table>';
	
	//Show Continue button
	showSubmit(totalPsngrs);
}

function showSubmit(totalPsngrs) {
	var outb = document.getElementById("div-display-selected-out").style.visibility;
	var inb = document.getElementById("div-display-selected-in").style.visibility;
	if (outb == "visible" && inb == "visible") {
		document.getElementById("continue").style.visibility = "visible";
	}
	
	//Total update
	var outPrice  = 0;
	var inPrice = 0;
	if (outb == "visible") { outPrice = document.forms['fltDetails'].elements['outPrice'].value; }
	if (inb == "visible") { inPrice = document.forms['fltDetails'].elements['returnPrice'].value; }
	var total = (parseInt(outPrice) + parseInt(inPrice))*parseInt(totalPsngrs);
	document.getElementById("display-selected-total").innerHTML = total;
	
	ajaxSelected(outb, inb);
}

function ajaxSelected(outVis, inVis)
{
	var class = document.forms['fltDetails'].elements['class'].value;
	var passengers = document.forms['fltDetails'].elements['passengers'].value;
	var adults = document.forms['fltDetails'].elements['adults'].value;
	var children = document.forms['fltDetails'].elements['children'].value;
	var totalPrice = document.getElementById("display-selected-total").innerHTML;

	var ajax_url = 'ajax.php?action=select&class='+class+'&passengers='+passengers+'&adults='+adults+'&children='+children+'&totalPrice='+totalPrice;
	
	if (outVis == "visible") {
		var outPrice = document.forms['fltDetails'].elements['outPrice'].value;
		var outDate = document.forms['fltDetails'].elements['outDate'].value;
		var outDepart = document.forms['fltDetails'].elements['outDepart'].value;
		var outArrive = document.forms['fltDetails'].elements['outArrive'].value;
		var outFrom = document.forms['fltDetails'].elements['outFrom'].value;
		var outTo = document.forms['fltDetails'].elements['outTo'].value;
		var outFlight = document.forms['fltDetails'].elements['outFlight'].value;
		var outScheduleID = document.forms['fltDetails'].elements['outScheduleID'].value;
		ajax_url = ajax_url+'&outPrice='+outPrice+'&outDate='+outDate+'&outDepart='+outDepart+'&outArrive='+outArrive+'&outFrom='+outFrom+'&outTo='+outTo+'&outFlight='+outFlight+'&outScheduleID='+outScheduleID;
	}
	if (inVis == "visible") {
		var returnPrice = document.forms['fltDetails'].elements['returnPrice'].value;
		var returnDate = document.forms['fltDetails'].elements['returnDate'].value;
		var returnDepart = document.forms['fltDetails'].elements['returnDepart'].value;
		var returnArrive = document.forms['fltDetails'].elements['returnArrive'].value;
		var returnFrom = document.forms['fltDetails'].elements['returnFrom'].value;
		var returnTo = document.forms['fltDetails'].elements['returnTo'].value;
		var returnFlight = document.forms['fltDetails'].elements['returnFlight'].value;
		var returnScheduleID = document.forms['fltDetails'].elements['returnScheduleID'].value;
		ajax_url = ajax_url+'&returnPrice='+returnPrice+'&returnDate='+returnDate+'&returnDepart='+returnDepart+'&returnArrive='+returnArrive+'&returnFrom='+returnFrom+'&returnTo='+returnTo+'&returnFlight='+returnFlight+'&returnScheduleID='+returnScheduleID;;
	}
	
	var ajax = new XMLHttpRequest();
	ajax.onreadystatechange=function()
	{
		if (ajax.readyState==4 && ajax.status==200)
		{
			var success = ajax.responseText;
		}
	}
	ajax.open("GET", ajax_url, true);
	ajax.send();
}

function cartAdd() {
	var ajax = new XMLHttpRequest();
	ajax.onreadystatechange=function()
	{
		if (ajax.readyState==4 && ajax.status==200)
		{
			if (ajax.responseText == 'success') {
				window.location = ("details.html");
			} else { console.log(ajax.responseText); 
			document.getElementById('continue').innerHTML = '<a id="continueButton" href="javascript:cartAdd();">Continue</a>';
			}
		}
	}
	ajax.open("GET", 'ajax.php?action=cartAdd', true);
	ajax.send();
	document.getElementById('continue').innerHTML = "<span id='processing'>Processing...</span>";
}

