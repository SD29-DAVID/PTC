<?php include('header.php');
if(isset($_COOKIE["usNick"]) && isset($_COOKIE["usPass"])){ ?>
		<div id="content">
		<h2>My Account - History</h2>
	<table align="center" width="80%" cellspacing="0" cellpadding="0" class="table1">
		<tr>
			<th class="top"><b>Date</b></th>
			<th class="top"><b>Amount</b></th>
			<th class="top"><b>Method</b></th>	
			<th class="top"><b>Status</b></th>	
		</tr>
		<?	$lole=$_COOKIE["usNick"];
			$myDb->connect();
				$tabla = mysql_query("SELECT * FROM yob_payme where username='$lole' ORDER BY id ASC");
			$myDb->close();
			while ($row = mysql_fetch_array($tabla)){
				echo "<tr><td align='center'>";
				echo $row["date"];
				echo "</td><td align='center'>";
				echo $row["money"];
				echo "</td><td align='center'>";
				echo $row["paymentmethod"];
				echo "</td><td align='center'>";
				echo "Pending";
				echo "</td></tr>";
			}
			$myDb->connect();
				$tabla = mysql_query("SELECT * FROM yob_history where user='$lole' ORDER BY id ASC");
			$myDb->close();
			while ($row = mysql_fetch_array($tabla)){
				echo "<tr><td align='center'>";
				echo $row["date"];
				echo "</td><td align='center'>";
				echo $row["amount"];
				echo "</td><td align='center'>";
				echo $row["method"];
				echo "</td><td align='center'>";
				echo $row["status"];
				echo "</td></tr>";
			} ?>
	</table>&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />

<?php include ('footer.php'); ?>
<?
}else{
	$display_error = "* You must login to access this page."; // error language
	include ('error.php');
	exit();	
}?>