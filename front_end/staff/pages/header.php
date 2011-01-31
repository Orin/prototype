<?php
//include ("config/functions.inc.php");

									//get from a query later on 
									
								$airports[0] = '';
								$airports[1] = 'MAN';
								$airports[2] = 'LBA';
								$airports[3] = 'LPL';
								$airports[4] = 'EMA';
								$airports[5] = 'BHX';
								$airports[6] = 'LTN';
								$airports[7] = 'STN';
								$airports[8] = 'LHR';
								$airports[9] = 'LGW';
								$airports[10] = 'LCY';
								$airports[11] = 'BRS';
								$airports[12] = 'CWL';
								$airports[13] = 'ABZ';
								$airports[14] = 'NCL';
								$airports[15] = 'EDI';
								
								
								$costing[0] = '';
								$costing[1] = 'LTN-BRS';
								$costing[2] = 'CWL-LPL';
								$costing[3] = 'LCY-ABZ';
								$costing[4] = 'EDI-NCL';
								$costing[5] = 'EDI-CWL';
								$costing[6] = 'BHX-LPL';
								
								$accessLvl[0] = '';
								$accessLvl[1] = 'Manager';
								$accessLvl[2] = 'Staff';
								
?>

<script type="text/javascript"  language="javascript">
function select(key, type)
{
	//type =1 is flight
	//type =2 is schedule
	// type=3 is costing
	if(type=='1')
	{
		window.location = "flightinfoEdit.php?flightNo="+key;

	}
	else if(type =='2')
	{
		window.location = "scheduleInfoEdit.php?ScheduleID="+key;
	}
	
	else if(type =='3')
	{
		window.location = "EditCostingStrucInfo.php?priceID="+key;
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
	
	var values= ["TA-EDI-LBA-101", "TA-EDI-LBA-102","TA-LGW-MAN-101","TA-EDI-BHX-102"];
	
	//textBox.value = "sddsa";
	if (key < 32 || (key >= 112 && key <= 123)) 
	{
        if(textBox.value == ""){removeList(divname,"div1");}
    }
	else if(key ==38 || key == 40)
	{
		moveSelected(key,values,textBox);
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
	/*
	DOSENT WORK COZ OF THE SUGESTED THING MAYBE TAKE OUT OR MAKE A FIX
function moveSelected(direction,dataSet,textBox)
	{
		var txt = textBox.value;
		var sugested = getSugested(txt,dataSet);
		
		
		if(direction ==40)
		{
			alert(sugested);
			for(var i=0;i<dataSet.length; i++)
			{
				if(sugested[i]==txt)
				{
					textBox.value=sugested[i++];
					break;
				}
			}
		}
	
	}*/


</script>

<div id="header">
<h2> Thistle Airways Booking and Management System Portal</h2>
		<form align=right> 
			<input type="button" value="Logout" onClick="window.location = 'logout.html';"> 
		</form>
</div>

<div id="topNav">
	<table id="topNavTable">
		<tr>
		<td><a href="main.php"><p>Home</p></a></td>
		<td><a href="flightinfo.php"><p>Add Flight</p></a></td>
		<td><a href="FlightSelect.php"><p>Edit Flight</p></a></td>
		<td><a href="scheduleInfo.php"><p>Add Schedule</p></a></td>
		<td><a href="editFlightSchedule.php"><p>Edit Schedule</p></a></td>
		<td><a href="AddCostingStruc.php"><p>Add Costing Structure</p></a></td>
		<td><a href="EditCostingStruc.php"><p>Edit Costing Structure</p></a></td>
		<td><a href="users.php"><p>Users</p></a></td>
		</tr>
	</table>

</div>

<div id="content">
<p>Welcome, 
<?php echo $_SESSION["name"]; ?><br></br>
</p>
