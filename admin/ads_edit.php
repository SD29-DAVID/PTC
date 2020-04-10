<?php include('header.php'); if (isset($_POST["id"])){ $id=$_POST["id"]; $pname=$_POST["pname"]; $pemail=$_POST["pemail"]; $plan=$_POST["plan"]; $url=$_POST["url"]; $description=$_POST["description"]; $tipo=$_POST["tipo"]; $bold=$_POST["bold"]; $highlight=$_POST["highlight"]; $myDb->connect(); $query = "UPDATE yob_ads SET bold='$bold', tipo='$tipo', highlight='$highlight', paypalname='$pname', paypalemail='$pemail', plan='$plan', url='$url', description='$description' where id='$id'"; mysql_query($query) or die(mysql_error()); $myDb->close(); echo "<p class='success'>Ads edited.</p>"; } if (isset($_GET["id"])){ $id=$_GET["id"]; $option=$_GET["option"]; if ($option=="edit"){ $myDb->connect(); $tablae = mysql_query("SELECT * FROM yob_ads where id='$id'"); $myDb->close(); while ($registroe = mysql_fetch_array($tablae)) { ?>

<form method="post" action="ads_edit.php" class="f-wrap-1">
		  <fieldset>
		  <h3>Edit News - ID #: <?= $registroe["id"] ?></h3>
			<input type="hidden" name="id" value="<?= $registroe["id"] ?>">
			<label><b>AlertPay name:</b>
			<input type="text" name="pname" value="<?= $registroe["paypalname"] ?>"><br />
			</label>
			<label><b>AlertPay email:</b>
			<input type="text" name="pemail" value="<?= $registroe["paypalemail"] ?>"><br />
			</label>
			<label><b>Plan:</b>
			<input type="text" name="plan" value="<?= $registroe["plan"] ?>">&nbsp;&nbsp;(Number of Visits)<br />
			</label>
			<label><b>URL:</b>
			<input type="text" name="url" value="<?= $registroe["url"] ?>"><br />
			</label>
			<label><b>Description:</b>
			<input type="text" name="description" value="<?= $registroe["description"] ?>"><br />
			</label>
			<label><b>Bold:</b>
			<select name="bold" class="f-name" tabindex="6" />
			<?php  if ($registroe['bold'] == "1"){ echo "<option value='1'>Yes</option>"; }else{ echo "<option value='0'>No</option>"; } ?>
			<option value="1">Yes</option><option value="0">No</option></select><br />
			</label>
			<label><b>Highlight:</b>
			<select name="highlight" class="f-name" tabindex="7" />
			<?php  if ($registroe['highlight'] == "1"){ echo "<option value='1'>Yes</option>"; }else{ echo "<option value='0'>No</option>"; } ?>
			<option value="1">Yes</option><option value="0">No</option></select><br /></label>
			<label><b>Show Advert To:</b>
			<select name="tipo" class="f-name" tabindex="8" />
			<?php  if ($registroe['tipo'] == "ads"){ echo "<option value='ads'>All Members</option>"; }else{ echo "<option value='premiumads'>Premium Members Only</option>"; } ?>
			<option value="ads">All Users</option><option value="premiumads">Premium Members Only</option></select><br /></label>
			<div class="f-submit-wrap">
			<input type="submit" value="Submit" class="f-submit" tabindex="9" /><br />
			</div>
		</fieldset>
	</form>

<? } } if ($option=="delete"){ $myDb->connect(); $queryz = "DELETE FROM yob_ads WHERE id='$id'"; mysql_query($queryz) or die(mysql_error()); $myDb->close(); echo "<p class='error'>Avertise has been deleted.</p>"; } } ?>
<h2>Edit Ads</h2><br />
<table class="table1">
<tr>
<th>Id</th>
<th>URL</th>
<th>Description</th>
<th>Show Ad to</th>
<th>Visits</th>
<th>&nbsp;</th>
<th>&nbsp;</th>
</tr>
<? $myDb->connect(); $tabla = mysql_query("SELECT * FROM yob_ads where tipo='ads' ORDER BY id ASC"); $myDb->close(); while ($registro = mysql_fetch_array($tabla)){ echo "
	<tr>
	<td>". $registro["id"] ."</td>
	<td ><a href=\"". $registro["url"] ."\" target=\"_blank\" title=\"". $registro["url"] ."\">View</a></td>
	<td><a href=\"#\" title=\"". $registro["description"] ."\">Description</a></td>
	<td>All Members</td>
	<td>". $registro["plan"] ."</td>
	<td>"; ?>
<form method="post" action="ads_edit.php?id=<?= $registro["id"] ?>&option=edit">
<input type="submit" value="Edit" class="f-submit">
</form>
</td>
<td>
<form method="post" action="ads_edit.php?id=<?= $registro["id"] ?>&option=delete">
<input type="submit" value="Delete" class="f-submit">
</form>
</td>
</tr>

<? } $myDb->connect(); $tabla = mysql_query("SELECT * FROM yob_ads where tipo='premiumads' ORDER BY id ASC"); $myDb->close(); while ($registro = mysql_fetch_array($tabla)){ echo "
	<tr>
	<td>". $registro["id"] ."</td>
	<td ><a href=\"". $registro["url"] ."\" target=\"_blank\" title=\"". $registro["url"] ."\">View</a></td>
	<td><a href=\"#\" title=\"". $registro["description"] ."\">Description</a></td>
	<td>Premium Members Only</td>
	<td>". $registro["plan"] ."</td>
	<td>"; ?>
<form method="post" action="ads_edit.php?id=<?= $registro["id"] ?>&option=edit">
<input type="submit" value="Edit" class="f-submit">
</form>
</td>
<td>
<form method="post" action="ads_edit.php?id=<?= $registro["id"] ?>&option=delete">
<input type="submit" value="Delete" class="f-submit">
</form>
</td>
</tr>

<? } ?>

</table>






<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />
<? include('footer.php');?>