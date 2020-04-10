<?php  include('header.php'); if (isset($_POST["hits500"])) { $hits500=$_POST["hits500"]; $hits1000=$_POST["hits1000"]; $hits2000=$_POST["hits2000"]; $hits3000=$_POST["hits3000"]; $hits5000=$_POST["hits5000"]; $hits10000=$_POST["hits10000"]; $hits20000=$_POST["hits20000"]; $hits30000=$_POST["hits30000"]; $hits50000=$_POST["hits50000"]; $hits100000=$_POST["hits100000"]; $boldprice=$_POST["boldprice"]; $highlightprice=$_POST["highlightprice"]; $premiumonlyprice=$_POST["premiumonlyprice"]; $myDb->connect(); $query = "UPDATE yob_config SET price='$hits500' where item='hits' and howmany='500'"; mysql_query($query) or die(mysql_error()); $query = "UPDATE yob_config SET price='$hits1000' where item='hits' and howmany='1000'"; mysql_query($query) or die(mysql_error()); $query = "UPDATE yob_config SET price='$hits2000' where item='hits' and howmany='2000'"; mysql_query($query) or die(mysql_error()); $query = "UPDATE yob_config SET price='$hits3000' where item='hits' and howmany='3000'"; mysql_query($query) or die(mysql_error()); $query = "UPDATE yob_config SET price='$hits5000' where item='hits' and howmany='5000'"; mysql_query($query) or die(mysql_error()); $query = "UPDATE yob_config SET price='$hits10000' where item='hits' and howmany='10000'"; mysql_query($query) or die(mysql_error()); $query = "UPDATE yob_config SET price='$hits20000' where item='hits' and howmany='20000'"; mysql_query($query) or die(mysql_error()); $query = "UPDATE yob_config SET price='$hits30000' where item='hits' and howmany='30000'"; mysql_query($query) or die(mysql_error()); $query = "UPDATE yob_config SET price='$hits50000' where item='hits' and howmany='50000'"; mysql_query($query) or die(mysql_error()); $query = "UPDATE yob_config SET price='$hits100000' where item='hits' and howmany='100000'"; mysql_query($query) or die(mysql_error()); $query = "UPDATE yob_config SET price='$boldprice' where item='bold'"; mysql_query($query) or die(mysql_error()); $query = "UPDATE yob_config SET price='$highlightprice' where item='highlight'"; mysql_query($query) or die(mysql_error()); $query = "UPDATE yob_config SET price='$premiumonlyprice' where item='premiumad'"; mysql_query($query) or die(mysql_error()); $myDb->close(); echo "<p class='success'>Config Updated.</p>"; } ?>

<form method="post" action="config_ads.php" class="f-wrap-1">
		  <fieldset>
		  <h3>Advertisers Configuration</h3>

<label><b>Bold Link:</b>
<input type="text" name="boldprice" value="<? $myDb->connect(); $sqlfn = "SELECT price FROM yob_config WHERE item='bold'"; $resultfn = mysql_query($sqlfn); $rowfn = mysql_fetch_array($resultfn); $myDb->close(); echo $rowfn["price"]; ?>">&nbsp;&nbsp;Bold Link Price.<br />
</label>

<tr>
<label><b>Highlighted:</b>
<input type="text" name="highlightprice" value="<? $myDb->connect(); $sqlfn = "SELECT price FROM yob_config WHERE item='highlight'"; $resultfn = mysql_query($sqlfn); $rowfn = mysql_fetch_array($resultfn); $myDb->close(); echo $rowfn["price"]; ?>">&nbsp;&nbsp;Highlighted Link Price.<br />
</label>

<label><b>Premium Link:</b> <input type="text" name="premiumonlyprice" value="<? $myDb->connect(); $sqlfn = "SELECT price FROM yob_config WHERE item='premiumad'"; $resultfn = mysql_query($sqlfn); $rowfn = mysql_fetch_array($resultfn); $myDb->close(); echo $rowfn["price"]; ?>">&nbsp;&nbsp;Premium Only Link Price.<br />
</label>

<label><b>500 clicks:</b> <input type="text" name="hits500" value="<? $myDb->connect(); $sqlfn = "SELECT price FROM yob_config WHERE item='hits' and howmany='500'"; $resultfn = mysql_query($sqlfn); $rowfn = mysql_fetch_array($resultfn); $myDb->close(); echo $rowfn["price"]; ?>">&nbsp;&nbsp;Advertiser Purchase 500 Clicks.<br />
</label>



<label><b>1000 clicks:</b> <input type="text" name="hits1000" value="<? $myDb->connect(); $sqla = "SELECT price FROM yob_config WHERE item='hits' and howmany='1000'"; $resulta = mysql_query($sqla); $rowa = mysql_fetch_array($resulta); $myDb->close(); echo $rowa["price"]; ?>">&nbsp;&nbsp;Advertiser Purchase 1000 Clicks.<br />
</label>

<label><b>2000 clicks:</b> <input type="text" name="hits2000" value="<? $myDb->connect(); $sqled = "SELECT price FROM yob_config WHERE item='hits' and howmany='2000'"; $resulted = mysql_query($sqled); $rowed= mysql_fetch_array($resulted); $myDb->close(); echo $rowed["price"]; ?>">&nbsp;&nbsp;Advertiser Purchase 2000 Clicks.<br />
</label>

<label><b>3000 clicks:</b> <input type="text" name="hits3000" value="<? $myDb->connect(); $sqli = "SELECT price FROM yob_config WHERE item='hits' and howmany='3000'"; $resulti = mysql_query($sqli); $rowi = mysql_fetch_array($resulti); $myDb->close(); echo $rowi["price"]; ?>">&nbsp;&nbsp;Advertiser Purchase 3000 Clicks.<br />
</label>

<label><b>5000 clicks:</b> <input type="text" name="hits5000" value="<? $myDb->connect(); $sqlo = "SELECT price FROM yob_config WHERE item='hits' and howmany='5000'"; $resulto = mysql_query($sqlo); $rowo = mysql_fetch_array($resulto); $myDb->close(); echo $rowo["price"]; ?>">&nbsp;&nbsp;Advertiser Purchase 5000 Clicks.<br />
</label>

<label><b>10000 clicks:</b> <input type="text" name="hits10000" value="<? $myDb->connect(); $sqlu = "SELECT price FROM yob_config WHERE item='hits' and howmany='10000'"; $resultu = mysql_query($sqlu); $rowu = mysql_fetch_array($resultu); $myDb->close(); echo $rowu["price"]; ?>">&nbsp;&nbsp;Advertiser Purchase 10000 Clicks.<br />
</label>


<label><b>20000 clicks:</b> <input type="text" name="hits20000" value="<? $myDb->connect(); $sqltt = "SELECT price FROM yob_config WHERE item='hits' and howmany='20000'"; $resulttt = mysql_query($sqltt); $rowtt = mysql_fetch_array($resulttt); $myDb->close(); echo $rowtt["price"]; ?>">&nbsp;&nbsp;Advertiser Purchase 20000 Clicks.<br />
</label>

<label><b>30000 clicks:</b> <input type="text" name="hits30000" value="<? $myDb->connect(); $sqltr = "SELECT price FROM yob_config WHERE item='hits' and howmany='30000'"; $resulttr = mysql_query($sqltr); $rowtr = mysql_fetch_array($resulttr); $myDb->close(); echo $rowu["price"]; ?>">&nbsp;&nbsp;Advertiser Purchase 30000 Clicks.<br />
</label>

<label><b>50000 clicks:</b> <input type="text" name="hits50000" value="<? $myDb->connect(); $sqlft = "SELECT price FROM yob_config WHERE item='hits' and howmany='50000'"; $resultft = mysql_query($sqlft); $rowft = mysql_fetch_array($resultft); $myDb->close(); echo $rowft["price"]; ?>">&nbsp;&nbsp;Advertiser Purchase 50000 Clicks.<br />
</label>

<label><b>100000 clicks:</b> <input type="text" name="hits100000" value="<? $myDb->connect(); $sqlot = "SELECT price FROM yob_config WHERE item='hits' and howmany='100000'"; $resultot = mysql_query($sqlot); $rowot = mysql_fetch_array($resultot); $myDb->close(); echo $rowot["price"]; ?>">&nbsp;&nbsp;Advertiser Purchase 100000 Clicks.<br />
</label></table>


<div class="f-submit-wrap">
<input type="submit" value="Submit" class="f-submit" tabindex="4" /><br />
</div>
</fieldset>
</form>


&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />
<?php include('footer.php'); ?>