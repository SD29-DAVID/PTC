<?php include('header.php'); $subject = $HTTP_POST_VARS["subject"]; $subject = stripslashes($subject); $content_1 = $HTTP_POST_VARS["content_1"]; $content_1 = htmlentities($content_1, ENT_QUOTES); $content_1 = stripslashes($content_1); $content_1 = "<font face=\"arial\"> ". $content_1 ." </font>"; $myDb->connect(); $SQL = mysql_query("SELECT email FROM yob_users"); $myDb->close(); while($row = mysql_fetch_array($SQL)){ $EmailAddress2[] = $row["email"]; } $SITEEMAIL = $_POST['from']; ?>

<form method="post" action="contact_mass_email.php" class="f-wrap-1">
		  <fieldset>
		  <h3>Send Mass Email to Users</h3>

			<label><b>From:</b>
			<input type='text' name='from' class="f-name" value="no-reply@<?php echo SITENAME;?>.com"><br />
			</label>
			<label><b>Subject:</b>
			<input type='text' name='subject' class="f-name"><br />
			</label>
			<label><b>Message:</b>
			<textarea name="content_1" rows="15" class="f-comments"></textarea><br />
			</label>
			
			<div class="f-submit-wrap">
			<input type="submit" value="Submit" class="f-submit" tabindex="9" /><br />
			</div>
			</fieldset>


</form>

<?php
if($content_1 || "" and $subject || ""){ $myDb->connect(); $res = mysql_query("SELECT email FROM yob_users") or die(); $myDb->close(); $subject2 = $subject; $headers = "MIME-Version: 1.0\r\n"; $headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; $headers .= "From:".$CURUSER['email']."\r\n"; $mailbody = $HTTP_POST_VARS["content_1"]; $to = ""; $nmax = 1000;  $nthis = 0; $ntotal = 0; $total = mysql_num_rows($res); while ($arr = mysql_fetch_row($res)){ if ($nthis == 0) $to = $arr[0]; else $to .= "," . $arr[0]; ++$nthis; ++$ntotal; if ($nthis == $nmax || $ntotal == $total) { if (!mail("Multiple recipients <$SITEEMAIL>", "$subject", $mailbody, "From: $SITEEMAIL\r\nBcc: $to", "-f$SITEEMAIL")) $nthis = 0; } } echo "<p class='success'>Sent From: $SITEEMAIL. <br />"; echo "Message: $mailbody <br />"; echo "Message Sent!</p>"; } ?>

<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />
<? include('footer.php');?>