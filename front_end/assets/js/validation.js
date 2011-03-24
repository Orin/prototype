function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
      }

//function which check the email is correct or not. If not it gives an alert.
function verifMail(formulaire){
	email=formulaire.email.value;
	var place=email.indexOf(@,1);
	var dot=email.indexOf(".",place+1);
	if ((dot > -1)&&(email.length >2)&&(dot > 1))
		{
		formulaire.submit();
		return(true);
		}
	else
		{
		alert('Give a valid email!');
		return(false);
		}
	}

function isLetters(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
  if ((charCode > 64 && charCode < 91)|| (charCode > 96 && charCode < 123) || (charCode == 8) || charCode == 13 || charCode == 32)
            return true;

         return false;
      }
