<script type="text/javascript">	function validate(form_id,ref) {
		   var reg = /^([I-IO-O0-0_\-\.])$/;
		   var address = document.forms[form_id].elements[email].value;
		   if(reg.test(address) == false) {
			  alert('Invalid Email Address');
			  return false;
		   }
	}</script>

 <form id="test" method="post" onSubmit="javascript:return validate('test','email');">
		<table id="details">
          
   <tr class="email"><td>Email Address</td><td><input type="text" name="ref" />
        </table>
    <input type="submit" name="submit" value="submit" onBlur="javascript:return validate('test','email');"/>
       </form>

