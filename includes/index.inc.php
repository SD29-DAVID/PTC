<?php
 $myDb = new Db;
 $myDb->connect();
 $sql = "SELECT price FROM yob_config WHERE item='click'";
 $result = mysql_query($sql);
 $row = mysql_fetch_array($result);
 $sql1 = "SELECT price FROM yob_config WHERE item='signup_bonus'";
 $result1 = mysql_query($sql1);
 $row1 = mysql_fetch_array($result1);
 $sql2 = "SELECT adtimer FROM yob_site WHERE id='1'";
 $result2 = mysql_query($sql2);
 $row2 = mysql_fetch_array($result2);
 $sql3 = "SELECT price FROM yob_config WHERE item='hits' and howmany='1000'";
 $result3 = mysql_query($sql3);
 $row3 = mysql_fetch_array($result3);
 $myDb->close();
 DEFINE ("CLICK_PRICE", $row["price"]);
 DEFINE ("AD_TIMER", $row2["adtimer"]);
 DEFINE ("HITS_1000", $row3["price"]);
?>