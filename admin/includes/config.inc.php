<?php
require_once ('../includes/database/database.inc.php'); 
$myDb = new Db; 
include ('siteconfig.inc.php'); 
require_once ('controls.inc.php'); 
if(isset($_COOKIE["usReferrer"])){ 
	}else{ setcookie("usReferrer",limpiar($_GET["r"]),time()+7776000); } 
?>