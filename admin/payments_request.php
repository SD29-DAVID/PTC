<?php include('header.php'); ?>
<h2> Payments Request</h2><br />
<p>When you have made the payment via <a href="http://www.alertpay.com/" target="_blank">AlertPay</a> push the buttom "Paid".</p>
<?php
if (isset($_GET["id"])){ $id=$_GET["id"]; $option=$_GET["option"]; if ($option=="paid"){ $username=$_POST["username"]; $paymentmethod=$_POST["paymentmethod"]; $myDb->connect(); $tablae = mysql_query("SELECT * FROM yob_users where username='$username'"); $myDb->close(); while ($registroe = mysql_fetch_array($tablae)){ $lolze=$registroe["money"]; $lolza=$_POST["money"]; $moneye= $lolze - $lolza; $lolzea=$registroe["paid"]; $moneyere= $lolzea + $lolza; $myDb->connect(); $query = "UPDATE yob_users SET paid='$moneyere' where username='$username'"; mysql_query($query) or die(mysql_error()); $myDb->close(); $eltiempo=time(); $lafecha=date("d M Y H:i",$eltiempo); $myDb->connect(); $query = "INSERT INTO yob_history (user, date, amount, method, status) VALUES('$username','$lafecha','$lolza','$paymentmethod','Payment Sent')"; mysql_query($query) or die(mysql_error()); $queryz = "DELETE FROM yob_payme WHERE id='$id'"; mysql_query($queryz) or die(mysql_error()); $myDb->close(); echo "<p class='success'><b>User stats has been updated.</p>"; } } if ($option=="deny"){ $id=$_POST["id"]; $money = $_POST["money"]; $username=$_POST["username"]; $myDb->connect(); $queryz = "DELETE FROM yob_payme WHERE id='$id'"; mysql_query($queryz) or die(mysql_error()); $queryb = "UPDATE yob_users SET money='$money' WHERE username='$username'"; mysql_query($queryb) or die(mysql_error()); $myDb->close(); echo "<p class='error'><b>Payment Request Has Been Denied.</p>"; } } ?>
<table class="table1">
<tr>
<th>Username</th>
<th>Country</th>
<th>AlertPay email</th>
<th>Amount</th>
<th>Method</th>
<th>Ip</th>
<th></th><th></th>
</tr>

<? $myDb->connect(); $tabla = mysql_query("SELECT * FROM yob_payme ORDER BY id ASC"); $myDb->close(); while ($registro = mysql_fetch_array($tabla)){ $user = $registro["username"]; $myDb->connect(); $tablau = mysql_query("SELECT * FROM yob_users  WHERE username='$user'"); $myDb->close(); while ($registrou = mysql_fetch_array($tablau)){ echo "
		<tr>
		<td>". $registro["username"] ."</td>
		<td>". $registrou["country"] ."</td>
		<td>". $registro["pemail"] ."</td>
		<td>". $registro["money"] ."</td>
		<td>". $registro["paymentmethod"] ."</td>
		<td>". $registro["ip"] ."</td>"; ?>
		<td>
		<form method="post" action="payments_request.php?id=<?= $registro["id"] ?>&option=paid">
		<input type="hidden" name="money" value="<?= $registro["money"] ?>">
		<input type="hidden" name="username" value="<?= $registro["username"] ?>">
		<input type="hidden" name="paymentmethod" value="<?= $registro["paymentmethod"] ?>">
		<input type="submit" value="Paid" class="f-submit">
		</form>
		</td>
		<td>
		<form method="post" action="payments_request.php?id=<?= $registro["id"] ?>&option=deny">
		<input type="hidden" name="money" value="<?= $registro["money"] ?>">
		<input type="hidden" name="username" value="<?= $registro["username"] ?>">
		<input type="hidden" name="id" value="<?= $registro["id"] ?>">
		<input type="submit" value="Deny" class="f-submit">
		</form>
		</td>
		</tr>
<? } } ?>
</table>


<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />
<? include('footer.php');?>