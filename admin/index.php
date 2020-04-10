<?php	include ('header.php'); include ('includes/index.inc.php'); $myDb->connect(); $check_refs = mysql_query("SELECT id FROM yob_buyref"); $refs = mysql_num_rows($check_refs); $check_messages = mysql_query("SELECT id FROM yob_contact"); $messages = mysql_num_rows($check_messages); $check_ads = mysql_query("SELECT id FROM yob_advertisers WHERE tipo!='convert'"); $ads = mysql_num_rows($check_ads); $check_payments = mysql_query("SELECT id FROM yob_payme"); $payments = mysql_num_rows($check_payments); $check_users = mysql_query("SELECT id FROM yob_users"); $users = mysql_num_rows($check_users); $sqryvar="Select sum(amount) from yob_history"; $iqryvar=mysql_query($sqryvar); $tot1=mysql_result($iqryvar,0,0); $totals=$tot1; if ($totals==''){ $totalpaid='0.00'; } else{ $totalpaid=$tot1; } $sqryvar="Select sum(visits) from yob_users"; $iqryvar=mysql_query($sqryvar); $tot1=mysql_result($iqryvar,0,0); $clickserved=$tot1; $myDb->close(); ?>
<div id="myaccount">

<h2>Admin Workload Overview</h2>
<br />

<table class="table1">
	<tr>
		<th width="250">Advertiser Requests</th>
		<td>&nbsp;&nbsp;<a href="ads_request.php"><?php echo $ads ?></a></td>
	</tr>
	<tr>
		<th>Support Emails</th>	
		<td>&nbsp;&nbsp;<a href="contact_messages.php"><?php echo $messages ?></a></td>
	</tr>
	<tr>
		<th>Payment Requests</th>	
		<td>&nbsp;&nbsp;<a href="payments_request.php"><?php echo $payments ?></a></td>
	</tr>
	<tr>
		<th>Referral Requests</th>
		<td>&nbsp;&nbsp;<a href="referral_request.php"><?php echo $refs ?></a></td>	
	</tr>
</table>

<hr />

<h2>Site Stats</h2>
<br />

<table class="table1">
	<tr>
		<th width="250">Total Users</th>
		<td>&nbsp;&nbsp;<?php echo $users ?></td>
	</tr>
	<tr>
		<th>Visitors Online</th>	
		<td>&nbsp;&nbsp;<?php require('includes/online.inc.php'); ?></td>
	</tr>
	<tr>
		<th>Total Paid</th>	
		<td>&nbsp;&nbsp;$ <?php echo $totalpaid ?></td>
	</tr>
	<tr>
		<th>Total Clicks Served</th>
		<td>&nbsp;&nbsp;<?php echo $clickserved ?></td>	
	</tr>
</table>





<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />

<?php  include('footer.php'); ?>