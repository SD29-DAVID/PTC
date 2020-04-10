<?php include('header.php'); ?>


<div id="content">
<h2>What's new on <?php echo SITENAME; ?></h2>
<?php
$myDb->connect();
	$checknews = mysql_query("SELECT * FROM yob_news");
	$news_exists = mysql_num_rows($checknews);
$myDb->close();
if ($news_exists<1)
{
?>

<p class="error">Sorry. There are no site updates available at the moment.<br><br>Please check back at another time.</p>

<?php
}else{
$myDb->connect();
$tabla = mysql_query("SELECT * FROM yob_news ORDER BY id");
$myDb->close();
while ($registro = mysql_fetch_array($tabla)) {
?>
			<h4><span class="date"><?php echo $registro["date"]; ?></span> <?php echo $registro["title"];?></h4>
			<p><?php echo $registro["content"]; ?></p>						

<?
}
}?>
			<br />&nbsp;<br />&nbsp;<br />&nbsp;<br /><br />&nbsp;<br />&nbsp;<br />&nbsp;<br /><br />&nbsp;<br />&nbsp;<br />&nbsp;<br /><br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />
<?php
include('footer.php'); ?>