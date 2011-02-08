<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<script type="text/javascript" src="assets/js/interface.js"></script>
<link rel="stylesheet" type="text/css" href="assets/style/style.css" />
<title><?php echo SITE_NAME; ?></title>
<SCRIPT LANGUAGE = "JavaScript">
<!--
var secs
var timerID = null
var timerRunning = false
var delay = 1000
var defaultWidth = 232; 
var defaultHeight = 112; 

var arImg = new Array(); 
arImg[0] = ['assets/img/1.gif']; 
arImg[1] = ['assets/img/2.gif']; 
arImg[2] = ['assets/img/3.gif']; 
arImg[3] = ['assets/img/4.gif']; 
arImg[4] = ['assets/img/5.gif']; 

function InitializeTimer()
{
	timeDuration = 4
    secs = timeDuration
    StartTheTimer()
}

function StartTheTimer()
{
    if (secs==0)
    {

        rotateImage()
		secs = timeDuration
		timerID = self.setTimeout("StartTheTimer()", delay)
    }
    else
    {
        self.status = secs
        secs = secs - 1
        timerRunning = true
        timerID = self.setTimeout("StartTheTimer()", delay)
    }
}

function rotateImage(){ 
  
        index = Math.floor(Math.random() * arImg.length); 
  
    (img = document.getElementById('imagesgal')).src = arImg[index][0]; 
    img.width = (arImg[index][1]) ? arImg[index][1] : defaultWidth; 
    img.height = (arImg[index][2]) ? arImg[index][2] : defaultHeight; 
} 

//-->
</SCRIPT>