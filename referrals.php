<?php include('header.php');
if(isset($_COOKIE["usNick"]) && isset($_COOKIE["usPass"])){ ?>
		<div id="content">
		<h2>My Account - Referrals</h2>
	<table align="center" width="40%" cellspacing="0" cellpadding="0" class="table1 calendar">
	<tr>
	<th class="top"><b>Username</b></th>
	<th class="top"><b>Visits</th></tr>
	<?	$lole=$_COOKIE["usNick"];
		$myDb->connect();
			$tabla = mysql_query("SELECT username, visits FROM yob_users where referer='$lole' ORDER BY id ASC"); // selecciono todos los registros de la tabla usuarios, ordenado por nombre
		$myDb->close();
		while ($row = mysql_fetch_array($tabla)){
			echo "<tr><td align='center'>";
			echo $row["username"];
			echo "</td><td align='center'>";
			echo $row["visits"];
			echo "</td></tr>";
		}
		echo "</table>"; ?>&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />

<?php include ('footer.php'); ?>
<?
}else{
	$display_error = "* You must login to access this page."; // error language
	include ('error.php');
	exit();	
}?>

