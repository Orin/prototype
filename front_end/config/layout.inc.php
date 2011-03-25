<body id="page">
	<div id="page-inner">
        <div id="top-bar">
           <div id="page-title">Thistle Airways</div>
           
        </div>
        <div id="wrapper">
            <?php //Always include page title ?>
            <div id="header">
                <?php include 'pages/header.php';?>
            </div>
            
            <?php //Determine page being requested, and include file from /pages/
            //
            //General Pages
            if ($page == 'index') {?><div id="<?php echo $page; ?>"><?php include 'pages/home.php'; ?></div><?php }
            
            elseif ($page == 'details') {?><div id="<?php echo $page; ?>"><?php include 'pages/pageProcess.php'; include 'pages/details.php'; ?></div><?php }
            elseif ($page == 'confirmation') {?><div id="<?php echo $page; ?>"><?php include 'pages/pageProcess.php'; include 'pages/confirmation.php'; ?></div><?php }
            elseif ($page == 'flights') {?><div id="<?php echo $page; ?>"><?php include 'pages/pageProcess.php'; include 'pages/flights.php'; ?></div><?php }
            elseif ($page == 'bookingInfo') {?><div id="<?php echo $page; ?>"><?php include 'pages/bookingInfo.php'; ?></div><?php }
			elseif ($page == 'manage-booking') {?><div id="<?php echo $page; ?>"><?php include 'pages/manage-booking.php'; ?></div><?php }
			elseif ($page == 'travel-agents') {?><div id="<?php echo $page; ?>"><?php include 'pages/travel-agents.php'; ?></div><?php }
			/*elseif ($page == 'searchProcess') {?><div id="<?php echo $page; ?>"><?php include 'pages/searchProcess.php'; ?></div><?php }*/
			elseif ($page == 'startOver') {?><div id="<?php echo $page; ?>"><?php include 'pages/home.php'; ?></div><?php }
            
            //Else show page not found error
            else {?>
                <div class="error">
                    <?php include 'pages/error.php'; ?>
                </div>
            <?php }
            
            //Always include footer ?>
            <div id="footer">
                <?php include 'pages/footer.php';?>
            </div>
        
        </div>
    </div>
</body>
