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
			//Left Column
			?><div id="<?php echo $page; ?>"><?php 
			include 'pages/pageProcess.php';
			include 'pages/leftColumn.php'; 
            //General Pages
            if ($page == 'index') { include 'pages/home.php';  }
            
            elseif ($page == 'details') include 'pages/details.php';
            elseif ($page == 'confirmation') include 'pages/confirmation.php';
            elseif ($page == 'flights') include 'pages/flights.php';
            elseif ($page == 'bookingInfo') include 'pages/bookingInfo.php';
			elseif ($page == 'manage-booking') include 'pages/manage-booking.php';
			elseif ($page == 'travel-agents') include 'pages/travel-agents.php';
			elseif ($page == 'startOver') 'pages/home.php';
            
            //Else show page not found error
            else {?>
                <div class="error">
                    <?php include 'pages/error.php'; ?>
                </div>
            <?php }
            ?></div><?php
            //Always include footer ?>
            <div id="footer">
                <?php include 'pages/footer.php';?>
            </div>
        
        </div>
    </div>
</body>
