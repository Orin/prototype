<script type="text/javascript">	function validate(form_id,ref){
		   var reg1 = /^.{6}$/;
		   var reg = /[2-9]{3,3}$/;
		   var address = document.forms[form_id].elements[ref].value;
		   if(reg1.test(address)==true){
			   if(reg.test(address)==false) {
				  alert('Invalid Email Address');
				  return false;
				}
				else
				alert('ok');
		   }else
				alert('Encule');
	}</script>

 <form id="test" method="post" onSubmit="javascript:return validate('test','ref');">
		<table id="details">
          
   <tr class="email"><td>Email Address</td><td><input type="text" name="ref" />
        </table>
    <input type="submit" name="submit" value="submit"/>
       </form>

