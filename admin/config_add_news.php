<?php include('header.php'); if($_POST['title']){ $myDb->connect(); $date = date("F j, Y"); $title = $_POST['title']; $content = $_POST['content']; $queryNews = "INSERT INTO yob_news (title, content, date) VALUES('$title','$content','$date')"; mysql_query($queryNews); $myDb->close(); echo "<p class='success'>News inserted successfully.</p>"; } ?>
<form method="post" action="config_add_news.php" class="f-wrap-1">
		  <fieldset>

		  <h3>Add News Article</h3>
<label><b>Subject</b>
<input type='text' class="f-name" name='title' value="" tabindex="1" /><br />
</label>

<label><b>Content</b>
<textarea name="content" rows="7" class="f-comments" tabindex="2">Insert news article here.</textarea>&nbsp;&nbsp;Please use HTML, please use google to find available HTML tags.<br />
</label>
<div class="f-submit-wrap">
<input type="submit" value="Submit" class="f-submit" tabindex="3" /><br />
</div>
</fieldset>
</form>
<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />
<? include('footer.php');?>