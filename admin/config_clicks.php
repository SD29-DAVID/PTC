<?php  include('header.php'); if (isset($_POST["click"])) { $click=$_POST["click"]; $referalclick=$_POST["referalclick"]; $payment=$_POST["payment"]; $premiumclick=$_POST["premiumclick"]; $premiumreferalc=$_POST["premiumreferalc"]; $upgrade=$_POST["upgrade"]; $upgradec=$_POST["upgradec"]; $myDb->connect(); $query = "UPDATE yob_config SET price='$click' where item='click' and howmany='1'"; mysql_query($query) or die(mysql_error()); $query = "UPDATE yob_config SET price='$referalclick' where item='referalclick' and howmany='1'"; mysql_query($query) or die(mysql_error()); $query = "UPDATE yob_config SET price='$premiumclick' where item='premiumclick' and howmany='1'"; mysql_query($query) or die(mysql_error()); $query = "UPDATE yob_config SET price='$premiumreferalc' where item='premiumreferalc' and howmany='1'"; mysql_query($query) or die(mysql_error()); $query = "UPDATE yob_config SET price='$payment' where item='payment' and howmany='1'"; mysql_query($query) or die(mysql_error()); $query = "UPDATE yob_config SET price='$upgrade' where item='upgrade' and howmany='1'"; mysql_query($query) or die(mysql_error()); $query = "UPDATE yob_config SET price='$upgradec' where item='premiumconvert' and howmany='1'"; mysql_query($query) or die(mysql_error()); $myDb->close(); echo "<p class='success'>Config Updated.</p>"; } ?>

<? $myDb->connect(); $sql = "SELECT * FROM yob_config WHERE item='click' and howmany='1'"; $result = mysql_query($sql); $row = mysql_fetch_array($result); $myDb->close(); ?>
<form method="post" action="config_clicks.php" class="f-wrap-1">
		  <fieldset>
		  <h3>Clicks Configuration</h3>

<label><b>Member click:</b>
<input type="text" name="click" value="<? echo $row["price"]; ?>">&nbsp;&nbsp;Each Member Click<br />
</label>

<label><b>Referral click:</b>
<input type="text" name="referalclick" value="<? $myDb->connect(); $sql = "SELECT * FROM yob_config WHERE item='referalclick' and howmany='1'"; $result = mysql_query($sql); $row = mysql_fetch_array($result); $myDb->close(); echo $row["price"]; ?>">&nbsp;&nbsp;Each Referral Click<br />
</label>

<label><b>Payout:</b>
<input type="text" name="payment" value="<? $myDb->connect(); $sql = "SELECT * FROM yob_config WHERE item='payment' and howmany='1'"; $result = mysql_query($sql); $row = mysql_fetch_array($result); $myDb->close(); echo $row["price"]; ?>">&nbsp;&nbsp;Minimun Payout<br />
</label>

<label><b>Upgrade Price:</b> 
<input type="text" name="upgrade" value="<? $myDb->connect(); $sql = "SELECT * FROM yob_config WHERE item='upgrade' and howmany='1'"; $result = mysql_query($sql); $row = mysql_fetch_array($result); $myDb->close(); echo $row["price"]; ?>">&nbsp;&nbsp;Upgrade Price<br />
</label>

<label><b>Upgrade Price:</b>
<input type="text" name="upgradec" value="<? $myDb->connect(); $sql = "SELECT * FROM yob_config WHERE item='premiumconvert' and howmany='1'"; $result = mysql_query($sql); $row = mysql_fetch_array($result); $myDb->close(); echo $row["price"]; ?>">&nbsp;&nbsp;Upgrade Price Using Account Balance<br />
</label>
<label><b>&nbsp;</b><br /></label>
<h3>Premium Click Configuration</h3>
<? $myDb->connect(); $sql = "SELECT * FROM yob_config WHERE item='premiumclick' and howmany='1'"; $result = mysql_query($sql); $row = mysql_fetch_array($result); $myDb->close(); ?>
<label><b>Member click:</b>
<input type="text" name="premiumclick" value="<? echo $row["price"]; ?>">&nbsp;&nbsp;Each Premium Member Click<br />
</label>

<label><b>Referral click:</b>
<input type="text" name="premiumreferalc" value="<? $myDb->connect(); $sql = "SELECT * FROM yob_config WHERE item='premiumreferalc' and howmany='1'"; $result = mysql_query($sql); $row = mysql_fetch_array($result); $myDb->close(); echo $row["price"]; ?>">&nbsp;&nbsp;Each Premium Referral Click<br />
</label>

<div class="f-submit-wrap">
<input type="submit" value="Submit" class="f-submit" tabindex="4" /><br />
</div>
</fieldset>
</form>












&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />
<?php include('footer.php'); ?>