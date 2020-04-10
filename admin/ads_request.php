<? include('header.php'); ?>
<h2> Advertisers Request</h2><br />
<?php
if (isset($_GET["id"])){ $id=$_GET["id"]; $option=$_GET["option"]; $pemail=$_POST["pemail"]; $plan=$_POST["plan"]; $url=$_POST["url"]; $description=$_POST["description"]; $ip=$_POST["ip"]; $bold=$_POST["bold"]; $highlight=$_POST["highlight"]; $viewable=$_POST["viewable"]; $fechainicia=time(); if ($option=="approve"){ $myDb->connect(); $query = "INSERT INTO yob_ads (fechainicia, paypalemail, plan, url, description, tipo, bold, highlight) VALUES('$fechainicia','$pemail','$plan','$url','$description','$viewable','$bold','$highlight')"; mysql_query($query) or die(mysql_error()); $queryz = "DELETE FROM yob_advertisers WHERE id='$id'"; mysql_query($queryz) or die(mysql_error()); $myDb->close(); echo "<p class='success'><b>Avertise request has been approved.</b></p>"; } if ($option=="deny"){ $myDb->connect(); $queryz = "DELETE FROM yob_advertisers WHERE id='$id'"; mysql_query($queryz) or die(mysql_error()); $myDb->close(); echo "<p class='success'><b>Avertise request has been deny.</b></p>"; } } ?>

<table class="table1">
	<tr>
		<th>Email</th>
		<th>Plan</th>
		<th>URL</th>
		<th>Description</th>
		<th>Bold</th>
		<th>Highlight</th>
		<th>Ip</th>
		<th>Show Ad To</th>
		<th></th>
		<th></th>
	</tr>
<? $myDb->connect(); $tabla = mysql_query("SELECT * FROM yob_advertisers where tipo!='convert' ORDER BY id ASC"); $myDb->close(); while ($registro = mysql_fetch_array($tabla)) { echo "
<tr>
<td>". $registro["pemail"] ."</td>
<td>". $registro["plan"] ."</td>
<td><a href=\"".$registro["url"]."\" title=\"".$registro["url"]."\" target=\"_blank\">View</a></td>
<td><a href=\"#\" title=\"".$registro["description"]."'\">Description</a></td>
<td>". $registro["bold"] ."</td>
<td>". $registro["highlight"] ."</td>
<td>". $registro["ip"] ."</td>"; if ($registro['viewable'] == "ads"){ echo "<td>All Members</td>"; } if ($registro['viewable'] == "premiumads"){ echo "<td>Premium Members</td>"; } echo "<td>"; ?>
<form method="post" action="ads_request.php?op=1&id=<?= $registro["id"] ?>&option=approve">
<input type="hidden" name="pemail" value="<?= $registro["pemail"] ?>">
<input type="hidden" name="plan" value="<?= $registro["plan"] ?>">
<input type="hidden" name="url" value="<?= $registro["url"] ?>">
<input type="hidden" name="description" value="<?= $registro["description"] ?>">
<input type="hidden" name="ip" value="<?= $registro["ip"] ?>">
<input type="hidden" name="viewable" value="<?= $registro["viewable"] ?>">
<input type="hidden" name="bold" value="<?= $registro["bold"] ?>">
<input type="hidden" name="highlight" value="<?= $registro["highlight"] ?>">
<input type="submit" value="approve" class="f-submit">
</form>
</td><td>
<form method="post" action="ads_request.php?op=1&id=<?= $registro["id"] ?>&option=deny">
<input type="submit" value="deny" class="f-submit">
</form>
</td>
</tr>

<? } ?>
</table>













<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />
<? include('footer.php');?>