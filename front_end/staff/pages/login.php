<body>
<div id="page-wrapper">
  <?php
  session_destroy();
  
  
  $login = (isset($_GET['login']))? $_GET['login'] : 'NA'; 
  if($login == "failed") {
    print $_GET['cause'];
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
        <input type="text" name="pw" />
        <br>
        </br>
        <input type="hidden" name="action" value="login" />
        <input type="submit" />
      </form>
    </div>
  </div>
</div>
</body>
