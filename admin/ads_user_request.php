<?php include('header.php'); ?>
<h2> Advertisers Request from Users</h2><br />
<?php
if (isset($_GET["id"])){ $id=$_GET["id"]; $option=$_GET["option"]; $pemail=$_POST["pemail"]; $plan=$_POST["plan"]; $url=$_POST["url"]; $description=$_POST["description"]; $ip=$_POST["ip"]; $fechainicia=time(); if ($option=="approve"){ $myDb->connect(); $query = "INSERT INTO yob_ads (fechainicia, paypalemail, plan, url, description, tipo) VALUES('$fechainicia','$pemail','$plan','$url','$description','ads')"; mysql_query($query) or die(mysql_error()); $queryz = "DELETE FROM yob_advertisers WHERE id='$id' and tipo='convert'"; mysql_query($queryz) or die(mysql_error()); $myDb->close(); echo "<p class='success'>Avertise request has been approved.</p>"; } if ($option=="deny"){ $myDb->connect(); $sqlz = "SELECT price FROM yob_config WHERE item='hits' and howmany='1000'"; $resultz = mysql_query($sqlz); $rowz = mysql_fetch_array($resultz); $thevalue = $rowz['price']; $sqlu = "SELECT money FROM yob_users WHERE username='$pemail'"; $resultu = mysql_query($sqlu); $rowu = mysql_fetch_array($resultu); $money=$rowu["money"]; $moneynow = $money + $thevalue; $queryz = "DELETE FROM yob_advertisers WHERE id='$id' and tipo='convert'"; mysql_query($queryz) or die(mysql_error()); $queryb = "UPDATE yob_users SET money='$moneynow' WHERE username='$pemail'"; mysql_query($queryb) or die(mysql_error()); $myDb->close(); echo "<p class='error'>Avertise request has been deny.</p>"; } } ?>
<table class="table1">
<tr>
<th>Id</th>
<th>User</th>
<th>Money</th>
<th>Plan</th>
<th>URL</th>
<th>Description</th>
<th>Ip</th>
<th></th>
<th></th>
</tr>
<? $myDb->connect(); $tabla = mysql_query("SELECT * FROM yob_advertisers where tipo='convert' ORDER BY id ASC"); $myDb->close(); while ($registro = mysql_fetch_array($tabla)){ echo "
		<tr>
		<td bgcolor=\"#eeeeee\"><font size=\"2\" face=\"verdana\">
		". $registro["id"] ."
		</font></td>
		<td bgcolor=\"#eeeeee\"><font size=\"2\" face=\"verdana\">
		". $registro["pemail"] ."
		</font></td>
		<td bgcolor=\"#eeeeee\"><font size=\"2\" face=\"verdana\">
		$". $registro["money"] ."
		</font></td>
		<td bgcolor=\"#eeeeee\"><font size=\"2\" face=\"verdana\">
		". $registro["plan"] ."
		</font></td>
		<td bgcolor=\"#eeeeee\"><font size=\"2\" face=\"verdana\">
		<a href=\"". $registro["url"] ."\" target=\"_blank\" title=\"". $registro["url"] ."\">View site</a>
		</font></td>
		<td bgcolor=\"#eeeeee\"><font size=\"2\" face=\"verdana\">
		<a href=\"#\" title=\"". $registro["description"] ."\">Description</a>
		</font></td>
		<td bgcolor=\"#eeeeee\"><font size=\"2\" face=\"verdana\">
		". $registro["ip"] ."
		</font></td>
		<td bgcolor=\"#eeeeee\"><font size=\"2\" face=\"verdana\">"; ?>
		<form method="post" action="ads_user_request.php?id=<?= $registro["id"] ?>&option=approve">
		<input type="hidden" name="pemail" value="<?= $registro["pemail"] ?>">
		<input type="hidden" name="plan" value="<?= $registro["plan"] ?>">
		<input type="hidden" name="url" value="<?= $registro["url"] ?>">
		<input type="hidden" name="description" value="<?= $registro["description"] ?>">
		<input type="hidden" name="ip" value="<?= $registro["ip"] ?>">
		<input type="submit" value="approve" class="f-submit">
		</form>
		</td><td>
		<form method="post" action="ads_user_request.php?id=<?= $registro["id"] ?>&option=deny">
		<input type="hidden" name="pemail" value="<?= $registro["pemail"] ?>">
		<input type="submit" value="deny" class="f-submit">
		</form>

		</font></td></td>
		</tr>
<? } ?>
</table>

<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />
<? include('footer.php');?>