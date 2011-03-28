<script type="text/javascript">	function validate(form_id,ref)
{
		   var reg1 = /^.{6}$/;
		   var reg = /[2-9]{3,3}$/;
		   var reg2=/^[A-HJ-NP-Z]{3,3}/;
		   var address = document.forms[form_id].elements[ref].value;
		   if(reg1.test(address)==true)
				{
				if(reg.test(address)==true) 
					{
					if(reg2.test(address)==false)
						{
						alert('You have used I or O.');
						return false;
						}
					else 
						{
							return true;
							}
					}	
				else
					{alert('You have used 0 or 1.');
						return false;
					}
				}
			else
				{alert('Too much/less letters or numbers.');
					return false;
				}
}
</script>

 <form id="test" method="post" onSubmit="javascript:return validate('test','ref');">
		<table id="details">
          
   <tr class="email"><td>Email Address</td><td><input type="text" name="ref" />
        </table>
    <input type="submit" name="submit" value="submit"/>
       </form>

