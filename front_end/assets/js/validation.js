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

		console.log(form_id + " "+greater);
		   var address = document.forms[form_id].elements[greater].value;
		   if( address >0) { 
			  return true;
		   }else 
			  return false;
	}
	
function showError (errorID)
{
	document.getElementById(errorID).style.visibility = 'visible'; 
}
	
function formVal(errorID, form_ID,inputName, fName)
{

	if(fName == "isEmail"){if (!isEmail(form_ID,inputName)) {showError(errorID)}}
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