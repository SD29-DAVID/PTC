                    <br /><div align="center">
						<?php  $myDb->connect(); $sqly = "SELECT * FROM yob_site WHERE id='1'"; $resulty = mysql_query($sqly); $rowy = mysql_fetch_array($resulty); $myDb->close(); include('payments/alertpay.php');?>
					</div>