<?php  include('header.php'); if (isset($_POST["code"])) { $code=$_POST["code"]; $myDb->connect(); $query = "UPDATE yob_adsense SET code='$code'"; mysql_query($query) or die(mysql_error()); $myDb->close(); echo "<p class='success'>Adsense Code Updated.</p>"; } ?>


		  <form action="config_adsense.php" method="post" class="f-wrap-1">
		  <fieldset>

		  <h3>Adsense Code Configuration</h3>

<? $myDb->connect(); $sql = "SELECT code FROM yob_adsense WHERE id='1'"; $result = mysql_query($sql); $row = mysql_fetch_array($result); $myDb->close(); ?>

<label><b>Code</b>
<textarea name="code" rows="18" cols="200" class="f-comments">
<?php echo $row["code"]; ?>
</textarea><br />
</label>
<div class="f-submit-wrap">
<input type="submit" value="Submit" class="f-submit" tabindex="4" /><br />
</div>
</fieldset>
</form>




&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />
<?php include('footer.php'); ?>