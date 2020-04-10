<?php session_start();
include('header.php');
if(isset($_COOKIE["usNick"]) && isset($_COOKIE["usPass"])){ ?>
		<div id="content">
		<h2>My Account - Withdaw / Convert Your Earnings</h2>
<div align="center">
<!-- ADS -->
<div class="featurebox">
		<h3><a href="convert.php?convert=ads">Convert to Ads</a></h3>
			Advertise on <?php echo SITENAME; ?>
<?php
		if ($_GET["convert"]=="ads"){
			$user=uc($_COOKIE["usNick"]);
			$myDb->connect();
				$sql = "SELECT * FROM yob_users WHERE username='$user'";
				$result = mysql_query($sql);        
				$row = mysql_fetch_array($result);
			$myDb->close();
			$root=$row["money"];
			$myDb->connect();
				$sqle = "SELECT * FROM yob_config WHERE item='hits' and howmany='1000'";
				$resulte = mysql_query($sqle);        
				$rowe = mysql_fetch_array($resulte);
			$myDb->close();
			$pricee=$rowe["price"]; 
			if ($root<$pricee){
				echo "<br /><span class='error'><b>Whoops, you only have $".$row["money"]." You must earn at least $".$pricee." to convert to ads.</b></span>";
			}else{
				echo "<br /><span class='success'><b>After you request for Convert to Ads your account will be audited to make sure you aren't violating the TOS.</b></span>";
				$email=$row["email"];
				$myDb->connect(); 
					$checkuser = mysql_query("SELECT pemail FROM yob_advertisers WHERE pemail='$email'");
					$username_exist = mysql_num_rows($checkuser);
				$myDb->close();
				if ($username_exist>0){
					echo "<br /><span class='success'><b>Your advertisers is being proccesed. Processing time: 2-5 working days.</b></span>";
				}else{
					if (isset($_POST["url"])){
						if( strtolower($_POST['code'])!= strtolower($_SESSION['texto'])){
							$display_error = "* Security Code Error"; // error language
							include ('error2.php');
							exit();
						}
						$url=limpiar($_POST["url"]);
						$description=limpiar($_POST["description"]);
						if ($url==""){
							$display_error = "* Link Url Can't Be Empty"; // error language
							include ('error2.php');
							exit();
						}
						if ($description==""){
							$display_error = "* Link Description Can't Be Empty"; // error language
							include ('error2.php');
							exit();
						}
						$laip = getRealIP();
						$user=$_COOKIE["usNick"];
						$myDb->connect();
							$sqlu = "SELECT * FROM yob_users WHERE username='$user'";
							$resultu = mysql_query($sqlu);        
							$rowu = mysql_fetch_array($resultu);
						$myDb->close(); 
						$money=$rowu["money"];
						$myDb->connect();
							$sqle = "SELECT * FROM yob_config WHERE item='hits' and howmany='1000'";
							$resulte = mysql_query($sqle);        
							$rowe = mysql_fetch_array($resulte);
						$myDb->close();
						$pricee=$rowe["price"]; 
						$moneynow = $money - $pricee;
						$myDb->connect(); 
							$query = "INSERT INTO yob_advertisers (pemail, plan, url, description, ip, tipo, money) VALUES('$user','1000','$url','$description','$laip','convert','$money')";
							mysql_query($query) or die(mysql_error());

							$queryb = "UPDATE yob_users SET money = '$moneynow' WHERE username='$user'";
							mysql_query($queryb) or die(mysql_error());
						$myDb->close();

						echo "<br /><span class='success'><b>Your advertisers is being proccesed. Processing time: 2-5 working days.</b></span>";
					}else{ ?>
						<br /><br />
						<form method="post" action="convert.php?convert=ads" class="f-wrap-1">
						<div align="left"><h3>Complete the Next Form</h3></div>
						<label for="linkstext"><b>Link's Text</b>
							<input type="text" name="description" maxlength="100" autocomplete="off" class="f-name" value="" tabindex="1" /><br />
						</label>
						<label for="linksurl"><b>Link's URL</b>
							<input type="text" name="url" maxlength="150" autocomplete="off" class="f-name" value="http://" tabindex="2" /><br />
						</label>
						<label for="plan"><b>Plan</b>
							<?
								$myDb->connect(); 
									$sql = "SELECT * FROM yob_config WHERE item='hits' and howmany='1000'";
									$result = mysql_query($sql);        
									$row = mysql_fetch_array($result);
								$myDb->close(); ?><input type="text" name="url" maxlength="150" autocomplete="off" class="f-name" value="1000 Members Visits $<?= $row["price"] ?>" tabindex="3" disabled/><br />
						</label>
						<label for="code"><b>Security Code:</b>
						<input id="code" name="code" type="text" class="f-name" tabindex="3" /><br />
						</label>
						<label for="code2"><b>&nbsp;</b><div align="left">
						<img src="image.php?<?php echo $res; ?>" /></div><br />
						</label>
						<div class="f-submit-wrap" align="left">
						<input type="submit" value="Submit" class="f-submit" tabindex="4" /><br />
						</div>
						</form><?
					}
				}
			}
		}?></div>
<!-- ADS -->

<!-- CASH -->
<div class="featurebox">
		<h3><a href="convert.php?convert=cash">Convert to Cash via AlertPay</a></h3>
			Get CASH via AlertPay. You must earn at least $<?php
		$myDb->connect();
			$sql = "SELECT price FROM yob_config WHERE item='payment' and howmany='1'";
			$result = mysql_query($sql);        
			$row = mysql_fetch_array($result);
		$myDb->close();	echo $row["price"]; ?>.

	<?php if ($_GET["convert"]=="cash"){
			$user=uc($_COOKIE["usNick"]);
			$myDb->connect();
				$sql = "SELECT * FROM yob_users WHERE username='$user'";
				$result = mysql_query($sql);        
				$row = mysql_fetch_array($result);
			$myDb->close();
			$root=$row["money"];
				$myDb->connect();
					$sqle = "SELECT * FROM yob_config WHERE item='payment' and howmany='1'";
					$resulte = mysql_query($sqle);        
					$rowe = mysql_fetch_array($resulte);
				$myDb->close();
			$price=$rowe["price"]; 
			if ($root<$price){
				echo "<br /><span class='error'><strong>Sorry, you only have $".$row["money"]." You must earn at least $".$price." to request payment.</strong></span>";
			}else{
				echo "<br /><br /><span class='success'><b>After you request for payment your account will be audited to make sure you aren't violating the TOS.</b></span>";
				$username=$row["username"];
				$myDb->connect();
					$checkuser = mysql_query("SELECT username FROM yob_payme WHERE username='$username'");
					$username_exist = mysql_num_rows($checkuser);
				$myDb->close();
				if ($username_exist>0){
					echo "<br /><br /><span class='error'><b>Your payment is being proccesed. Processing time: 2-15 working days.</b></span>";
				}else{
					$password=$row["password"];
					$email=$row["email"];
					$pemail=$row["pemail"];
					$country=$row["country"];
					$money=$row["money"];
					$paymentmethod=$row["paymentmethod"];
					$laip=getRealIP();
					$eltiempo=time();
					$lafecha=date("d M Y H:i",$eltiempo);
					$myDb->connect();
						$query = "INSERT INTO yob_payme (username, pasword, email, pemail, country, money, paymentmethod, ip, date) VALUES('$username','$password','$email','$pemail','$country','$money','$paymentmethod','$laip', '$lafecha')";
						mysql_query($query) or die(mysql_error());

						$queryb = "UPDATE yob_users SET money = '0' WHERE username='$username'";
						mysql_query($queryb) or die(mysql_error());
					$myDb->close();
				}
			}
		}
?></div>
<!-- CASH -->

<div class="featurebox">
<!-- PREMIUM -->
		<h3><a href="convert.php?convert=premium">Convert to Premium Membership</a></h3>
			<span class="error">This action its automatic and can't be undone</span>.<br />You must earn at least $<?
			$myDb->connect();
				$sql = "SELECT * FROM yob_config WHERE item='premiumconvert' and howmany='1'";
				$result = mysql_query($sql);        
				$row = mysql_fetch_array($result);
			$myDb->close();
			echo $row["price"]; ?><br><br>

	<?php if ($_GET["convert"]=="premium"){
			$user=uc($_COOKIE["usNick"]);
			$myDb->connect();
				$sql = "SELECT * FROM yob_users WHERE username='$user'";
				$result = mysql_query($sql);        
				$row = mysql_fetch_array($result);
			$myDb->close();
			$root=$row["money"];
			$myDb->connect();
				$sqle = "SELECT * FROM yob_config WHERE item='premiumconvert' and howmany='1'";
				$resulte = mysql_query($sqle);        
				$rowe = mysql_fetch_array($resulte);
			$myDb->close();
			$price=$rowe["price"]; 

			if ($root<$price){
				echo "<span class='error'><b>Sorry, you only have $".$row["money"]." You must earn at least $".$price." to upgrade to premium membership.</b></span>";
			}else{
				$myDb->connect(); 
					$checkuser = mysql_query("SELECT account FROM yob_users WHERE username='$user'");
					$checkpremium = mysql_fetch_array($checkuser);
					$premium = $checkpremium['account'];
				$myDb->close();
				if ($premium=="premium"){
					echo "<span class='error'><b>You are already a premium member, you do not need to upgrade twice.</b></span>";
				}else{
					$myDb->connect();  
						$sqlue = "SELECT * FROM yob_users WHERE username='$user'";
						$resultue = mysql_query($sqlue);        
						$rowue = mysql_fetch_array($resultue);
						$sqlz = "SELECT * FROM yob_config WHERE item='premiumconvert' and howmany='1'";
						$resultz = mysql_query($sqlz);        
						$rowz = mysql_fetch_array($resultz);
						$eltiempo=time();
						$lafecha=date("d M Y H:i",$eltiempo);
						$query = "INSERT INTO yob_upgrades (username, email, pemail, status, date) VALUES('$username','$email','$pemail','active','$lafecha')";
						mysql_query($query) or die(mysql_error());

					$myDb->close();
					$wootz=$rowue["money"] - $rowz["price"];
					$myDb->connect(); 
						$query = "UPDATE yob_users SET account='premium' where username='$user'";
						mysql_query($query) or die(mysql_error());
						$query = "UPDATE yob_users SET money='$wootz' where username='$user'";
						mysql_query($query) or die(mysql_error());
					$myDb->close();
					echo "<span class='success'><b>After you request an upgrade, your account will be updated immediately.</b><br /> You're now a Premium Member</span>";
				}
			}
		}
?>
<!-- PREMIUM --></div>
</div>&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />
<?php include ('footer.php'); ?>
<?
}else{
	$display_error = "* You must login to access this page."; // error language
	include ('error.php');
	exit();	
}?>