function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
      }

//function which check the email is correct or not. If not it gives an alert.
function validate(form_id,email) {
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
