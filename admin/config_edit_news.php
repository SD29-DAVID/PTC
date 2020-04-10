<?php include('header.php'); $myDb->connect(); if (isset($_POST["id"])){ $id=$_POST["id"]; $title=$_POST["title"]; $content=$_POST["content"]; $query = "UPDATE yob_news SET title='$title', content='$content' where id='$id'"; mysql_query($query) or die(mysql_error()); echo "<p class='success'>News Edited Successfully.</p>"; } if (isset($_GET["id"])){ $id=$_GET["id"]; if ($_GET["option"]=="edit"){ $tablae = mysql_query("SELECT * FROM yob_news where id='$id'"); while ($registroe = mysql_fetch_array($tablae)) { ?>
		  <form action="config_edit_news.php" method="post" class="f-wrap-1">
		  <fieldset>
<label><b>News Id:</b>
<input type="text" name="id" value="<?= $registroe["id"] ?>" class="f-name" disabled tabindex="1" /><br />
</label>

<label><b>Title:</b>
<input type="text" name="title" value="<?= $registroe["title"] ?>" class="f-name" tabindex="2" ><br />
</label> 

<label><b>Content:</b>
<textarea name="content" rows="7" class="f-comments"tabindex="3" ><?= $registroe["content"] ?></textarea><br />
</label>

<label><b>Date Added:</b>
<input type="text" name="id" value="<?= $registroe["date"] ?>" class="f-name" disabled /><br />
</label>
<input type="hidden" name="id" value="<?= $registroe["id"] ?>" class="f-name" />
			<div class="f-submit-wrap">
			<input type="submit" value="Submit" class="f-submit" tabindex="4" /><br />
			</div>
			</fieldset>
			</form>

<? } } if ($_GET["option"]=="delete") { $queryz = "DELETE FROM yob_news WHERE id='$id'"; mysql_query($queryz) or die(mysql_error()); echo "<p class='error'>News Deleted Successfully.</p>"; } } ?>

<table class="table1">
<tr>
<th>Id</th>
<th>Title</th>
<th width="300">Content</th>
<th>Date Added</th>
<th>Edit</th>
<th>Delete</th>
</tr>
<? $tabla = mysql_query("SELECT * FROM yob_news ORDER BY id ASC"); while ($registro = mysql_fetch_array($tabla)) { echo "
<tr>
<td>". $registro["id"] ."</td>
<td>". $registro["title"] ."</td>
<td>". $registro["content"] ."</td>
<td>". $registro["date"] ."</td>"; ?>
<td>
<form method="post" action="config_edit_news.php?id=<?= $registro["id"] ?>&option=edit">
<input type="submit" value="Edit" class="button">
</form>
</td>
<td>
<form method="post" action="config_edit_news.php?id=<?= $registro["id"] ?>&option=delete">
<input type="submit" value="Delete" class="button">
</form>
</td>
<?}?>
</tr>
</table>
<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />
<?php $myDb->close(); include('footer.php'); ?>