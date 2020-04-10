<?php include('header.php'); ?>
<h2>Administrator's List</h2><br />
<table class="table1">
<tr>
<th>Id</th>
<th>Username</th>
<th>Last IP Log</th>
<th>PayPal Email</th>
<th></th>
<th></th>
</tr>
<? $myDb->connect(); $tabla = mysql_query("SELECT * FROM yob_users WHERE user_status='admin' ORDER BY id ASC"); $myDb->close(); while ($registro = mysql_fetch_array($tabla)) { echo "
	<tr>
	<td>". $registro["id"] ."</td>
	<td>". $registro["username"] ."</td>
	<td>". $registro["lastiplog"] ."</td>
	<td>". $registro["pemail"] ."</td>"; ?>
	<td>
	<form method="post" action="user_edit.php?id=<?= $registro["id"] ?>&option=edit">
	<input type="submit" value="Edit" class="f-submit">
	</form>
	</td>
	<td>
	<form method="post" action="user_edit.php?id=<?= $registro["id"] ?>&option=delete">
	<input type="submit" value="Delete" class="f-submit">
	</form>
	</td>
	</tr>
<?php
} ?>
</table>
<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />
<? include('footer.php');?>