<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>YourOwnBux 4.0 Installation</title>
<link rel="stylesheet" type="text/css" href="../css/main.css" media="screen" />
<link rel="stylesheet" type="text/css" href="../css/print.css" media="print" />
<!--[if lte IE 6]>
<link rel="stylesheet" type="text/css" href="css/ie6_or_less.css" />
<![endif]-->
</head>
<body id="type-b">
<div id="wrap">
	<div id="header">
		<div id="site-name">YourOwnBux v4.0 Installation</div>
	</div>
	<div id="content-wrap">
		<div id="content">
			<h2>Welcome to YourOwnBux 4.0 Installation</h2>
<?php
include ('../includes/database/database.inc.php');
$myDb = new Db;
if ($_POST['admin']){
$admin = $_POST['admin'];
$pass = $_POST['password'];
$password = sha1($pass);
$sitename = $_POST['sitename'];
$slogan = $_POST['slogan'];
$siteurl = $_POST['siteurl'];
$siteap = $_POST['siteap'];
$apcode = $_POST['apcode'];
$adtimer = $_POST['adtimer'];
echo "<h3>Creating Database</h3><br />";
$myDb->connect(); $query1 = mysql_query("
								CREATE TABLE IF NOT EXISTS `yob_ads` (
								  `id` int(11) NOT NULL auto_increment,
								  `user` varchar(150) collate latin1_general_ci NOT NULL default '',
								  `ip` varchar(15) collate latin1_general_ci NOT NULL default '',
								  `tipo` varchar(150) collate latin1_general_ci NOT NULL default '',
								  `visitime` varchar(150) collate latin1_general_ci NOT NULL default '',
								  `ident` int(11) default NULL,
								  `fechainicia` varchar(150) collate latin1_general_ci NOT NULL default '',
								  `paypalname` varchar(150) collate latin1_general_ci NOT NULL default '',
								  `paypalemail` varchar(150) collate latin1_general_ci NOT NULL default '',
								  `plan` varchar(150) collate latin1_general_ci NOT NULL default '',
								  `bold` varchar(150) collate latin1_general_ci NOT NULL default '',
								  `highlight` varchar(150) collate latin1_general_ci NOT NULL default '',
								  `url` varchar(150) collate latin1_general_ci NOT NULL default '',
								  `description` varchar(150) collate latin1_general_ci NOT NULL default '',
								  `members` varchar(150) collate latin1_general_ci NOT NULL default '0',
								  `outside` varchar(150) collate latin1_general_ci NOT NULL default '0',
								  `total` varchar(150) collate latin1_general_ci NOT NULL default '0',
								  KEY `id` (`id`)
								) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;");
                                if($query1){
                                echo "<span>Table `yob_ads` Successfully Created.</span><br />";
                                }else{
                                echo "<p class='error'>Impossible to Create `yob_ads` Table.</p>"; }
                                $query1b = mysql_query("
								INSERT INTO `yob_ads` (`id`, `user`, `ip`, `tipo`, `visitime`, `ident`, `fechainicia`, `paypalname`, `paypalemail`, `plan`, `bold`, `highlight`, `url`, `description`, `members`, `outside`, `total`) VALUES
								(1, 'admin', '', 'premiumads', '', NULL, '', 'Sponsored Advert', 'Sponsored Advert', '100000', '1', '1', 'http://www.domain.com', 'Premum Ads - Bold / Highlighted', '0', '0', '0'),
								(2, 'admin', '', 'premiumads', '', NULL, '', 'Sponsored Advert', 'Sponsored Advert', '100000', '0', '1', 'http://www.domain.com', 'Premium Ads - Highlighted', '0', '0', '0'),
								(3, 'admin', '', 'premiumads', '', NULL, '', 'Sponsored Advert', 'Sponsored Advert', '100000', '1', '0', 'http://www.domain.com', 'Premium Ads - Bold', '0', '0', '0'),
								(4, 'admin', '', 'premiumads', '', NULL, '', 'Sponsored Advert', 'Sponsored Advert', '100000', '0', '0', 'http://www.domain.com', 'Premium Ads', '0', '0', '0'),
								(5, 'admin', '', 'ads', '', NULL, '', 'Sponsored Advert', 'Sponsored Advert', '500', '1', '1', 'http://www.domain.com', 'Standard Ads - Bold / Highlighted', '0', '0', '0'),
								(6, 'admin', '', 'ads', '', NULL, '', 'Sponsored Advert', 'Sponsored Advert', '100000', '0', '1', 'http://www.domain.com', 'Standard Ads - Highlighted', '0', '0', '0'),
								(7, 'admin', '', 'ads', '', NULL, '', 'Sponsored Advert', 'Sponsored Advert', '100000', '1', '0', 'http://www.domain.com', 'Standard Ads - Bold', '0', '0', '0'),
								(8, 'admin', '', 'ads', '', NULL, '', 'Sponsored Advert', 'Sponsored Advert', '100000', '0', '0', 'http://www.domain.com', 'Standard Ads', '0', '0', '0');");
                                if($query1b){
                                echo "<span>Table `yob_ads` Successfully Filled.</span><br />";
                                }else{
                                echo "<p class='error'>Impossible to Fill `yob_ads` Table.</p>"; }
                                $query2 = mysql_query("
								CREATE TABLE IF NOT EXISTS `yob_adsense` (
								  `id` varchar(11) NOT NULL default '',
								  `code` text NOT NULL,
								  KEY `id` (`id`)
								) ENGINE=MyISAM DEFAULT CHARSET=latin1;");
                                if($query2){
                                echo "<span>Table `yob_adsense` Successfully Created.</span><br />";
                                }else{
                                echo "<p class='error'>Impossible to Fill `yob_adsense` Table.</p>"; }
                                $query2b = mysql_query("
								INSERT INTO `yob_adsense` (`id`, `code`) VALUES
								('1', '<script type=\"text/javascript\"><!--\r\ngoogle_ad_client = \"pub-123456789\";\r\n/* 728x90, creado 4/07/08 */\r\ngoogle_ad_slot = \"0065018768\";\r\ngoogle_ad_width = 728;\r\ngoogle_ad_height = 90;\r\n//-->\r\n</script>\r\n<script type=\"text/javascript\"\r\nsrc=\"http://pagead2.googlesyndication.com/pagead/show_ads.js\">\r\n</script>');");
                                if($query2b){
                                echo "<span>Table `yob_adsense` Successfully Filled.</span><br />";
                                }else{
                                echo "<p class='error'>Impossible to Fill `yob_adsense` Table.</p>"; }
                                $query3 = mysql_query("
								CREATE TABLE IF NOT EXISTS `yob_advertisers` (
								  `id` int(11) NOT NULL auto_increment,
								  `pname` varchar(150) NOT NULL default '',
								  `pemail` varchar(150) NOT NULL default '',
								  `plan` varchar(150) NOT NULL default '',
								  `url` varchar(150) NOT NULL default '',
								  `description` varchar(150) NOT NULL default '',
								  `ip` varchar(15) NOT NULL default '',
								  `bold` varchar(150) NOT NULL default '',
								  `highlight` varchar(150) NOT NULL default '',
								  `tipo` varchar(150) NOT NULL default '',
								  `money` varchar(150) NOT NULL default '',
								  `viewable` varchar(150) NOT NULL default '',
								  KEY `id` (`id`)
								) ENGINE=MyISAM  DEFAULT CHARSET=latin1;");
                                if($query3){
                                echo "<span>Table `yob_advertisers` Successfully Filled.</span><br />";
                                }else{
                                echo "<p class='error'>Impossible to Fill `yob_advertisers` Table.</p>"; }
                                $query4 = mysql_query("
								CREATE TABLE IF NOT EXISTS `yob_banned` (
								  `id` int(11) NOT NULL auto_increment,
								  `ip` varchar(20) NOT NULL default '',
								  `reason` varchar(250) NOT NULL default '',
								  PRIMARY KEY  (`id`)
								) ENGINE=MyISAM  DEFAULT CHARSET=latin1;");
                                if($query4){
                                echo "<span>Table `yob_banned` Successfully Created.</span><br />";
                                }else{
                                echo "<p class='error'>Impossible to Create `yob_banned` Table.</p>"; }
                                $query5 = mysql_query("
								CREATE TABLE IF NOT EXISTS `yob_buyref` (
								  `id` int(11) NOT NULL auto_increment,
								  `refnum` varchar(15) NOT NULL default '',
								  `sets` varchar(150) NOT NULL default '',
								  `customer` varchar(150) NOT NULL default '',
								  `amount` varchar(150) NOT NULL default '',
								  `refset` varchar(20) NOT NULL default '',
								  `pemail` varchar(150) NOT NULL default '',
								  `ip` varchar(15) NOT NULL default '',
								  KEY `id` (`id`)
								) ENGINE=MyISAM  DEFAULT CHARSET=latin1;");
                                if($query5){
                                echo "<span>Table `yob_buyref` Successfully Created.</span><br />";
                                }else{
                                echo "<p class='error'>Impossible to Create `yob_buyref` Table.</p>"; }
                                $query6 = mysql_query("
								CREATE TABLE IF NOT EXISTS `yob_cheaters` (
								  `id` int(11) NOT NULL auto_increment,
								  `user` varchar(150) NOT NULL default '',
								  `ip` varchar(15) NOT NULL default '',
								  `date` varchar(50) NOT NULL default '0000-00-00',
								  `time` time NOT NULL default '00:00:00',
								  KEY `id` (`id`)
								) ENGINE=MyISAM  DEFAULT CHARSET=latin1;");
                                if($query6){
                                echo "<span>Table `yob_cheaters` Successfully Created.</span><br />";
                                }else{
                                echo "<p class='error'>Impossible to Create `yob_cheaters` Table.</p>"; }
                                $query7 = mysql_query("
								CREATE TABLE IF NOT EXISTS `yob_config` (
								  `id` int(11) NOT NULL auto_increment,
								  `item` varchar(150) NOT NULL default '',
								  `howmany` varchar(15) NOT NULL default '',
								  `price` varchar(150) NOT NULL default '',
								  KEY `id` (`id`)
								) ENGINE=MyISAM  DEFAULT CHARSET=latin1;");
                                if($query7){
                                echo "<span>Table `yob_config` Successfully Created.</span><br />";
                                }else{
                                echo "<p class='error'>Impossible to Create `yob_config` Table.</p>"; }
                                $query7b = mysql_query("
								INSERT INTO `yob_config` (`id`, `item`, `howmany`, `price`) VALUES
								(1, 'offerads', '500', '5.00'),
								(1, 'offerads', '250', '2.50'),
								(1, 'offerads', '100', '1.00'),
								(1, 'offerads', '50', '1.00'),
								(1, 'hits', '100000', '1005'),
								(1, 'hits', '50000', '505'),
								(1, 'hits', '30000', '105'),
								(1, 'hits', '20000', '205'),
								(1, 'hits', '10000', '105'),
								(1, 'hits', '5000', '55'),
								(1, 'hits', '3000', '35'),
								(1, 'hits', '2000', '25'),
								(1, 'hits', '1000', '15'),
								(1, 'hits', '500', '0.55'),
								(1, 'upgrade', '1', '45.99'),
								(1, 'payment', '1', '5.00'),
								(1, 'premiumreferalc', '1', '0.01'),
								(1, 'premiumclick', '1', '0.01'),
								(1, 'referalclick', '1', '0.0025'),
								(1, 'click', '1', '0.0050'),
								(1, 'offerads', '1000', '10.00'),
								(1, 'offerads', '5000', '50.00'),
								(1, 'referralsconvert', '1', '1.10'),
								(1, 'premiumconvert', '1', '49.99'),
								(1, 'bold', '1', '2.995'),
								(1, 'highlight', '1', '3.995'),
								(1, 'premiumad', '1', '5.995');");
                                if($query7b){
                                echo "<span>Table `yob_config` Successfully Filled.</span><br />";
                                }else{
                                echo "<p class='error'>Impossible to Fill `yob_config` Table.</p>"; }
                                $query8 = mysql_query("
								CREATE TABLE IF NOT EXISTS `yob_contact` (
								  `id` int(11) NOT NULL auto_increment,
								  `name` varchar(150) NOT NULL default '',
								  `email` varchar(150) NOT NULL default '',
								  `topic` varchar(150) NOT NULL,
								  `subject` varchar(150) NOT NULL default '',
								  `comments` varchar(200) NOT NULL default '',
								  `ip` varchar(15) NOT NULL default '',
								  KEY `id` (`id`)
								) ENGINE=MyISAM  DEFAULT CHARSET=latin1;");
                                if($query8){
                                echo "<span>Table `yob_contact` Successfully Created.</span><br />";
                                }else{
                                echo "<p class='error'>Impossible to Create `yob_contact` Table.</p>"; }
                                $query9 = mysql_query("
								CREATE TABLE IF NOT EXISTS `yob_history` (
								  `id` int(11) NOT NULL auto_increment,
								  `user` varchar(150) NOT NULL default '',
								  `date` varchar(150) NOT NULL default '',
								  `amount` varchar(150) NOT NULL default '0',
								  `method` varchar(150) NOT NULL default '',
								  `status` varchar(150) NOT NULL default '',
								  KEY `id` (`id`)
								) ENGINE=MyISAM  DEFAULT CHARSET=latin1;");
                                if($query9){
                                echo "<span>Table `yob_history` Successfully Created.</span><br />";
                                }else{
                                echo "<p class='error'>Impossible to Create `yob_history` Table.</p>"; }
                                $query10 = mysql_query("
								CREATE TABLE IF NOT EXISTS `yob_news` (
								  `id` int(11) NOT NULL auto_increment,
								  `title` varchar(50) NOT NULL default '',
								  `content` varchar(255) NOT NULL default '',
								  `date` varchar(250) NOT NULL default '',
								  PRIMARY KEY  (`id`)
								) ENGINE=MyISAM  DEFAULT CHARSET=latin1;");
                                if($query10){
                                echo "<span>Table `yob_news` Successfully Created.</span><br />";
                                }else{
                                echo "<p class='error'>Impossible to Create `yob_news` Table.</p>"; }
                                $query10b = mysql_query("
								INSERT INTO `yob_news` (`id`, `title`, `content`, `date`) VALUES
								(1, 'Grand Opening', 'Welcome to our website!!', 'July 28, 2008');");
                                if($query10b){
                                echo "<span>Table `yob_news` Successfully Filled.</span><br />";
                                }else{
                                echo "<p class='error'>Impossible to Fill `yob_news` Table.</p>"; }
                                $query11 = mysql_query("
								CREATE TABLE IF NOT EXISTS `yob_payme` (
								  `id` int(11) NOT NULL auto_increment,
								  `username` varchar(150) NOT NULL default '',
								  `pasword` varchar(150) NOT NULL default '',
								  `email` varchar(150) NOT NULL default '',
								  `pemail` varchar(150) NOT NULL default '',
								  `country` varchar(150) NOT NULL default '',
								  `date` varchar(150) NOT NULL,
								  `money` varchar(150) NOT NULL default '',
								  `ip` varchar(15) NOT NULL default '',
								  `paymentmethod` varchar(150) NOT NULL default '',
								  KEY `id` (`id`)
								) ENGINE=MyISAM  DEFAULT CHARSET=latin1;");
                                if($query11){
                                echo "<span>Table `yob_payme` Successfully Created.</span><br />";
                                }else{
                                echo "<p class='error'>Impossible to Create `yob_payme` Table.</p>"; }
                                $query12 = mysql_query("
								CREATE TABLE IF NOT EXISTS `yob_refset` (
								  `id` int(11) NOT NULL auto_increment,
								  `howmany` int(5) NOT NULL default '0',
								  `price` varchar(5) NOT NULL default '',
								  PRIMARY KEY  (`id`)
								) ENGINE=MyISAM  DEFAULT CHARSET=latin1;");
                                if($query12){
                                echo "<span>Table `yob_refset` Successfully Created.</span><br />";
                                }else{
                                echo "<p class='error'>Impossible to Create `yob_refset` Table.</p>"; }
                                $query12b = mysql_query("
								INSERT INTO `yob_refset` (`id`, `howmany`, `price`) VALUES
								(4, 50, '35'),
								(3, 20, '15'),
								(2, 15, '11'),
								(1, 8, '8');");
                                if($query12b){
                                echo "<span>Table `yob_refset` Successfully Filled.</span><br />";
                                }else{
                                echo "<p class='error'>Impossible to Fill `yob_refset` Table.</p>"; }
                                $query13 = mysql_query("
								CREATE TABLE IF NOT EXISTS `yob_site` (
								  `id` varchar(11) NOT NULL default '',
								  `sitename` varchar(30) NOT NULL default '',
								  `url` varchar(50) NOT NULL,
								  `siteap` varchar(30) NOT NULL,
								  `alertpaycode` varchar(80) NOT NULL,
								  `siteslogan` varchar(30) NOT NULL default '',
								  `forumlink` varchar(150) NOT NULL default '',
								  `enableforums` varchar(150) NOT NULL default '',
								  `enableadsense` char(3) NOT NULL default '',
								  `adtimer` varchar(3) NOT NULL,
								  KEY `id` (`id`)
								) ENGINE=MyISAM DEFAULT CHARSET=latin1;");
                                if($query13){
                                echo "<span>Table `yob_site` Successfully Created.</span><br />";
                                }else{
                                echo "<p class='error'>Impossible to Create `yob_site` Table.</p>"; }
                                $query13b = mysql_query("
								INSERT INTO `yob_site` (`id`, `sitename`, `url`, `siteap`, `alertpaycode`, `siteslogan`, `forumlink`, `enableforums`, `enableadsense`, `adtimer`) VALUES
								('1', '$sitename', '$siteurl', '$siteap', '$apcode', '$slogan', 'forum/', 'yes', 'yes', '$adtimer');");
                                if($query13b){
                                echo "<span>Table `yob_site` Successfully Filled.</span><br />";
                                }else{
                                echo "<p class='error'>Impossible to Fill `yob_site` Table.</p>"; }
                                $query14 = mysql_query("
								CREATE TABLE IF NOT EXISTS `yob_upgrades` (
								  `id` int(11) NOT NULL auto_increment,
								  `username` varchar(150) NOT NULL default '',
								  `pemail` varchar(150) NOT NULL default '',
								  `email` varchar(150) NOT NULL default '',
								  `status` varchar(150) NOT NULL default '',
								  `date` varchar(150) NOT NULL default '',
								  `end` varchar(150) NOT NULL default '',
								  `ip` varchar(15) NOT NULL default '',
								  KEY `id` (`id`)
								) ENGINE=MyISAM DEFAULT CHARSET=latin1;");
                                if($query14){
                                echo "<span>Table `yob_upgrades` Successfully Created.</span><br />";
                                }else{
                                echo "<p class='error'>Impossible to Create `yob_upgrades` Table.</p>"; }
                                $query15 = mysql_query("
								CREATE TABLE IF NOT EXISTS `yob_users` (
								  `id` int(11) NOT NULL auto_increment,
								  `firstname` varchar(150) NOT NULL default '',
								  `surname` varchar(150) NOT NULL default '',
								  `username` varchar(15) NOT NULL default '',
								  `password` varchar(100) NOT NULL default '',
								  `ip` varchar(15) NOT NULL default '',
								  `email` varchar(150) NOT NULL default '',
								  `pemail` varchar(150) NOT NULL default '',
								  `referer` varchar(15) NOT NULL default '',
								  `address1` varchar(150) NOT NULL default '',
								  `address2` varchar(150) NOT NULL default '',
								  `city` varchar(150) NOT NULL default '',
								  `state` varchar(150) NOT NULL default '',
								  `zip` varchar(150) NOT NULL default '',
								  `country` varchar(150) NOT NULL default '',
								  `paymentmethod` varchar(150) NOT NULL default '',
								  `visits` varchar(150) NOT NULL default '0',
								  `referals` varchar(150) NOT NULL default '0',
								  `referalvisits` varchar(150) NOT NULL default '0',
								  `money` varchar(150) NOT NULL default '0.00',
								  `paid` varchar(150) NOT NULL default '0.00',
								  `joindate` varchar(150) NOT NULL default '',
								  `lastlogdate` varchar(150) NOT NULL default '',
								  `lastiplog` varchar(150) NOT NULL default '',
								  `account` varchar(150) NOT NULL default 'standard',
								  `user_status` varchar(15) NOT NULL default 'user',
								  KEY `id` (`id`)
								) ENGINE=MyISAM  DEFAULT CHARSET=latin1;");
                                if($query15){
                                echo "<span>Table `yob_users` Successfully Created.</span><br />";
                                }else{
                                echo "<p class='error'>Impossible to Create `yob_users` Table.</p>"; }
                                $query15b = mysql_query("
								INSERT INTO `yob_users` (`id`, `firstname`, `surname`, `username`, `password`, `ip`, `email`, `pemail`, `referer`, `address1`, `address2`, `city`, `state`, `zip`, `country`, `paymentmethod`, `visits`, `referals`, `referalvisits`, `money`, `paid`, `joindate`, `lastlogdate`, `lastiplog`, `account`, `user_status`) VALUES
								(1, 'YourOwnBux', 'Designs', '$admin', '$password', '127.0.0.1', 'email@domain.com', 'pemail@domain.com', '', '8C Three Rivers Court', 'Rickmansworth', 'Hertfordshire', 'Hertfordshire', 'WD3 1FX', 'United Kingdom', 'Alertpay', '0', '0', '0', '0', '0.00', 'January 1, 2008', 'July 10, 2008 - 2:05 am', '127.0.0.1', 'premium', 'admin');");
                                if($query15b){
                                echo "<span>Table `yob_users` Successfully Filled.</span><br />";
                                }else{
                                echo "<p class='error'>Impossible to Fill `yob_users` Table.</p>"; }
                                $query16 = mysql_query("
								CREATE TABLE IF NOT EXISTS `yob_usersonline` (
								  `visitor` varchar(15) NOT NULL default '',
								  `lastvisit` int(14) NOT NULL default '0'
								) ENGINE=MyISAM DEFAULT CHARSET=latin1;");
                                if($query16){
                                echo "<span>Table `yob_usersonline` Successfully Created.</span><br />";
                                }else{
                                echo "<p class='error'>Impossible to Create `yob_usersonline` Table.</p>"; }
                                $query16b = mysql_query("
								INSERT INTO `yob_usersonline` (`visitor`, `lastvisit`) VALUES
								('127.0.0.1', 1215667351);");
                                if($query16b){
                                echo "<span>Table `yob_usersonline` Successfully Filled.</span><br />";
                                }else{
                                echo "<p class='error'>Impossible to Fill `yob_usersonline` Table.</p>"; }
                                $query17 = mysql_query("
								CREATE TABLE IF NOT EXISTS `yob_recoverpass` (
								  `id` int(11) NOT NULL auto_increment,
								  `hash` varchar(150) NOT NULL,
								  `email` varchar(150) NOT NULL,
								  PRIMARY KEY  (`id`)
								) ENGINE=MyISAM  DEFAULT CHARSET=latin1;");
                                if($query17){
                                echo "<span>Table `yob_recoverpass` Successfully Created.</span><br />";
                                }else{
                                echo "<p class='error'>Impossible to Create `yob_recoverpass` Table.</p>"; }
                                echo "<br /><br /><div align='center'><h3><font color='green'>THE SCRIPT INSTALLATION IS COMPLETE.</font>&nbsp;&nbsp;<font color='red'>DELETE NOW THE install DIRECTORY</font></h3></div><br /><p>Please login as:<br />Username: <strong>".$admin."</strong><br />Password: <strong>".$pass."</strong>, <br />And go to the site adminisitration <strong>(".$siteurl."admin/index.php)</strong>, to complete the site configuration. <br />(Remember to login before going to the Site Administration)</p><br />"; }else{ ?>
			  <form action="install2.php" method="post" class="f-wrap-1">
			  <fieldset>
			  <h3>Please fill all the fields</h3>
			  <p><strong>This action will create an Administrator Username and Password.</strong><br />If you have any problem, delete the complete database and start the installation again.</p>

				<label><b>Username:</b>
				<input id="admin" name="admin" type="text" class="f-name" autocomplete="off" tabindex="1" />&nbsp;&nbsp;Admin Username<br />
				</label>
				<label><b>Password:</b>
				<input id="password" name="password" type="password" class="f-name" autocomplete="off" tabindex="2" />&nbsp;&nbsp;Admin Password<br />
				</label>
				<label><b>Site Name:</b>
				<input id="sitename" name="sitename" type="text" class="f-name" autocomplete="off" tabindex="3" />&nbsp;&nbsp;Site Name<br />
				</label>
				<label><b>Site Slogan:</b>
				<input id="slogan" name="slogan" type="text" class="f-name" autocomplete="off" tabindex="4" />&nbsp;&nbsp;Site Slogan. Ex: "Earn Money in Seconds" (without quotes)<br />
				</label>
				<label><b>Site URL:</b>
				<input id="siteurl" name="siteurl" type="text" class="f-name" autocomplete="off" tabindex="5" />&nbsp;&nbsp;Site URL. Ex: "http://www.google.com/" (without quotes)<br />
				</label>
				<label><b>Site Alertpay:</b>
				<input id="siteap" name="siteap" type="text" class="f-name" autocomplete="off" tabindex="6" />&nbsp;&nbsp;Site Alertpay Email<br />
				</label>
				<label><b>Alertpay Code:</b>
				<input id="apcode" name="apcode" type="text" class="f-name" autocomplete="off" tabindex="7" />&nbsp;&nbsp;Alertpay IPN Ecnrypted Code<br />
				</label>
				<label><b>Ads Timer:</b>
				<input id="adtimer" name="adtimer" type="text" class="f-name" autocomplete="off" tabindex="8" />&nbsp;&nbsp;Ads Timer in Seconds. Ex: "30" (without quotes)<br />
				</label>
				<div class="f-submit-wrap">
				<input type="submit" value="Install Now!" class="f-submit" tabindex="9" /><br />
				</div>
				</fieldset>
				</form>
<?php
} ?>
			<div id="footer">
				<!--<p><script type="text/javascript">
				google_ad_client = "pub-123456789";  // place your own google ad client id here
				/* 728x90, creado 4/07/08 */
				google_ad_slot = "0065018768";
				google_ad_width = 728;
				google_ad_height = 90;
				//
				</script>
				<script type="text/javascript"
				src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
				</script></p>-->
			</div>
		</div>			
		<div id="poweredby">
			Copyright &copy; 2008. All Rights Reserved.
		</div></div>
</div>
</body>
</html>