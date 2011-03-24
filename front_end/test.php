<script type="text/javascript" >
	function verifMail(formulaire){
	adresse=formulaire.email.value;
	var place=adresse.indexOf(@,1);
	var dot=adresse.indexOf(".",place+1);
	if ((dot > -1)&&(adresse.length >2)&&(dot > 1))
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
 <form action="http://www2.macs.hw.ac.uk/~ms498/prototype/front_end/test.php" name="vaild" method="post" onSubmit="return(VerifForm(this))">
		<table id="details">
          
   <tr class="email"><td>Email Address</td><td><input type="text" name="email" />
        </table>
    <input type="submit" name="submit" value="submit" />
       </form>
