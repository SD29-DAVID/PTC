<?php include('header.php'); if (isset($_GET["id"])){ $id=$_GET["id"]; if ($_GET["option"]=="unban"){ $myDb->connect(); $queryz = "DELETE FROM yob_banned WHERE id='$id'"; mysql_query($queryz) or die(mysql_error()); $myDb->close(); echo "<p class='success'>IP Has been Successfully Unbanned.</p>"; } } ?>
<table class="table1">
<tr>
<th>Id</th>
<th>IP Address</th>
<th>Reason</th>
<th></th>
</tr>
<? $myDb->connect(); $tabla = mysql_query("SELECT * FROM yob_banned ORDER BY id ASC"); $myDb->close(); while ($registro = mysql_fetch_array($tabla)){ echo "
	<tr>
	<td>". $registro["id"] ."</td>
	<td>". $registro["ip"] ."</td>
	<td>". $registro["reason"] ."</td>"; ?>
	<td>
	<form method="post" action="security_list_bannedip.php?id=<?= $registro["id"] ?>&option=unban">
	<input type="submit" value="Unban" class="f-submit">
	</form>
	</td>
	</tr>

<? } ?>
</table>
<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />
<? include('footer.php');?>