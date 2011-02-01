<body>
  <div id="page-wrapper">
    <?php //Always include page title
    if (show_header($page, $admin_no_header)) {
		include 'pages/header.php';
	} ?>
  
    <?php 
    //Determine page being requested, and include file from /pages/
    //General Pages
    if ($page == 'index') {?><div id="<?php echo $page; ?>"><?php include 'pages/main.php'; ?></div><?php }
    elseif ($page == 'login') {?><div id="<?php echo $page; ?>"><?php include 'pages/login.php'; ?></div><?php }
    elseif ($page == 'flightinfo') {?><div id="<?php echo $page; ?>"><?php include 'pages/flightinfo.php'; ?></div><?php }
	elseif ($page == 'viewCostingStructures') {?><div id="<?php echo $page; ?>"><?php include 'pages/viewCostingStructures.php'; ?></div><?php }
	elseif ($page == 'processFlight') {?><div id="<?php echo $page; ?>"><?php include 'pages/processFlight.php'; ?></div><?php }
	elseif ($page == 'FlightSelect') {?><div id="<?php echo $page; ?>"><?php include 'pages/FlightSelect.php'; ?></div><?php }
	elseif ($page == 'scheduleInfo') {?><div id="<?php echo $page; ?>"><?php include 'pages/scheduleInfo.php'; ?></div><?php }
	elseif ($page == 'processSchedule') {?><div id="<?php echo $page; ?>"><?php include 'pages/processSchedule.php'; ?></div><?php }
	elseif ($page == 'editFlightSchedule') {?><div id="<?php echo $page; ?>"><?php include 'pages/editFlightSchedule.php'; ?></div><?php }
    
    //Else show page not found error
    else {?>
      <div class="error">
          <?php include 'pages/error.php'; ?>
      </div>
    <?php }
    
    //Always include footer ?>
    <div id="footer">
       <?php //include 'pages/footer.php';?>
    </div>
  </div>
</body>
