<?php session_start();
include('header.php'); ?>
<div id="content">
<h2>Contact <?php echo SITENAME; ?> Support</h2>
<?
if ($_POST['name']) {
	$username = $_POST['username'];
	if( strtolower($_POST['code'])!= strtolower($_SESSION['texto'])){ 
		$display_error = "* Security Code Error"; // error language
		include ('error.php');
		exit();
	}else{
		$name=limpiar($_POST["name"]);
		$email=limpiar($_POST["email"]);
		$topic=limpiar($_POST["topic"]);
		$subject=limpiar($_POST["subject"]);
		$comments=limpiar($_POST["comments"]);

		if ($name==NULL|$email==NULL|$topic==NULL|$subject==NULL|$comments==NULL){
			$display_error = "* All fields are required"; // error language
			include ('error.php');
			exit();
		}

		$laip = getRealIP();
		$myDb->connect();
			$query = "INSERT INTO yob_contact (name, email, topic, subject, comments, ip) VALUES('$name','$email','$topic','$subject','$comments','$laip')";
			mysql_query($query) or die(mysql_error());
		$myDb->close();

		$display_error = "* Your Message has been sent correctly."; // error language
		include ('error.php');
		exit();
	}
}

?>
<script type="text/javascript">
function ismaxlength(obj){
var mlength=obj.getAttribute? parseInt(obj.getAttribute("maxlength")) : ""
if (obj.getAttribute && obj.value.length>mlength)
obj.value=obj.value.substring(0,mlength)
}
</script>
<p>Use the form below to contact <?php echo SITENAME; ?> support. Replies may take up to 48 hours or more depending on our work load.</p>

<form action="contactus.php" method="post" class="f-wrap-1">
	<div class="req">All Fields Required</div>
	<fieldset>
	<h3>Contact Form</h3>

	<label><b>Your Name:</b>
	<input type="text" name="name" autocomplete="off" class="f-name" value="" tabindex="1" /><br />
	</label>
	<label><b>Your E-mail:</b>
	<input type="text" name="email" autocomplete="off" class="f-name" value="" tabindex="2" /><br />
	</label>
	<label><b>Topic:</b>
	<input type="text" name="topic" autocomplete="off" class="f-name" value="" tabindex="3" /><br />
	</label>
	<label><b>Subject:</b>
	<input type="text" name="subject" autocomplete="off" class="f-name" value="" tabindex="4" /><br />
	</label>
	<label><b>Comments:</b>
	<textarea name="comments" rows="7" class="f-comments" onkeyup="return ismaxlength(this)" tabindex="5"></textarea><br />
	</label>
	<label><b>Security Code:</b>
	<input type='text' name='code' autocomplete="off" class="f-name" value="" tabindex="6" /><br />
	</label>
	<label for="code2"><b>&nbsp;</b>
	<img src="image.php?<?php echo $res; ?>" /><br />
	</label>
	<div class="f-submit-wrap">
		<input type="submit" value="Submit" class="f-submit" tabindex="18" /><br />
	</div>
</fieldset>
</form>


<? include('footer.php'); ?>

