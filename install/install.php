<?php
if ($_POST['database']){
    $host = $_POST['hostname'];
    $database = $_POST['database'];
    $user = $_POST['username'];
    $password = $_POST['password'];
    $archivo = '../includes/database/database.inc.php';
    $fp = fopen($archivo, "w");
    $string = '<?php
                class Db {
                function connect() {
                $host =		"'.$host.'";
                $user =		"'.$user.'";
                $passwd =	"'.$password.'";
                $db =		"'.$database.'";
                mysql_connect($host,$user,$passwd) or die("Sorry, can\'t connect to MySQL server, please again later...");
                @mysql_select_db("$db");
                    }
                function close() {
                mysql_close();
                    }
                };
               ?>';
    $write = fputs($fp, $string);
    fclose($fp);
    header("Location: install2.php");
    }
?>
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
			  <form action="install.php" method="post" class="f-wrap-1">
			  <fieldset>
			  <h3>Please fill all the fields</h3>
			  <p><strong>This action will Create a Database Conection File.</strong><br />The folder /includes/database/ must be writable(chmod 777).</p>

				<label><b>Hostname:</b>
				<input id="hostname" name="hostname" type="text" class="f-name" autocomplete="off" tabindex="1" />&nbsp;&nbsp;Database Hostname (Usually localhost)<br />
				</label>
				<label><b>Database:</b>
				<input id="database" name="database" type="text" class="f-name" autocomplete="off" tabindex="2" />&nbsp;&nbsp;Database Name<br />
				</label>
				<label><b>Username:</b>
				<input id="username" name="username" type="text" class="f-name" autocomplete="off" tabindex="3" />&nbsp;&nbsp;Database Username<br />
				</label>
				<label><b>Password:</b>
				<input id="password" name="password" type="password" class="f-name" autocomplete="off" tabindex="4" />&nbsp;&nbsp;Database Password<br />
				</label>
				<div class="f-submit-wrap">
				<input type="submit" value="Create Db!" class="f-submit" tabindex="5" /><br />
				</div>
				</fieldset>
				</form>
			<div id="footer">
				<!--<p><script type="text/javascript">
				google_ad_client = "pub-6017498622900540";
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