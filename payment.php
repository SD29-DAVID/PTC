<?php	include ('header.php'); 
		include ('includes/index.inc.php');

?>
		<div id="content">
	<h3>Check Your Purchase Information</h3>
<?php
	if(isset($_POST["status"])){

		$status=limpiar($_POST["status"]);
		if ($status == "premium"){

			$usercheck = uc($_COOKIE["usNick"]);
			$user = limpiar($_POST["purchaseusername"]);

			if ($usercheck == $user){
				$purchaseip = limpiar($_POST["purchaseip"]);
				$purchaseuseremail = limpiar($_POST["purchaseuseremail"]);
				$purchaseitemname = limpiar($_POST["purchaseitemname"]);
				$purchaseitemprice = limpiar($_POST["purchaseitemprice"]);
				$myDb->connect();
					$sqle = "SELECT * FROM yob_users WHERE username='$user'";
					$resulte = mysql_query($sqle);        
					$rowe = mysql_fetch_array($resulte);
				$myDb->close(); ?>

					<table align="center" width="80%" cellspacing="0" cellpadding="0" class="table1">
						<tr>
							<th class="top">&nbsp;</th>
							<th class="top"><b>Your Purchase Information</b></th>
						</tr>
						<tr>
							<th class="sub">Username</th>
							<td align="center"><?= $rowe['username'];?></td>
						</tr>
						<tr>
							<th class="sub">First Name</th>
							<td align="center"><?= $rowe['firstname'];?></td>
						</tr>
						<tr>
							<th class="sub">Last Name</th>
							<td align="center"><?= $rowe['surname'];?></td>
						</tr>
						<tr>
							<th class="sub">Your IP</th>
							<td align="center"><?= $purchaseip;?></td>
						</tr>
						<tr>
							<th class="sub">Email</th>
							<td align="center"><?= $purchaseuseremail;?></td>
						</tr>
						<tr>
							<th class="sub">Purchase Description</th>
							<td align="center"><?= $purchaseitemname;?></td>
						</tr>
						<tr>
							<th class="sub">Purchase Price</th>
							<td align="center">$ <?= $purchaseitemprice;?></td>
						</tr>
					</table>
<p>
			<?php include ('includes/gateways.inc.php');

			}else{?>
				<span class='success'><b>There's an Error On Your Request. Please Try Again</b></span>
				&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />
				<?php include ('footer.php');
				exit();
			}
		}else if ($status == "advertise"){
				$purchaseitemprice = 0;
				$purchaseip = limpiar($_POST["purchaseip"]);
				$pemail = limpiar($_POST["pemail"]);
				$description = limpiar($_POST["description"]);
				$url = limpiar($_POST["url"]);
				$plan = limpiar($_POST["plan"]);
				$myDb->connect();
					$sql = "SELECT price FROM yob_config WHERE item='hits' and howmany='$plan'";
					$result = mysql_query($sql);        
					$row1 = mysql_fetch_array($result);
				$myDb->close();
				$price_plan = $row1['price'];
				$purchaseitemprice = $purchaseitemprice+$price_plan;

				$viewable = limpiar($_POST["viewable"]);
				if ($viewable == "ads"){
					$viewable1 = "All Members";
				}
				if ($viewable == "premiumads"){
					$viewable1 = "Premium Members Only";
					$myDb->connect();
						$sql = "SELECT price FROM yob_config WHERE item='premiumad' and howmany='1'";
						$result = mysql_query($sql);        
						$row2 = mysql_fetch_array($result);
					$myDb->close();
					$price_viewable = $row2['price'];
					$purchaseitemprice = $purchaseitemprice+$price_viewable;
				}

				$bold = limpiar($_POST["bold"]);
				if ($bold == "0"){
					$bold1 = "No";
				}
				if ($bold == "1"){
					$bold1 = "Yes";
					$myDb->connect();
						$sql = "SELECT price FROM yob_config WHERE item='bold' and howmany='1'";
						$result = mysql_query($sql);        
						$row3 = mysql_fetch_array($result);
					$myDb->close();
					$price_bold = $row3['price'];
					$purchaseitemprice = $purchaseitemprice+$price_bold;
				}

				$highlight = limpiar($_POST["highlight"]);
				if ($highlight == "0"){
					$highlight1 = "No";
				}
				if ($highlight == "1"){
					$highlight1 = "Yes";
					$myDb->connect();
						$sql = "SELECT price FROM yob_config WHERE item='highlight' and howmany='1'";
						$result = mysql_query($sql);        
						$row4 = mysql_fetch_array($result);
					$myDb->close();
					$price_highlight = $row4['price'];
					$purchaseitemprice = $purchaseitemprice+$price_highlight;
				}
				$purchaseitemname = limpiar($_POST["purchaseitemname"]);


			?>
					<table align="center" width="80%" cellspacing="0" cellpadding="0" class="table1">
						<tr>
							<th class="top">&nbsp;</th>
							<th class="top"><b>Your Purchase Information</b></th>
						</tr>
						<tr>
							<th class="sub">Email</th>
							<td align="center"><?= $pemail;?></td>
						</tr>
							<th class="sub">Your IP</th>
							<td align="center"><?= $purchaseip;?></td>
						</tr>
						<tr>
							<th class="sub">Purchase Description</th>
							<td align="center"><?= $purchaseitemname;?></td>
						</tr>
						<tr>
							<th class="sub">Plan</th>
							<td align="center"><?= $plan;?> Member Visits</td>
						</tr>
						<tr>
							<th class="sub">Link Text</th>
							<td align="center"><?= $description;?></td>
						</tr>
						<tr>
							<th class="sub">Link Url</th>
							<td align="center"><?= $url;?></td>
						</tr>
						<tr>
							<th class="sub">Show Advert to</th>
							<td align="center"><?= $viewable1;?></td>
						</tr>
						<tr>
							<th class="sub">Bold Link</th>
							<td align="center"><?= $bold1;?></td>
						</tr>
						<tr>
							<th class="sub">Highlighted Link</th>
							<td align="center"><?= $highlight1;?></td>
						</tr>
						<tr>
							<th class="sub">Purchase Price</th>
							<td align="center">$ <?= $purchaseitemprice;?></td>
						</tr>
					</table>

<?php include ('includes/gateways2.inc.php');
		}else if ($status == "referrals"){
				$purchaseip = limpiar($_POST["purchaseip"]);
				$pemail = limpiar($_POST["pemail"]);
				$purchaseitemname = limpiar($_POST["purchaseitemname"]);
				$user = limpiar($_POST["customer"]);
				$refset = limpiar($_POST["refset"]);

				$myDb->connect();
					$sql = "SELECT price FROM yob_refset WHERE howmany='$refset'";
					$result = mysql_query($sql);        
					$row1 = mysql_fetch_array($result);
				$myDb->close();
				$purchaseitemprice = $row1['price'];
?>
					<table align="center" width="80%" cellspacing="0" cellpadding="0" class="table1">
						<tr>
							<th class="top">&nbsp;</th>
							<th class="top"><b>Your Purchase Information</b></th>
						</tr>
						<tr>
							<th class="sub">Username</th>
							<td align="center"><?= $user;?></td>
						</tr>
						<tr>
							<th class="sub">Your IP</th>
							<td align="center"><?= $purchaseip;?></td>
						</tr>
						<tr>
							<th class="sub">Email</th>
							<td align="center"><?= $pemail;?></td>
						</tr>
						<tr>
							<th class="sub">Purchase Description</th>
							<td align="center"><?= $refset;?> <?= $purchaseitemname;?></td>
						</tr>
						<tr>
							<th class="sub">Purchase Price</th>
							<td align="center">$ <?= $purchaseitemprice;?></td>
						</tr>
					</table>
<?php include ('includes/gateways3.inc.php'); ?>
<br />&nbsp;<br />&nbsp;<br />
<?php
		}
	}else{?>
		<span class='success'><b>Direct Access To This Page is not Allowed</b></span>
		</p><br /><br /><br />
		<p class="rightBottom"></p>
		<br class="spacer" />
		</div>
		<?php include ('footer.php');
		exit();
			}?>
</p>


<?php include ('footer.php'); ?>