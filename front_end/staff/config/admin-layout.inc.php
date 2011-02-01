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
	elseif ($page == 'AddCostingStruc') {?><div id="<?php echo $page; ?>"><?php include 'pages/AddCostingStruc.php'; ?></div><?php }
	elseif ($page == 'processCosting') {?><div id="<?php echo $page; ?>"><?php include 'pages/processCosting.php'; ?></div><?php }
	elseif ($page == 'EditCostingStruc') {?><div id="<?php echo $page; ?>"><?php include 'pages/EditCostingStruc.php'; ?></div><?php }
	elseif ($page == 'users') {?><div id="<?php echo $page; ?>"><?php include 'pages/users.php'; ?></div><?php }
	elseif ($page == 'addUser') {?><div id="<?php echo $page; ?>"><?php include 'pages/addUser.php'; ?></div><?php }
	elseif ($page == 'report') {?><div id="<?php echo $page; ?>"><?php include 'pages/report.php'; ?></div><?php }
	elseif ($page == 'expenditures') {?><div id="<?php echo $page; ?>"><?php include 'pages/expenditures.php'; ?></div><?php }
	elseif ($page == 'airports') {?><div id="<?php echo $page; ?>"><?php include 'pages/airports.php'; ?></div><?php }
	elseif ($page == 'travelAgents') {?><div id="<?php echo $page; ?>"><?php include 'pages/travelAgents.php'; ?></div><?php }

	
	/*
	<tr><td><a href="report.html">Generate Report</a></td></tr>
		<tr><td><a href="editFlightSchedule.html">Edit a Flight Schedule</a></td></tr>
		<tr><td><a href="scheduleInfo.html">Add Flight Schedule</a></td></tr>
		<tr><td><a href="FlightSelect.html">Edit A Flight</a></td></tr>
		<tr><td><a href="flightinfo.html">Add Flight</a></td></tr>
		<tr><td><a href="AddCostingStruc.html">Add Costing Structure</a></td></tr>
		<tr><td><a href="EditCostingStruc.html">Edit Costing Structure</a></td></tr>
		<tr><td><a href="expendatures.html">Company Expenditures</a></td></tr>
		<tr><td><a href="airports.html">Maintain Airports</a></td></tr>
		<tr><td><a href="travleAgents.html">Maintain Travel Agents</a></td></tr>
		*/
    
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
