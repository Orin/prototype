function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
      }

//function which check the email is correct or not.
function isEmail(form_id,email) {
		   var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
		   var address = document.forms[form_id].elements[email].value;
		   if(reg.test(address) == false) { 
			  return false;
		   }else 
			  return true;
	}
function isLetters(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
  if ((charCode > 64 && charCode < 91)|| (charCode > 96 && charCode < 123) || (charCode == 8) || charCode == 13 || charCode == 32)
            return true;

         return false;
      }

function greaterZero(form_id,greater) { 

		   var address = document.forms[form_id].elements[greater].value;
		   if( address >0) { 
			  return true;
		   }else 
			  return false;
	}
	
function showError (errorID,show)
{
	if(show){document.getElementById(errorID).style.visibility = 'visible';}
	else{document.getElementById(errorID).style.visibility = 'hidden';}
}

function isNumber (val)
{
	return /^\d+$/.test(val);
}
function isletter (val)
{
	return /^[a-zA-Z]$/.test(val);
	
}

function isFlightNumber (form_id, fNo)
{

	var form =  document.forms[form_id];
	var flightNo = form.elements[fNo].value;
	if(flightNo.charAt(0) != 'T' || flightNo.charAt(1) != 'A') {return false;}
	var i;
	for(i=2; i<flightNo.length; i++)
	{
		var chk = isNumber(flightNo.charAt(i));
		if(!chk) {return false}
	}
	return true;
	
}

function isBookingRef (form_id, ref)
{
	var form =  document.forms[form_id];
	var bookingRef = form.elements[ref].value;
	if(bookingRef.length != 5) {return false;}
	for (var i = 0; i <=2; i++)
	{
		if(!isletter(bookingRef.charAt(i))){return false;}
	}
	if(!isNumber(bookingRef.charAt(3))){return false;}
	if(!isletter(bookingRef.charAt(4))){return false;}
	
	return true;
	
	
}
	
function formVal(errorID, form_ID,inputName, fName)
{
	
	if(fName == "isEmail"){showError(errorID,isEmail(form_ID,inputName));}
	if(fName == "isFlightNo"){showError(errorID,!isFlightNumber(form_ID,inputName));}
	if(fName == "isBookingRef"){showError(errorID,!isBookingRef(form_ID,inputName));}
}

//function which check if the flight number is correct.
function isCorrect(form_id, flight_number) {
		   var reg = /[A-HJ-NP-Z]{3}+[2-9]{3}$/;
		   var number = document.forms[form_id].elements[flight_number].value;
		   if(reg.test(number) == false) {
			  return false;
		   }else
			  return true;
	}
