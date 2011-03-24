<script type="text/javascript">	function validate(form_id,ref) {
		   
		   var address = document.forms[form_id].elements[ref].value;
		   if(address == %O% || address == %I% || address == %1%|| address == %0%) {
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

