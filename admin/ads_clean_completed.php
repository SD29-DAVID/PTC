<?php include('header.php'); ?>
<?php if ($_POST){ $myDb->connect(); $tabla5 = mysql_query("SELECT * FROM yob_ads where tipo='ads' ORDER BY id ASC"); $tabla6 = mysql_query("SELECT * FROM yob_ads where tipo='premiumads' ORDER BY id ASC"); $myDb->close(); while ($registro5 = mysql_fetch_array($tabla5)) { $igual=$registro5["plan"]; $myDb->connect(); $queryz9 = "DELETE FROM yob_ads WHERE tipo='ads' and members='$igual'"; mysql_query($queryz9) or die(mysql_error()); $myDb->close(); } while ($registro6 = mysql_fetch_array($tabla6)) { $igual1=$registro6["plan"]; $myDb->connect(); $queryz2 = "DELETE FROM yob_ads WHERE tipo='premiumads' and members='$igual1'"; mysql_query($queryz2) or die(mysql_error()); $myDb->close(); } echo "<p class='success'>Done.</p>"; } ?>
<form method="post" action="ads_clean_completed.php" class="f-wrap-1">		  
		  <fieldset>
		  <h3>Clean Completed Ads</h3>
<p class="success">This button will clean the links that have completed the plan. Please use this button if the surf section is slow.</p>
<input type="hidden" name="clean" value="clean">
<div class="f-submit-wrap">
<input type="submit" value="Clean Now!" class="f-submit" tabindex="9" /><br />
</div>
</fieldset>
</form>


<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />
<? include('footer.php');?>