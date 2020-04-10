<?php
session_start(); if(isset($_COOKIE["usNick"]) && isset($_COOKIE["usPass"])){ ?>
	<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=myaccount.php">
<?php  exit(); } $geth = $_GET['h']; if($geth){ include('includes/config.inc.php'); require('includes/passgenerator.inc.php'); $string = rand_string(); $mystring = sha1($string); $myDb->connect(); $checkhash = mysql_query("SELECT hash FROM yob_recoverpass WHERE hash='$geth'"); $hash_exist = mysql_num_rows($checkhash); $myDb->close(); if ($hash_exist>0) { $myDb->connect(); $query = mysql_query("SELECT email FROM yob_recoverpass WHERE hash = '$geth'") or die(mysql_error()); $row = mysql_fetch_array($query); $myDb->close(); $email=$row['email']; $myDb->connect(); $querybt = "UPDATE yob_users SET password='$mystring' WHERE email='$email'"; mysql_query($querybt) or die(mysql_error()); $queryz = "DELETE FROM yob_recoverpass WHERE hash='$geth'"; mysql_query($queryz) or die(mysql_error()); $myDb->close(); $to = $email; $subject = SITENAME." Password Recovery"; $message = "Your New Password is: ".$string.""; $from = SITENAME."@no-reply.com"; $headers = "From: $from"; mail($to,$subject,$message,$headers); $display_error = "* Email Sent to ".$email."";  include ('error.php'); exit(); } } $display_error = ""; $username = ""; if ($_POST['email']) { $email = $_POST['email']; if( strtolower($_POST['code'])!= strtolower($_SESSION['texto'])){ $display_error = "* Security Code Error";  include ('error.php'); exit(); }else{ include('includes/config.inc.php'); $myDb->connect(); $checkemail = mysql_query("SELECT email FROM yob_users WHERE email='$email'"); $email_exist = mysql_num_rows($checkemail); $myDb->close(); if ($email_exist>0) { require('includes/passgenerator.inc.php'); $string = rand_string(); $mystring = sha1($string); $myDb->connect(); $query = "INSERT INTO yob_recoverpass (hash, email) VALUES('$mystring','$email')"; mysql_query($query) or die(mysql_error()); $myDb->close(); $to = $email; $subject = SITENAME." Password Recovery"; $message = "Please copy and paste the next URL: ".SITE_URL."recoverpass.php?h=".$mystring.""; $from = SITENAME."@no-reply.com"; $headers = "From: $from"; mail($to,$subject,$message,$headers); $display_error = "* Email Sent to ".$email."";  include ('error.php'); exit(); }else{ $display_error = "* The Email doesn't exist";  include ('error.php'); exit(); } } }else{ include ('header.php'); ?>
		<div id="content">
			<p class="error"><?php echo $display_error;?></p>
		  
		  <form action="recoverpass.php" method="post" class="f-wrap-1">
		  <div class="req"><a href="signup.php">Not Registered?</a><br /><a href="recoverpass.php">Forgot your Password?</a></div>
		  <fieldset>

		  <h3>Recover your Password</h3>

			<label for="email"><b>Email:</b>
			<input id="email" name="email" type="text" class="f-name" autocomplete="off" tabindex="1" /><br />
			</label>
			<label for="code"><b>Security Code:</b>
			<input id="code" name="code" type="text" class="f-name" autocomplete="off" tabindex="3" /><br />
			</label>
			<label for="code2"><b>&nbsp;</b>
			<img src="image.php?<?php echo $res; ?>" /><br />
			</label>
			<div class="f-submit-wrap">
			<input type="submit" value="Submit" class="f-submit" tabindex="4" /><br />
			</div>
			</fieldset>
			</form>

<?php
include ('footer.php'); } ?>