<?php include('header.php'); if (isset($_POST["id"])){ $id=$_POST["id"]; $howmany=$_POST["howmany"]; $price=$_POST["price"]; $myDb->connect(); $query = "UPDATE yob_refset SET howmany='$howmany', price='$price' where id='$id'"; mysql_query($query) or die(mysql_error()); $myDb->close(); echo "<p class='success'>Sets Has Been Successfully Edited.</p>"; } if (isset($_GET["id"])){ $id=$_GET["id"]; $howmany=$_GET["howmany"]; $option=$_GET["option"]; if ($option=="edit"){ $myDb->connect(); $tablae = mysql_query("SELECT * FROM yob_refset where id='$id'"); $myDb->close(); while ($registroe = mysql_fetch_array($tablae)) { ?>

		<form method="post" action="referral_modify_set.php" class="f-wrap-1">
		  <fieldset>
			  <h3>Edit Referral Set - ID #: <?= $registroe["id"] ?></h3>
				<input type="hidden" name="id" value="<?= $registroe["id"] ?>">
				<label><b>Referrals in Set:</b>
				<input type="text" name="howmany" autocomplete="off" class="f-name" tabindex="1" /><br />
				</label>
				<label><b>Price:</b>
				<input type="text" name="price" autocomplete="off" class="f-name" tabindex="2" /><br />
				</label>
				<div class="f-submit-wrap">
				<input type="submit" value="Submit" class="f-submit" tabindex="3" /><br />
				</div>
		</fieldset>
		</form>


<?php } } if ($option=="delete"){ $myDb->connect(); $queryz = "DELETE FROM yob_refset WHERE id='$id'"; mysql_query($queryz) or die(mysql_error()); $myDb->close(); echo "<font color=\"#cc0000\"><b>Set has been deleted.</b></font><br><br>"; } } ?>
<h2>Modify - Delete Referral Sets</h2><br />
<table class="table1">
<tr>
<th># Of Referrals in Set</th>
<th>Price ($)</th>
<th>&nbsp;</th><th>&nbsp;</th>
</tr>
<? $myDb->connect(); $tabla = mysql_query("SELECT * FROM yob_refset ORDER BY id ASC"); $myDb->close(); while ($registro = mysql_fetch_array($tabla)){ echo "
		<tr>
		<td>". $registro["howmany"] ."</td>
		<td>". $registro["price"] ."</td>
		<td>"; ?>
		<form method="post" action="referral_modify_set.php?id=<?= $registro["id"] ?>&option=edit">
		<input type="submit" value="Edit" class="f-submit">
		</form>
		</td>
		<td>
		<form method="post" action="referral_modify_set.php?id=<?= $registro["id"] ?>&option=delete">
		<input type="submit" value="Delete" class="f-submit">
		</form>
		</td>
		</tr>
<? } ?>
</table>
<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />
<? include('footer.php');?>