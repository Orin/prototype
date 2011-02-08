<body>
  <div id="page-wrapper">
    <?php //Include page header, except where specified
    if (show_header($page, $admin_no_header)) { ?>
		<div id="header-wrapper">
		<?php include 'pages/header.php'; ?>
        </div>
	<?php }
    //Determine page being requested, and include file from /pages/
    //General Pages
    if ($page == 'index') {?><div id="<?php echo $page; ?>"><?php include 'pages/main.php'; ?></div><?php }
    elseif ($page == 'login') {?><div id="<?php echo $page; ?>"><?php include 'pages/login.php'; ?></div><?php }
    elseif ($page == 'loginfail-pw') {?><div id="<?php echo $page; ?>"><?php include 'pages/login.php'; ?></div><?php }
    elseif ($page == 'loginfail-nousr') {?><div id="<?php echo $page; ?>"><?php include 'pages/login.php'; ?></div><?php }
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
	elseif ($page == 'flightAndScheduleSearch') {?><div id="<?php echo $page; ?>"><?php include 'pages/flightAndScheduleSearch.php'; ?></div><?php }
	elseif ($page == 'viewFlight') {?><div id="<?php echo $page; ?>"><?php include 'pages/viewFlight.php'; ?></div><?php }
	elseif ($page == 'viewCustomer') {?><div id="<?php echo $page; ?>"><?php include 'pages/viewCustomer.php'; ?></div><?php }
	elseif ($page == 'customerSearch') {?><div id="<?php echo $page; ?>"><?php include 'pages/customerSearch.php'; ?></div><?php }
	elseif ($page == 'flightinfoEdit') {?><div id="<?php echo $page; ?>"><?php include 'pages/flightinfoEdit.php'; ?></div><?php }
	elseif ($page == 'scheduleInfoEdit') {?><div id="<?php echo $page; ?>"><?php include 'pages/scheduleInfoEdit.php'; ?></div><?php }
	elseif ($page == 'processscheduleEdit') {?><div id="<?php echo $page; ?>"><?php include 'pages/processscheduleEdit.php'; ?></div><?php }
	elseif ($page == 'EditCostingStrucInfo') {?><div id="<?php echo $page; ?>"><?php include 'pages/EditCostingStrucInfo.php'; ?></div><?php }
	elseif ($page == 'discounts') {?><div id="<?php echo $page; ?>"><?php include 'pages/discounts.php'; ?></div><?php }
	elseif ($page == 'viewCostingStructures') {?><div id="<?php echo $page; ?>"><?php include 'pages/viewCostingStructures.php'; ?></div><?php }
	elseif ($page == 'discountsPricing') {?><div id="<?php echo $page; ?>"><?php include 'pages/discountsPricing.php'; ?></div><?php }
	elseif ($page == 'ApplyDiscountFlight') {?><div id="<?php echo $page; ?>"><?php include 'pages/ApplyDiscountFlight.php'; ?></div><?php }
	elseif ($page == 'ApplyDiscountSchedule') {?><div id="<?php echo $page; ?>"><?php include 'pages/ApplyDiscountSchedule.php'; ?></div><?php }
	elseif ($page == 'modFlightPrice') {?><div id="<?php echo $page; ?>"><?php include 'pages/modFlightPrice.php'; ?></div><?php }

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
