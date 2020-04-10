<?php include_once('header.php');
if(isset($_COOKIE["usNick"]) && isset($_COOKIE["usPass"])){ 
		$user = $_COOKIE["usNick"];
		$myDb->connect();
			$sql = "SELECT * FROM yob_users WHERE username='$user'";
			$result = mysql_query($sql);        
			$row = mysql_fetch_array($result);
		$myDb->close();
?>
		<div id="content">
			<h2>My Account - Stats</h2>
			<table align="center" width="10%" cellspacing="0" cellpadding="0" class="table1">
				<tr>
					<th width="190">Referral Link</th>
					<td>&nbsp;&nbsp;<? echo SITE_URL."index.php?ref=".$row["username"]; ?></td>
				</tr>
				<tr>
					<th width="190">Username</th>
					<td>&nbsp;&nbsp;<? echo $row["username"]; ?></td>
				</tr>
				<tr>
					<th width="190">Account</th>
					<td>&nbsp;&nbsp;<? echo $row["account"]; ?></td>
				</tr>
				<tr>
					<th width="190">Ads Viewed</th>
					<td>&nbsp;&nbsp;<? echo $row["visits"]; ?></td>
				</tr>
				<tr>
					<th>Referrals</th>
					<td>&nbsp;&nbsp;<? echo $row["referals"]; ?></td>
				</tr>
				<tr>
					<th>Referral Visits</th>
					<td>&nbsp;&nbsp;<? echo $row["referalvisits"]; ?></td>
				</tr>
				<tr>
					<th>Balance</th>
					<td>&nbsp;&nbsp;$&nbsp;<? echo $row["money"]; ?></td>
				</tr>
				<tr>
					<th>Total Paid</th>
					<td>&nbsp;&nbsp;$&nbsp;<? echo $row["paid"]; ?></td>
				</tr>	
			</table>&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />


<?php include ('footer.php'); ?>
<?
}else{
	$display_error = "* You must login to access this page."; // error language
	include ('error.php');
	exit();	
}?>
