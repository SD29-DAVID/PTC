<?php
 session_start(); include('includes/config.inc.php'); $myDb->connect(); $sql = "SELECT * FROM yob_site WHERE id='1'"; $result = mysql_query($sql); $row = mysql_fetch_array($result); $myDb->close(); define('AD_TIMER',$row['adtimer']);  $logged_in=isset($_COOKIE["usNick"]) && isset($_COOKIE["usPass"]); $ad_id=limpiar($_GET["ad"]); $myDb->connect(); $ad_result=mysql_query("SELECT * FROM yob_ads WHERE id='$ad_id'"); $myDb->close();  if (mysql_num_rows($ad_result)==0) { echo "Ad doesn't exist"; exit(); } $ad_row=mysql_fetch_array($ad_result);  if(!$logged_in) { $myDb->connect(); mysql_query("UPDATE yob_ads SET outside=outside+1 WHERE id='$ad_id'"); $myDb->close(); }   function get_codes($num,$len) { for($i=0;$i<$num;++$i) { $codes[]=substr(strtoupper(md5(rand(1000,1000000000))),0,$len); } return $codes; } $codes=get_codes(4,3); $_SESSION['captcha']=$codes[rand(0,count($codes)-1)]; $mycode = $_SESSION['captcha']; ?>
<html>
    <head>
        <title><?php echo SITENAME." - ".SITESLOGAN; ?></title>
        <link rel="stylesheet" type="text/css" href="css/adview.css">
        <style type="text/css">
            <?php if($logged_in): ?>
			#header {background: #666 url("images/sprites.gif") repeat-x 0 100%;margin: 0 0 25px;padding: 0 0 8px;height:45px}
			#header #clock {font: 265% arial;letter-spacing: -.05em;margin:0 0 0 40px;padding:3px 0;color:#ccc;border:none; float:left;position:fixed;width:50%}
			#header #site-name {font: 265% arial;letter-spacing: -.05em;margin:0 40px 0 0;padding:3px 0;color:#ccc;border:none; float:right;position:relative}
			* {margin:0;padding:0}
body {padding: 0 0 20px;background: #fff;font:83%/1.5 arial,tahoma,verdana,sans-serif}

            <?php else: ?>
            #message { position: absolute; top:0; left:0; width:100%; height: 30px; color:#fff;  background: #000; text-align:center; z-index: 10000; }
            <?php endif; ?>
            iframe { position: absolute; left:0;top:50;width:100%;height:100%; z-index: 100; }
        </style>
        <meta http-equiv="Pragma" content="no-cache">
        <meta http-equiv="Expires" content="-1">
        <?php if($logged_in): ?>
		<script type="text/javascript">
		var t = <?php echo AD_TIMER ?>;
		var decr = 1;
		var handle = null;
		var e = null;
		function startTimer() {
		if(!e)
		e = document.getElementById("time");
		e.innerHTML = t;
		handle = setInterval(function() {
		if(t == 0) {
		clearInterval(handle);

				var answer = confirm("Want To take credit for this visit?")
				if (answer){
					alert("Your Account Has Been Credited!")
					window.location = "visit.php?ad=<?php echo $ad_id; ?>&code=<?php echo $mycode;?>&url=<?php echo $ad_row['url']; ?>";
				}
				else{
					alert("Your Account Has NOT Been Credited!")
				}


		}
		else {
		t -= decr;
		e.innerHTML = t;
		}
		}, decr * 1000);
		}
		window.onload = startTimer;
		</script>
        <?php endif; ?>
    </head>
    
    <body>
    <?php if($logged_in): ?>
	<div id="header">
	<div id="clock"><span id="time"></span></div>
	<div id="site-name"><?php echo SITENAME ?></div>
	</div>
    <?php else: ?>
        <div id="message">
            To take credit for this visit, please log-in.
        </div>
    <?php endif; ?>

    <iframe src="<?php echo $ad_row['url']; ?>" border="0" framespacing="0" marginheight="0" marginwidth="0" vspace="0" hspace="0" frameborder="0" height="100%" scrolling="yes" width="100%" id="site"></iframe>
    </body>
</html>