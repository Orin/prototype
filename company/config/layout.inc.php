<body onLoad="InitializeTimer()">
	<div id="wrapper">
            <?php //Always include page title ?>
            <div id="header">
                <?php include 'pages/header.php';?>
            </div>
            
            <div id="leftcol">
				<?php include 'pages/left-column.php'; ?>
			</div>
            
			<div id="content">
              <div id="seperator">
                <img src="assets/img/seperator.gif" alt="SDA" />
              </div>
              <div id="main">
				<?php 
                //Determine page being requested, and include file from /pages/
                //
                //General Pages
                if ($page == 'index') {?><div id="<?php echo $page; ?>"><?php include 'pages/home.php'; ?></div><?php }
                
				elseif ($page == 'alexandros-repana' || $page == 'craig-matear' || $page == 'hang-li' || $page == 'mathieu-saillet' || $page == 'michael-shannon' || $page == 'steven-preston') 
                    {?>
                      <div id="<?php echo $page; ?>">
                        <img src="assets/img/profile pic/<?php echo $page; ?>.gif" align="right" alt="SDA" />
                        <?php include 'pages/'.$page.'.php'; ?>
                      </div>
					<?php }
				elseif($page == 'contact')
				{?>
				<div id="<?php echo $page; ?>">
                        <?php include 'pages/'.$page.'.php'; ?>
                      </div>
				
				
				<?php }
				elseif($page == 'sendMail')
				{?>
				<div id="<?php echo $page; ?>">
                        <?php include 'pages/'.$page.'.php'; ?>
                      </div>
				
				
				<?php }
                
                
                //Else show page not found error
                else {?>
                    <div class="error">
                        <?php include 'pages/error.php'; ?>
                    </div>
                <?php } ?>
              </div>
            </div>
            
            <?php //Always include footer ?>
            <div id="footer">
                <?php //include 'pages/footer.php';?>
            </div>
    </div>
</body>