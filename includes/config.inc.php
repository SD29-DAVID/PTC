<?php
require_once ('database/database.inc.php');
$myDb = new Db;
include ('siteconfig.inc.php');
require_once ('controls.inc.php');
if(isset($_COOKIE["usReferrer"])){
}else{
setcookie("usReferrer",limpiar($_GET["ref"]),time()+7776000);
}
?>