<body>
  <div id="page-wrapper">
    <?php //Include page header, except where specified
	$level = $_SESSION['level'];
    if (show_header($page, $admin_no_header)) { ?>
		<div id="header-wrapper">
		<?php if($level == 1){include 'pages/header.php';}
			  else {include 'pages/headerStaff.php';}
		?>
        </div>
	<?php }
    //Determine page being requested, and include file from /pages/
    //General Pages
	
	
    if ($page == 'index' 					&& ($level ==1))	{?><div id="<?php echo $page; ?>"><?php include 'pages/main.php'; ?></div><?php }
	elseif ($page == 'index' 					&& ($level >1))		{?><div id="<?php echo $page; ?>"><?php include 'pages/mainStaff.php'; ?></div><?php }
    elseif ($page == 'login') 									{?><div id="<?php echo $page; ?>"><?php include 'pages/login.php'; ?></div><?php }
    elseif ($page == 'loginfail-pw') 							{?><div id="<?php echo $page; ?>"><?php include 'pages/login.php'; ?></div><?php }
    elseif ($page == 'loginfail-nousr') 						{?><div id="<?php echo $page; ?>"><?php include 'pages/login.php'; ?></div><?php }
    elseif ($page == 'flightinfo' 			&& ($level <=1)) 	{?><div id="<?php echo $page; ?>"><?php include 'pages/flightinfo.php'; ?></div><?php }
	elseif ($page == 'processFlight'		&& ($level <=1))	{?><div id="<?php echo $page; ?>"><?php include 'pages/processFlight.php'; ?></div><?php }
	elseif ($page == 'FlightSelect'			&& ($level <=1)) 	{?><div id="<?php echo $page; ?>"><?php include 'pages/FlightSelect.php'; ?></div><?php }
	elseif ($page == 'scheduleInfo'			&& ($level <=2)) 	{?><div id="<?php echo $page; ?>"><?php include 'pages/scheduleInfo.php'; ?></div><?php }
	elseif ($page == 'processSchedule'		&& ($level <=2)) 	{?><div id="<?php echo $page; ?>"><?php include 'pages/processSchedule.php'; ?></div><?php }
	elseif ($page == 'editFlightSchedule'	&& ($level <=2)) 	{?><div id="<?php echo $page; ?>"><?php include 'pages/editFlightSchedule.php'; ?></div><?php }
	elseif ($page == 'users'				&& ($level <=1)) 	{?><div id="<?php echo $page; ?>"><?php include 'pages/users.php'; ?></div><?php }
	elseif ($page == 'addUser'				&& ($level <=1)) 	{?><div id="<?php echo $page; ?>"><?php include 'pages/addUser.php'; ?></div><?php }
	elseif ($page == 'report'				&& ($level <=2)) 	{?><div id="<?php echo $page; ?>"><?php include 'pages/report.php'; ?></div><?php }
	elseif ($page == 'airports'				&& ($level <=2)) 	{?><div id="<?php echo $page; ?>"><?php include 'pages/airports.php'; ?></div><?php }
	elseif ($page == 'travelAgents'			&& ($level <=2)) 	{?><div id="<?php echo $page; ?>"><?php include 'pages/travelAgents.php'; ?></div><?php }
	elseif ($page == 'flightAndScheduleSearch'&& ($level <=2)) 	{?><div id="<?php echo $page; ?>"><?php include 'pages/flightAndScheduleSearch.php'; ?></div><?php }
	elseif ($page == 'viewFlight'			&& ($level <=2)) 	{?><div id="<?php echo $page; ?>"><?php include 'pages/viewFlight.php'; ?></div><?php }
	elseif ($page == 'viewCustomer'			&& ($level <=2)) 	{?><div id="<?php echo $page; ?>"><?php include 'pages/viewCustomer.php'; ?></div><?php }
	elseif ($page == 'customerSearch'		&& ($level <=2)) 	{?><div id="<?php echo $page; ?>"><?php include 'pages/customerSearch.php'; ?></div><?php }
	elseif ($page == 'processscheduleEdit'	&& ($level <=2)) 	{?><div id="<?php echo $page; ?>"><?php include 'pages/processscheduleEdit.php'; ?></div><?php }
	elseif ($page == 'discounts'			&& ($level <=1)) 	{?><div id="<?php echo $page; ?>"><?php include 'pages/discounts.php'; ?></div><?php }
	elseif ($page == 'discountsPricing'		&& ($level <=2)) 	{?><div id="<?php echo $page; ?>"><?php include 'pages/discountsPricing.php'; ?></div><?php }
	elseif ($page == 'ApplyDiscountFlight'	&& ($level <=2)) 	{?><div id="<?php echo $page; ?>"><?php include 'pages/ApplyDiscountFlight.php'; ?></div><?php }
	elseif ($page == 'ApplyDiscountSchedule'&& ($level <=2)) 	{?><div id="<?php echo $page; ?>"><?php include 'pages/ApplyDiscountSchedule.php'; ?></div><?php }
	elseif ($page == 'modFlightPrice'		&& ($level <=2)) 	{?><div id="<?php echo $page; ?>"><?php include 'pages/modFlightPrice.php'; ?></div><?php }
	elseif ($page == 'custInfoEdit'			&& ($level <=2)) 	{?><div id="<?php echo $page; ?>"><?php include 'pages/custInfoEdit.php'; ?></div><?php }
	elseif ($page == 'addTA'				&& ($level <=1)) 	{?><div id="<?php echo $page; ?>"><?php include 'pages/addTA.php'; ?></div><?php }
	elseif ($page == 'addAP'				&& ($level <=1)) 	{?><div id="<?php echo $page; ?>"><?php include 'pages/addAP.php'; ?></div><?php }
	elseif ($page == 'processUser'			&& ($level <=1)) 	{?><div id="<?php echo $page; ?>"><?php include 'pages/processUser.php'; ?></div><?php }
	elseif ($page == 'refineFlights'		&& ($level <=1)) 	{?><div id="<?php echo $page; ?>"><?php include 'pages/refineFlights.php'; ?></div><?php }
	elseif ($page == 'refineSchedule'		&& ($level <=2)) 	{?><div id="<?php echo $page; ?>"><?php include 'pages/refineSchedule.php'; ?></div><?php }
	elseif ($page == 'processDiscount'		&& ($level <=2)) 	{?><div id="<?php echo $page; ?>"><?php include 'pages/processDiscount.php'; ?></div><?php }
	elseif ($page == 'processPriceChange'	&& ($level <=2)) 	{?><div id="<?php echo $page; ?>"><?php include 'pages/processPriceChange.php'; ?></div><?php }
	elseif ($page == 'removeDBrow'			&& ($level <=1)) 	{?><div id="<?php echo $page; ?>"><?php include 'pages/removeDBrow.php'; ?></div><?php }
	elseif ($page == 'processFlightUpdate'	&& ($level <=1)) 	{?><div id="<?php echo $page; ?>"><?php include 'pages/processFlightUpdate.php'; ?></div><?php }
	elseif ($page == 'deleteBooking'	    && ($level <=1)) 	{?><div id="<?php echo $page; ?>"><?php include 'pages/deleteBooking.php'; ?></div><?php }
	elseif ($page == 'viewBooking'	        && ($level <=1)) 	{?><div id="<?php echo $page; ?>"><?php include 'pages/viewBooking.php'; ?></div><?php }
	elseif ($page == 'processCustomerUpdate'&& ($level <=1)) 	{?><div id="<?php echo $page; ?>"><?php include 'pages/processCustomerUpdate.php'; ?></div><?php }
	elseif ($page == 'genReport'      		&& ($level <=1)) 	{?><div id="<?php echo $page; ?>"><?php include 'pages/genReport.php'; ?></div><?php }
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
