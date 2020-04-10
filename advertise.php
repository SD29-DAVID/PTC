<?php 
include ('header.php');
include ('includes/index.inc.php');
if(isset($_COOKIE["usNick"])){
	$user = uc($_COOKIE["usNick"]);
	$myDb->connect();
		$sqle = "SELECT * FROM yob_users WHERE username='$user'";
		$resulte = mysql_query($sqle);        
		$rowe = mysql_fetch_array($resulte);
	$myDb->close();
	$pemail= $rowe['pemail'];
}
$laip = getRealIP();
?>



<div id="content">
<h2>Advertise on <?php echo SITENAME; ?></h2>
<p>
- Setting up and displaying your link for <?php echo SITENAME; ?> members to visit is fast and simple.<br />
- We charge $<?php echo HITS_1000; ?> per 1000 member visits and each visit will last at least <?php echo AD_TIMER; ?> seconds.<br />
- Outside visits are unlimited and included within the price.<br />
- We will review your website and will have it active within 24 hours.<br />
- Your hits will be unique. We will only count the first visit from each person that visits your link each day.
</p>
<hr />
<p>
<b>PLEASE</b> make sure that your server can support the amount of requests that your site will get. You will have no way of pausing or canceling your ad once it becomes active.<br /></p>
<hr />

<p class="error">If you are currently a registered User, please provide your registered payment e-mail address so we can do a cross-reference.
</p>
<hr />

		  <form action="payment.php" method="post" class="f-wrap-1">
		  <div class="req">All Fields Required</div>
		  <fieldset>

		  <h3>Advertise on <?php echo SITENAME; ?></h3>

<label><b>Payment E-mail:</b>
<input type="text" name="pemail" class="f-name" autocomplete="off" value="<?php echo $pemail;?>" tabindex="1" /><br />
</label>

<label><b>Link's Text:</b>
<input type="text" name="description" class="f-name" autocomplete="off" value="" tabindex="2" /><br />
</label>
<label><b>Link's URL:</b>
<input type="text" name="url" class="f-name" autocomplete="off" value="http://" tabindex="3" /><br />
</label>
<label><b>Choose plan:</b>
<select name="plan" class="f-name" autocomplete="off" tabindex="4" />
<?php
			$myDb->connect();
				$tabla = mysql_query("SELECT * FROM yob_config WHERE item='hits' ORDER BY price +0 ASC");
			$myDb->close();
			while ($row = mysql_fetch_array($tabla)){
?>
<option value="<?php echo $row["howmany"];?>"><?= $row["howmany"] ?> Member visits $<?= $row["price"] ?></option>
<?php }?>
</select><br />
</label>

<label><b>Show Advert To:</b>
<select name="viewable" class="f-name" autocomplete="off" >
<option value="ads">All Members</option>
<option value="premiumads">Premium Only + $
<?php 
$myDb->connect();
	$sql = "SELECT price FROM yob_config WHERE item='premiumad' and howmany='1'";
	$result = mysql_query($sql);        
	$row = mysql_fetch_array($result);
$myDb->close();
echo $row['price'];
?>
</option>
</select><br />
</label>

<label><b>Bold:</b>
<select name="bold" class="f-name" autocomplete="off" >
<option value="0">No</option>
<option value="1">Yes + $
<?php 
$myDb->connect();
	$sql = "SELECT price FROM yob_config WHERE item='bold' and howmany='1'";
	$result = mysql_query($sql);        
	$row = mysql_fetch_array($result);
$myDb->close();
echo $row['price'];
?>
</option>
</select><br />
</label>

<label><b>Highlight:</b> 
<select name="highlight" class="f-name" autocomplete="off" >
<option value="0">No</option>
<option value="1">Yes + $
<?php 
$myDb->connect();
	$sql = "SELECT price FROM yob_config WHERE item='highlight' and howmany='1'";
	$result = mysql_query($sql);        
	$row = mysql_fetch_array($result);
$myDb->close();
echo $row['price'];
?>
</option>
</select><br />
</label>

<input type="hidden" name="status" value="advertise" />
<input type="hidden" name="purchaseip" value="<?= $laip;?>" />
<input type="hidden" name="purchaseitemname" value="Advertisement Package" />


<div class="f-submit-wrap">
<input type="image" name="submit" src="images/paymentbutton.gif" border="0" alt="" /><br />
</div>
</fieldset>



			</form>



<?php include ('footer.php'); ?>