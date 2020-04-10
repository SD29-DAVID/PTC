<?php
 if(isset($_COOKIE["usNick"]) && isset($_COOKIE["usPass"])) { ?>
		<ul id="nav">
		<li class="active"><a href="../index.php">Back To Main Site</a></li>
		</ul>
		<?php  } else { ?>
		<ul id="nav">
		</ul>
		<?php  } ?>