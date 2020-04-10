<?php	session_start();
if(isset($_COOKIE["usNick"]) && isset($_COOKIE["usPass"])){ ?>
	<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=myaccount.php">
<?php 
	exit();
}

$display_error = "";
$username = "";

if ($_POST['username']) {
	$username = $_POST['username'];
	if( strtolower($_POST['code'])!= strtolower($_SESSION['texto'])){ 
		$display_error = "* Security Code Error"; // error language
		include ('error.php');
		exit();
	}else{
		include('includes/config.inc.php');
		$username=uc($_POST['username']);
		$pass=uc($_POST['password']);
		$password = sha1($pass);

		if ($password==NULL) {
			$display_error = "* All fields are required"; // error language
			include ('error.php');
			exit();
		}else{
			$myDb->connect();
				$query = mysql_query("SELECT username,password FROM yob_users WHERE username = '$username'") or die(mysql_error());
				$data = mysql_fetch_array($query);
			$myDb->close();
			if($data['password'] != $password) {
				$display_error = "* Please, Check your username/password."; // error language
				include ('error.php');
				exit();
			}else{
				$myDb->connect();
					$query = mysql_query("SELECT username,password FROM yob_users WHERE username = '$username'") or die(mysql_error());
					$row = mysql_fetch_array($query);
				$myDb->close();
				$nicke=$row['username'];
				$passe=$row['password'];
				setcookie("usNick",$nicke,time()+7776000);
				setcookie("usPass",$passe,time()+7776000);
				$lastlogdate = date("F j, Y - g:i a");
				$lastip = getRealIP();
				$myDb->connect();
					$querybt = "UPDATE yob_users SET lastlogdate='$lastlogdate', lastiplog='$lastip' WHERE username='$nicke'";
					mysql_query($querybt) or die(mysql_error());
				$myDb->close();	?> 
				<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=myaccount.php">
<?
			}
		}
	}
}else{ 
	include ('header.php'); 
?>
		<div id="content">
			<p class="error"><?php echo $display_error;?></p>
		  
		  <form action="login.php" method="post" class="f-wrap-1">
		  <div class="req"><a href="signup.php">Not Registered?</a><br /><a href="recoverpass.php">Forgot your Password?</a></div>
		  <fieldset>

		  <h3>Member Login</h3>

			<label for="firstname"><b>Username:</b>
			<input id="username" name="username" type="text" class="f-name" autocomplete="off" tabindex="1" /><br />
			</label>
			<label for="password"><b>Password:</b>
			<input id="password" name="password" type="password" class="f-name" autocomplete="off" tabindex="2" /><br />
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
include ('footer.php'); 
}
?>