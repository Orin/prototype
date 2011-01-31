<body id="outer-page">
	<div id="page-inner">
        <div id="wrapper">
            <?php //Always include page title ?>
            <div id="outer-header">
                <?php include 'pages/header.php';?>
            </div>
            
            <?php //Determine page being requested, and include file from /pages/
            //
            //General Pages
            if ($page == 'index') {?><div id="<?php echo $page; ?>"><?php include 'pages/main.php'; ?></div><?php }
			elseif ($page == 'login') {?><div id="<?php echo $page; ?>"><?php include 'pages/login.php'; ?></div><?php }
            
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
