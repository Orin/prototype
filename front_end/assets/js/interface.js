function fltsInit() {
	//for (var i=1; i<5; i++) {
		//document.getElementById(i).className = "";
		//document.getElementById(i).onmousedown = highlightSelect;
	//}
}

function select(key, type)
{
	/*if(type == '1')
	{
		var d = document.getElementById("display-selected");
		d.className("outbound").innerHTML = "Outbound Flight<br />10/02/11 @ 11:35 - £40";
	}
	*/

}

function highlightSelect(inbOutb, id) {
	//var thisFlight = evt.target;
	var thisFlight = document.getElementById(id);
	var inOut = "";
	if (inbOutb == 0) { inOut = "out"; }
	if (inbOutb == 1) { inOut = "in"; }
	
	if (thisFlight.className == inOut) {
		var rows = document.getElementsByClassName(inOut);
		for (var i=0; i < rows.length; i++) {
			rows[i].className = inOut;
		}
		thisFlight.className = inOut + " pickedFlt";
		updateLeft(thisFlight, inOut);
	} 
} 

function updateLeft(thsFlight, innOut) {
	document.getElementById("div-display-selected-" + innOut).style.visibility = "visible";
	var thisdiv = document.getElementById("display-selected-" + innOut);
	//thisdiv.style.visibility = "visible";
	/*var content = thsFlight.innerHTML;
	var details = new Array();
	details = content.split('</td>');
	var price = details[0].substring(19);
	var date = details[1].substring(4);
	var dep = details[2].substring(4);
	var arr = details[3].substring(4);
	var from = details[4].substring(4);
	var to = details[5].substring(4);
	var fltNo = details[6].substring(18);
	console.log(price);
	console.log(date);
	console.log(dep);
	console.log(arr);
	console.log(from);
	console.log(to);
	console.log(fltNo);*/
	thisdiv.innerHTML = '<table class="table-selected">'+ thsFlight.innerHTML + '</table>';
	showSubmit();
}

function showSubmit() {
	var outb = document.getElementById("div-display-selected-out").style.visibility;
	var inb = document.getElementById("div-display-selected-in").style.visibility;
	if (outb == "visible" && inb == "visible") {
		document.getElementById("continue").style.visibility = "visible";
	}
}