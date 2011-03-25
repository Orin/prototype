<script type="text/javascript">	function validate(form_id,ref){q
		   var reg = /^([ABCDEFGHJKLMNPQRSTUVWXYZ]{3}+[23456789]{3}$/;
		   var address = document.forms[form_id].elements[ref].value;
		   if(reg.test(address)==false) {
			  alert('Invalid Email Address');
			  return false;
		   }
	}</script>

 <form id="test" method="post" onSubmit="javascript:return validate('test','ref');">
		<table id="details">
          
   <tr class="email"><td>Email Address</td><td><input type="text" name="ref" />
        </table>
    <input type="submit" name="submit" value="submit" onBlur="javascript:return validate('test','ref');"/>
       </form>

