<?php include('header.php'); ?>
<?php  if (isset($_POST["username"])){ $username = $_POST["username"]; $password = $_POST["password"]; $email = $_POST["email"]; $pemail = $_POST["pemail"]; $country = $_POST["country"]; $joindate = date("F j, Y"); $status = $_POST["status"]; $myDb->connect(); $query = "INSERT INTO yob_users (username, password, ip, email, pemail, referer, country, joindate, user_status) VALUES('$username','$password','','$email','$pemail','$referer','$country','$joindate', '$status')"; mysql_query($query) or die(mysql_error()); $myDb->close(); echo "<p class='success'>User $username has been added successfully.</p>"; } ?>

<form method="post" action="user_add_new.php" class="f-wrap-1">
 <fieldset>
	  <h3>Add New User to Database</h3>

    <label><b>Username:</b>
    <input type='text' name='username' class="f-name" tabindex="1" autocomplete="off" /><br />
	</label>
  
    <label><b>Password:</b>
	<input type="password" name="password" class="f-name" tabindex="2" autocomplete="off" /><br />
	</label>
 
    <label><b>Email Address:</b>
	<input type="text" name="email" class="f-name" tabindex="4" autocomplete="off" /><br />
	</label>
  
    <label><b>AlertPay E-mail:</b>
	<input type="text" name="pemail" class="f-name" tabindex="6" autocomplete="off" /><br />
	</label>
  
    <label><b>Country:</b>
	<input type="text" name="country" class="f-name" tabindex="7" autocomplete="off" /><br />
	</label>
  
    <label><b>Referrer:</b>
	<input type="text" name="referer" class="f-name" tabindex="8" autocomplete="off" /><br />
	</label>

    <label><b>Status:</b>
	<select name="status" tabindex="9" >
	<option value="user">User</option>
	<option value="admin">Administrator</option>
	</select><br />
	</label>

	<div class="f-submit-wrap">
	<input type="submit" value="Submit" class="f-submit" tabindex="10" /><br />
	</div>
</fieldset>
</form>


<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />
<? include('footer.php');?>