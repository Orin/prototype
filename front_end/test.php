<script type="text/javascript" >
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
</script>
 <form action="" name="vaild" method="post" onSubmit="return(VerifForm(this))">
		<table id="details">
          
   <tr class="email"><td>Email Address</td><td><input type="text" name="email" />
        </table>
    <input type="submit" name="submit" value="submit" />
       </form>
