<?php include('header.php'); $id=$_POST["id"]; $paypalname = $_POST["paypalname"]; $paypalemail = $_POST["paypalemail"]; $tipo = $_POST["tipo"]; $plan = $_POST["plan"]; $url = $_POST["url"]; $description = $_POST["description"]; $bold = $_POST["bold"]; $highlight = $_POST["highlight"]; if($url==NULL){ }else{ $myDb->connect(); $query = "INSERT INTO yob_ads (user, tipo, paypalname, paypalemail, plan, url, description, bold, highlight) VALUES( 'admin', '$tipo', '$paypalname', '$paypalemail', '$plan', '$url', '$description', '$bold', '$highlight')"; mysql_query($query) or die(mysql_error()); $myDb->close(); echo "<p class='success'>Advert has been added..</p>"; } ?>
<form method="post" action="ads_add.php" class="f-wrap-1">
		  <fieldset>
		  <h3>Add New Ads</h3>

<label><b>AlertPay Name:</b>
<input type="text" class="f-name" name="paypalname" autocomplete="off" value="Sponsored Advert" tabindex="1" /><br />
</label>

<label><b>AlertPay Email:</b>
<input type="text" class="f-name" name="paypalemail" autocomplete="off" value="Sponsored Advert" tabindex="2" /><br />
</label>

<label><b>URL:</b>
<input type="text" class="f-name" name="url" autocomplete="off" value="http://www." tabindex="3" />&nbsp;&nbsp;(include http://)<br />
</label>

<label><b>Description:</b>
<input type="text" class="f-name" name="description" autocomplete="off" value="Enter Description Here" tabindex="4" /><br />
</label>

<label><b>Plan:</b>
<select name="plan" tabindex="5">
<? $myDb->connect(); $tablaa = mysql_query("SELECT * FROM yob_config WHERE item='hits' ORDER BY price+0 ASC"); $myDb->close(); while ($registroa = mysql_fetch_array($tablaa)){ echo "<option value=\"".$registroa["howmany"] ."\">". $registroa["howmany"] ." Member Visits - $". $registroa["price"] ."</option>"; } ?>
</select>
<br />
</label>

<label><b>Bold:</b>
<select name="bold" class="f-name" tabindex="6" /><option value="1">Yes</option><option value="0">No</option></select><br />
</label>

<label><b>Highlight:</b>
<select name="highlight" class="f-name" tabindex="7" /><option value="1">Yes</option><option value="0">No</option></select><br /></label>

<label><b>Show Advert To:</b>
<select name="tipo" class="f-name" tabindex="8" /><option value="ads">All Users</option><option value="premiumads">Premium Users Only</option></select><br /></label>

<div class="f-submit-wrap">
<input type="submit" value="Submit" class="f-submit" tabindex="9" /><br />
</div>
</fieldset>
</form>

<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />
<? include('footer.php');?>