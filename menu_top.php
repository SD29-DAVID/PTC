		<?php

		if(isset($_COOKIE["usNick"]) && isset($_COOKIE["usPass"]))
		{
		?>
		<ul id="nav">
		<li class="active"><a href="index.php">Home</a></li>
		<li><a href="viewads.php">View Ads</a></li>
		<li><a href="myaccount.php">My Account</a></li>
		<li><a href="logout.php">Logout</a></li>
		<li><a href="terms.php">TOS</a></li>
		<li><a href="advertise.php">Advertise</a></li>
		<?php
			if(ENABLE_FORUMS=="yes"){
			echo"<li><a href='".FORUM_LINK."'>Forum</a></li>";
		} ?>
		<li><a href="news.php">News</a></li>
		<li class="last"><a href="contactus.php">Contact Us</a></li>
		</ul>
		<?php 
		}
		else
		{
		?>
		<ul id="nav">
		<li class="active"><a href="index.php">Home</a></li>
		<li><a href="viewads.php">View Ads</a></li>
		<li><a href="login.php">Login</a></li>
		<li><a href="signup.php">Register</a></li>
		<li><a href="terms.php">TOS</a></li>
		<li><a href="advertise.php">Advertise</a></li>
		<?php
			if(ENABLE_FORUMS=="yes"){
			echo"<li><a href='".FORUM_LINK."'>Forum</a></li>";
		} ?>
		<li><a href="news.php">News</a></li>
		<li class="last"><a href="contactus.php">Contact Us</a></li>
		</ul>
		<?php 
		}
		?>