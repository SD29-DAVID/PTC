<?php include('includes/config.inc.php'); require_once('includes/online.inc.php'); $banned = getRealIP(); $myDb->connect(); $query = mysql_query("SELECT reason FROM yob_banned WHERE ip = '$banned'") or die(mysql_error()); $data = mysql_fetch_array($query); $myDb->close(); $reason = $data['reason']; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php echo SITENAME." - ".SITESLOGAN;?></title>
<link rel="stylesheet" type="text/css" href="css/main.css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/print.css" media="print" />
<!--[if lte IE 6]>
<link rel="stylesheet" type="text/css" href="css/ie6_or_less.css" />
<![endif]-->
</head>
<body id="type-b">
<div id="wrap">
	<div id="header">
		<div id="site-name"><?php echo SITENAME; ?></div>
	</div>
	<div id="content-wrap">
		<div id="content">
			<p class="error">YOUR IP ADDRESS ( <?php echo $banned;?> ) HAS BEEN BANNED</p>
			<p><strong>Reason:</strong><br /><span class="error"><?php echo $reason;?></span><br /></p>
			<br />&nbsp;<br />&nbsp;<br />&nbsp;<br /><br />&nbsp;<br />&nbsp;<br />&nbsp;<br /><br />&nbsp;<br />&nbsp;<br />&nbsp;<br />
			<div id="footer">
			<p><?php include('footer_ads.php'); ?></p>
			</div>
		</div>			
		<div id="poweredby">
			Copyright &copy; 2008. All Rights Reserved.
		</div>
		
	</div>
	
</div>
</body>
</html>