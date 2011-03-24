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
		alert('Give a valid email');
		return(false);
		}
	}