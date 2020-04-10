		<?php

		if(isset($_COOKIE["usNick"]) && isset($_COOKIE["usPass"]))
		{
		?>
		<ul id="nav-secondary">
		<li class="first"><a href="index.php">Home</a></li>
		<li><a href="viewads.php">View Ads</a></li>
		<li class="active"><a href="myaccount.php">My Account</a>
			<ul>
			<li class="first"><a href="profile.php">My Profile</a></li>
			<li><a href="history.php">My History</a></li>
			<li><a href="referrals.php">My Referrals</a></li>
			<li><a href="convert.php">Withdraw/Convert</a></li>
			<li><a href="upgrade.php">Upgrade My Account</a></li>			
			<li><a href="purchase.php">Purchase Referrals</a></li>
			<li><a href="advertise.php">Advertise</a></li>
			<li class="last"><a href="logout.php">Logout</a></li>
			</ul>
		</li>
		<li><a href="terms.php">TOS</a></li>
		<li><a href="faq.php">FAQ's</a></li>
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
		<ul id="nav-secondary">
		<li class="first"><a href="index.php">Home</a></li>
		<li><a href="viewads.php">View Ads</a></li>
		<li><a href="login.php">Login</a></li>
		<li><a href="signup.php">Register</a></li>
		<li><a href="terms.php">TOS</a></li>
		<li><a href="faq.php">FAQ's</a></li>
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