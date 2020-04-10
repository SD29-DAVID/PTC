<?php include('header.php');
if(isset($_COOKIE["usNick"]) && isset($_COOKIE["usPass"])){ ?>
		<div id="content">
	<h2>Premium Membership</h2>

	<?php
		$user = uc($_COOKIE["usNick"]);
		$myDb->connect();
			$sqle = "SELECT * FROM yob_users WHERE username='$user'";
			$resulte = mysql_query($sqle);        
			$rowe = mysql_fetch_array($resulte);
		$myDb->close();
		if ($rowe["account"]=="premium"){?>
			<span class='success'><div align="center"><b>You are already a premium member, you do not need to upgrade twice.</b></div></span>&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />
			<?php include ('footer.php');
			exit();
		}else{
			$myDb->connect();
				$sql1 = "SELECT price FROM yob_config WHERE item='premiumclick' and howmany='1'";
				$result1 = mysql_query($sql1);        
				$row1 = mysql_fetch_array($result1);	
				$sql2 = "SELECT price FROM yob_config WHERE item='premiumreferalc' and howmany='1'";
				$result2 = mysql_query($sql2);        
				$row2 = mysql_fetch_array($result2);
				$sql3 = "SELECT price FROM yob_config WHERE item='click' and howmany='1'";
				$result3 = mysql_query($sql3);        
				$row3 = mysql_fetch_array($result3);	
				$sql4 = "SELECT price FROM yob_config WHERE item='referalclick' and howmany='1'";
				$result4 = mysql_query($sql4);        
				$row4 = mysql_fetch_array($result4);
				$sql5 = "SELECT price FROM yob_config WHERE item='upgrade' and howmany='1'";
				$result5 = mysql_query($sql5);        
				$row5 = mysql_fetch_array($result5);
			$myDb->close();
			$laip = getRealIP();

			?>

			<table align="center" width="80%" cellspacing="0" cellpadding="0" class="table1">
				<tr>
					<th class="top">&nbsp;</th>
					<th class="top"><b>Standard Users</b></th>
					<th class="top"><b>Premium Users</b></th>
				</tr>
				<tr>
					<th class="sub">Earnings per Click</th>
					<td align="center"><?= $row3['price'];?></td>
					<td align="center"><?= $row1['price'];?></td>
				</tr>
				<tr>
					<th class="sub">Earnings per Referral Click</th>
					<td align="center"><?= $row4['price'];?></td>
					<td align="center"><?= $row2['price'];?></td>
				</tr>
				<tr>
					<th class="sub">Standard Adverts</th>
					<td align="center">Yes</td>
					<td align="center">Yes</td>
				</tr>
				<tr>
					<th class="sub">Premium Adverts</th>
					<td align="center">--</td>
					<td align="center">Yes</td>
				</tr>
				<tr>
					<th class="sub">Payment Priority</th>
					<td align="center">--</td>
					<td align="center">Yes</td>
				</tr>
				<tr>
					<th class="sub">Price</th>
					<td align="center">Free</td>
					<td align="center"><?= $row5['price'];?></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td align="center">&nbsp;</td>
					<td align="center">

						<form action="payment.php" method="post">
							<input type="hidden" name="status" value="premium" />
							<input type="hidden" name="purchaseusername" value="<?= $rowe['username'];?>" />
							<input type="hidden" name="purchaseip" value="<?= $laip;?>" />
							<input type="hidden" name="purchaseuseremail" value="<?= $rowe['email'];?>" />
							<input type="hidden" name="purchaseitemname" value="Premium Membership" />
							<input type="hidden" name="purchaseitemprice" value="<?= $row5['price'];?>" />
							<input type="image" name="submit" src="images/paymentbutton.gif" border="0" alt="" />
						</form>
					
					
					</td>
				</tr>
			</table>&nbsp;<br />&nbsp;<br />


		<?php }
	?>

<?php include ('footer.php'); ?>
<?
}else{
	$display_error = "* You must login to access this page."; // error language
	include ('error.php');
	exit();	
}?>