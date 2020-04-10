<?php include_once('header.php');
if(isset($_COOKIE["usNick"]) && isset($_COOKIE["usPass"])){ 
		$user = $_COOKIE["usNick"];
		$myDb->connect();
			$sql = "SELECT * FROM yob_users WHERE username='$user'";
			$result = mysql_query($sql);        
			$row = mysql_fetch_array($result);
		$myDb->close();
		$laip = getRealIP();
?>
		<div id="content">
<h2>Purchase Un - referred Members</h2>
<p>Why not let us do the referring for you? We know how difficult and time consuming referring others can be, especially when you simply don't have the time. In fact, we've already got newly registered members who joined without a referrer who we can automatically place beneath you and let you reap the rewards!
</p>
<p>You can purchase un-referred <?php echo SITENAME; ?> members for low prices. And this prices are extremely low to pay when you sit back and imagine your profits.
</p>

<p class="error">Important: <?php echo SITENAME; ?> has a zero tolerance policy for chargeback's. Any dispute/charge back attempts will immediately result in suspension of the <?php echo SITENAME; ?> member account/privileges.</p>

<form action="payment.php" method="post" class="f-wrap-1">
<fieldset>
<h3>Referral Purchase</h3>
<label><b>Customer:</b>
<?= $row["username"] ?><input type="hidden" value="<?= $row["username"] ?>" name="customer"><br />
</label>
<label><b>Payment email:</b>
<?= $row["pemail"] ?></b><input type="hidden" value="<?= $row["pemail"] ?>" name="pemail"><br />
</label>
<label><b>Purchase:</b>
<select name="refset" class="f-name">
<?
$myDb->connect();
	$tablaa = mysql_query("SELECT * FROM yob_refset ORDER BY id ASC");
$myDb->close();
while ($registroa = mysql_fetch_array($tablaa)) {
	mysql_close($con);
	echo " <option value=\"".$registroa["howmany"] ."\">". $registroa["howmany"] ." Referrals  - $". $registroa["price"] ."</option>";
}

?>
</select><br />
</label>

<input type="hidden" name="status" value="referrals" />
<input type="hidden" name="purchaseip" value="<?= $laip;?>" />
<input type="hidden" name="purchaseitemname" value="Referrals Package" />


<div class="f-submit-wrap">
<input type="image" name="submit" src="images/paymentbutton.gif" border="0" alt="" /><br />
</div>
</fieldset>
</form>


<?php include ('footer.php'); ?>
<?
}else{
	$display_error = "* You must login to access this page."; // error language
	include ('error.php');
	exit();	
}?>
