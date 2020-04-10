<?php include('header.php'); if (isset($_POST["ip"])){ $ip = $_POST["ip"]; $reason = $_POST["reason"]; $myDb->connect(); $query = "INSERT INTO yob_banned (ip, reason) VALUES( '$ip', '$reason')"; mysql_query($query) or die(mysql_error()); $myDb->close(); echo "<p class='success'>IP address: ".$ip." Has Been Banned..</p>"; } ?>
			<form method="post" action="security_banip.php" class="f-wrap-1">
			<fieldset>
			<h3>Ban Ip Address</h3>
			<label><b>IP Address:</b>
			<input type="text" name="ip" autocomplete="off" tabindex="1" /><br />
			</label>
			<label><b>Reason:</b>
			<textarea name="reason" rows="7" class="f-comments" tabindex="2"></textarea><br />
			</label>

				<div class="f-submit-wrap">
				<input type="submit" value="Submit" class="f-submit" tabindex="3" /><br />
				</div>
		</fieldset>
		</form>


<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />
<? include('footer.php');?>