<body>
<div id="page-wrapper">
  <?php
  session_destroy();
  
  if($page == "loginfail-pw" || $page == "loginfail-nousr") {
	if ($page == "loginfail-pw") { echo 'Error: Incorrect password'; }
	if ($page == "loginfail-nousr") { echo 'Error: Invalid username'; }
  }
  ?>
  <div id="header">
    <h2> Thistle Airways Booking and Management System Portal</h2>
  </div>
  <div id="content">
    <div id="logindiv">
      <form name="login_form" method="post" action="index.html" >
        Username:
        <input type="text" name="uname" />
        <br>
        </br>
        Password:
        <input type="password" name="pw" />
        <br>
        </br>
        <input type="hidden" name="action" value="login" />
        <input type="submit" />
      </form>
    </div>
  </div>
</div>
</body>
