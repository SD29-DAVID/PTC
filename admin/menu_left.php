<?php
 if(isset($_COOKIE["usNick"]) && isset($_COOKIE["usPass"])) { ?>
		<ul id="nav-secondary">
		<li class="first"><a href="index.php">Administration Home</a>
		<li class="active"><a href="#">Advertisers</a>
			<ul>
			<li class="first"><a href="ads_request.php">Advertisers Requests</a></li>
			<li><a href="ads_add.php">Add New Ads</a></li>
			<li><a href="ads_edit.php">Edit Ads</a></li>
			<li><a href="ads_user_request.php">Request From Users</a></li>
			<li class="last"><a href="ads_clean_completed.php">Clean Completed Ads</a></li>
			</ul>
		</li>
		<li class="active"><a href="#">Contact</a>
			<ul>
			<li class="first"><a href="contact_messages.php">Messages</a></li>
			<li class="last"><a href="contact_mass_email.php">Send Mass Email</a></li>
			</ul>
		</li>
		<li class="active"><a href="#">Payments</a>
			<ul>
			<li class="last"><a href="payments_request.php">Payments Request</a></li>
			</ul>
		</li>
		<li class="active"><a href="#">Referrals</a>
			<ul>
			<li class="first"><a href="referral_add_set.php">Add Referral Set</a></li>
			<li><a href="referral_modify_set.php">Modify Referral Set</a></li>
			<li><a href="referral_request.php">Referrals Request</a></li>
			<li class="last"><a href="referral_asign.php">Assign Referrals to User</a></li>
			</ul>
		</li>
		<li class="active"><a href="#">Users</a>
			<ul>
			<li class="first"><a href="user_add_new.php">Add New User</a></li>
			<li><a href="user_edit.php">Edit Users</a></li>
			<li><a href="user_search.php">Search Users</a></li>
			<li><a href="user_list_emails.php">List Users Emails</a></li>
			<li><a href="user_list_premiums.php">List Premium Users</a></li>
			<li class="last"><a href="user_list_admins.php">List Administrators</a></li>
			</ul>
		</li>
		<li class="active"><a href="#">Script Configuration</a>
			<ul>
			<li class="first"><a href="config_site.php">Site Configuration</a></li>
			<li><a href="config_clicks.php">Clicks Configuration</a></li>
			<li><a href="config_ads.php">Ads Configuration</a></li>
			<li><a href="config_add_news.php">Add News Articles</a></li>
			<li><a href="config_edit_news.php">Edit News Articles</a></li>
			<li class="last"><a href="config_adsense.php">Adsense Configuration</a></li>
			</ul>
		</li>
		<li class="active"><a href="#">Site Security</a>
			<ul>
			<li class="first"><a href="security_bot_detection.php">Bot Detection</a></li>
			<li><a href="security_banip.php">Ban Ip Address</a></li>
			<li class="last"><a href="security_list_bannedip.php">List Banned Ip's</a></li>
			</ul>
		</li>

		<li class="last"><a href="../index.php">Back to Main Site</a></li>
		</ul>
		<?php  } else { ?>
		<ul id="nav-secondary">
		</ul>
		<?php  } ?>