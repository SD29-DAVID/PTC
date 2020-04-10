<?php include('includes/config.inc.php');
	  require_once('includes/online.inc.php');
	  require_once('includes/banned.inc.php');
?>
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
		<?php include('menu_top.php');?>
	</div>
	
	<div id="content-wrap">
	
		<div id="utility">
		<?php include('menu_left.php');?>
		</div>