function select(key, type)
{
	//type =1 is flight
	//type =2 is schedule
	// type=3 is costing
	if(type=='1')
	{

		window.location = "flightinfo.html";

	}
	else if(type =='2')
	{
		//window.location = "scheduleInfoEdit.php?ScheduleID="+key;
		window.location = "scheduleInfo.html";
	}

	else if(type =='3')
	{
		//window.location = "EditCostingStrucInfo.php?priceID="+key;
		window.location = "EditCostingStrucInfo.html";
	}
	else if(type=='4')
	{
		window.location = "expenceEdit.php";
	}
	else if(type=='5')
	{
		window.location = "EditVarCost.php";
	}
	else if(type=='6')
	{
		window.location = "UserEdit.php";
	}


}
function getSugested(txt, dataSet)
	{

		var sugested =[];


	// THIS CAN BE OPTIMISED IF NACASERRY, IM JUST LAZY
	for(var i = 0; i < dataSet.length; ++i)
	{
	//alert(sugested);
		for(var j=0; j<txt.length; ++j)
		{
			if(txt.charAt(j)!=dataSet[i].charAt(j))
			{

				break;
			}
			if(j == txt.length-1)
			{

				sugested.push(dataSet[i]);
			}
		}
	}

	//TO HERE
	return sugested;
	}

function instanceAF(textBox, dataSet,divname)
{

	var txt = textBox.value;

	var sugested = getSugested(txt,dataSet);


	if (sugested.length >0)
	{
		var len = txt.length;
		textBox.value=sugested[0];
		selectRange(len,sugested[0].length,textBox);

		if(!document.getElementById("div1"))
		{
			CreateDropDown(divname, sugested);
		}
		else
		{if(sugested.length !=1){appendSelection(sugested, "div1",divname);}else{removeList(divname,"div1")}}
	}

}

function appendSelection(newSelection, divId, divname)
	{

		var html = generateSelectionTable(newSelection, divname);
		document.getElementById("div1").innerHTML = html;

	}
function generateSelectionTable(list, divname)
	{
		var divCont ="<table id='dropdown'>";
		for(var i=0;i<list.length;++i)
		{
			divCont += "<tr><td onClick=\"handleClickDropDown('"+list[i]+"','"+divname+"');\">"+list[i]+"</td></tr>";
		}
		divCont+="</table>";

        return divCont;

	}
function handleClickDropDown(selected, divname)
	{
		var div = divname
		div = typeof div === "string" ? document.getElementById(div) : div;
        var elms = div.getElementsByTagName("input");
		elms[0].value = selected;
		removeList(divname, "div1")


	}
function selectRange(iStart, iLength, txtBox) {
    if (txtBox.createTextRange) {
        var range = txtBox.createTextRange(); 
        range.moveStart("character", iStart); 
        range.moveEnd("character", iLength - txtBox.value.length); 
        range.select();
    } else if (txtBox.setSelectionRange) {
        txtBox.setSelectionRange(iStart, iLength);
    }

    txtBox.focus(); 
}


function autoFills(key,textBox, dataSet, divname)
{

	var values;
	//if(dataSet == 1)
	//values= ["TA-EDI-LBA-101", "TA-EDI-LBA-102","TA-LGW-MAN-101","TA-EDI-BHX-102"];
	values=dataSet;
	//document.write(values[0]);
	//else if(dataSet == 2)
	//{values= ["BN-00561", "BN-00563454","BN-00532","BN-007561"];}
	
	//textBox.value = "sddsa";

	
	if (key < 32 || (key >= 112 && key <= 123)) 
	{
        if(textBox.value == ""){removeList(divname,"div1");}
    }
	else if(key ==38 || key == 40)
	{
		moveSelected(key,textBox);
	}
	else {
        instanceAF(textBox, values,divname);

    }

}

function CreateDropDown(div, list)
    {
        var divTag = document.createElement("div");
        
        divTag.id = "div1";
        
        divTag.setAttribute("align","center");
        
		divTag.style.position = "absolute";
        divTag.style.margin = "0px auto";
        divTag.style.zIndex="1";
        divTag.className ="dynamicDiv";
        
		var divCont = generateSelectionTable(list, div);

        divTag.innerHTML = divCont;


		 var backColor = new String();
         backColor = divTag.style.backgroundColor;

		    if(backColor.toLowerCase()=='#eeeeee' || backColor.toLowerCase()=='rgb(238, 238, 238)')
            {
                divTag.style.backgroundColor = '#c0c0c0';
            }
            else
            {
                divTag.style.backgroundColor = '#eeeeee';
            }
        
        document.getElementById(div).appendChild(divTag);
    }
function removeList(container, removie)
	{

			var cont = document.getElementById(container);
			var removed = document.getElementById(removie);
			cont.removeChild(removed);
	}

function moveSelected(direction,textBox)
	{

		var txt = textBox.value;
		var sugested = extractValues();

		if(direction ==40)
		{

			for(var i=0;i<sugested.length; i++)
			{
				if(sugested[i]==txt)
				{
					textBox.value=sugested[++i];
					break;
				}
			}
		}
		if(direction ==38)
		{

			for(var i=0;i<sugested.length; i++)
			{
				if(sugested[i]==txt)
				{
					textBox.value=sugested[--i];
					break;
				}
			}
		}

	}
function extractValues()
	{

		var sugest = document.getElementById("dropdown");
		var sugested = [];

		for (var row = 0; row < sugest.rows.length; row++) 
		{
			sugested.push(sugest.rows[row].cells[0].firstChild.data);

		}
		//sugest.rows[1].cells[0].firstChild.style.backgroundColor = 'Red';"
		return sugested;

	}


