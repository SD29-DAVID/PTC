<?php include('header.php'); if (isset($_POST["id"])){ $id=$_POST["id"]; $firstname=$_POST["firstname"]; $surname=$_POST["surname"]; $username=$_POST["username"]; $password=$_POST["password"]; $referer=$_POST["referer"]; $email=$_POST["email"]; $pemail=$_POST["pemail"]; $country=$_POST["country"]; $vistis=$_POST["vistis"]; $referals=$_POST["referals"]; $referalvisits=$_POST["referalvisits"]; $account=$_POST["account"]; $money=$_POST["money"]; $user_status=$_POST["user_status"]; $myDb->connect(); $query = "UPDATE yob_users SET firstname='$firstname', surname='$surname', username='$username', password='$password', referer='$referer', email='$email', pemail='$pemail', country='$country', visits='$vistis', referals='$referals', referalvisits='$referalvisits', money='$money', user_status='$user_status', account='$account' where id='$id'"; mysql_query($query) or die(mysql_error()); $myDb->close(); echo "<p class='success'>User $username edited.</p>"; } if (isset($_GET["id"])){ $id=$_GET["id"]; if ($_GET["option"]=="edit"){ $myDb->connect(); $tablae = mysql_query("SELECT * FROM yob_users where id='$id'"); $myDb->close(); while ($registroe = mysql_fetch_array($tablae)){ ?>
			<form method="post" action="user_edit.php" class="f-wrap-1">
			<fieldset>
			<h3>Edit User - ID #: <?= $registroe["id"] ?></h3>

			<input type="hidden" name="id" value="<?= $registroe["id"] ?>">

			<label><b>First Name:</b>
			<input type="text" name="firstname" value="<?= $registroe["firstname"] ?>" tabindex="1"/ ><br />
			</label>
			<label><b>Surname:</b>
			<input type="text" name="surname" value="<?= $registroe["surname"] ?>" tabindex="2" /><br />
			</label>
			<label><b>Username:</b>
			<input type="text" name="username" value="<?= $registroe["username"] ?>" tabindex="3" /><br />
			</label>
			<label><b>Password:</b>
			<input type="text" name="password" value="<?= $registroe["password"] ?>" tabindex="4" />&nbsp;&nbsp;This is a Sha1 Hash<br />
			</label>
			<label><b>Referer:</b>
			<input type="text" name="referer" value="<?= $registroe["referer"] ?>" tabindex="5" /><br />
			</label>
			<label><b>E-mail:</b>
			<input type="text" name="email" value="<?= $registroe["email"] ?>" tabindex="6" /><br />
			</label>
			<label><b>AlertPay e-mail:</b>
			<input type="text" name="pemail" value="<?= $registroe["pemail"] ?>" tabindex="7" /><br />
			</label>
			<label><b>Country:</b>
			<select name="country" class="form" autocomplete="off" tabindex="8">
				<option value="<?= $registroe["country"] ?>"><?= $registroe["country"] ?></option>
				<option value=Albania>Albania</option>
				<option value=Algeria>Algeria</option>
				<option value=Andorra>Andorra</option>
				<option value=Angola>Angola</option>
				<option value=Anguilla>Anguilla</option>
				<option value=Antigua and Barbuda>Antigua and Barbuda</option>
				<option value=Argentina>Argentina</option>
				<option value=Armenia>Armenia</option>
				<option value=Aruba>Aruba</option>
				<option value=Australia>Australia</option>
				<option value=Austria>Austria</option>
				<option value=Azerbaijan Republic>Azerbaijan Republic</option>
				<option value=Bahamas>Bahamas</option>
				<option value=Bahrain>Bahrain</option>
				<option value=Barbados>Barbados</option>
				<option value=Belgium>Belgium</option>
				<option value=Belize>Belize</option>
				<option value=Benin>Benin</option>
				<option value=Bermuda>Bermuda</option>
				<option value=Bhutan>Bhutan</option>
				<option value=Bolivia>Bolivia</option>
				<option value=Bosnia and Herzegovina>Bosnia and Herzegovina</option>
				<option value=Botswana>Botswana</option>
				<option value=Brazil>Brazil</option>
				<option value=British Virgin Islands>British Virgin Islands</option>
				<option value=Brunei>Brunei</option>
				<option value=Bulgaria>Bulgaria</option>
				<option value=Burkina Faso>Burkina Faso</option>
				<option value=Burundi>Burundi</option>
				<option value=Cambodia>Cambodia</option>
				<option value=Canada>Canada</option>
				<option value=Cape Verde>Cape Verde</option>
				<option value=Cayman Islands>Cayman Islands</option>
				<option value=Chad>Chad</option>
				<option value=Chile>Chile</option>
				<option value=China Worldwide>China Worldwide</option>
				<option value=Colombia>Colombia</option>
				<option value=Comoros>Comoros</option>
				<option value=Cook Islands>Cook Islands</option>
				<option value=Costa Rica>Costa Rica</option>
				<option value=Croatia>Croatia</option>
				<option value=Cyprus>Cyprus</option>
				<option value=Czech Republic>Czech Republic</option>
				<option value=Democratic Republic of the Congo>Democratic Republic of the Congo</option>
				<option value=Denmark>Denmark</option>
				<option value=Djibouti>Djibouti</option>
				<option value=Dominica>Dominica</option>
				<option value=Dominican Republic>Dominican Republic</option>
				<option value=Ecuador>Ecuador</option>
				<option value=El Salvador>El Salvador</option>
				<option value=Eritrea>Eritrea</option>
				<option value=Estonia>Estonia</option>
				<option value=Ethiopia>Ethiopia</option>
				<option value=Falkland Islands>Falkland Islands</option>
				<option value=Faroe Islands>Faroe Islands</option>
				<option value=Federated States of Micronesia>Federated States of Micronesia</option>
				<option value=Fiji>Fiji</option>
				<option value=Finland>Finland</option>
				<option value=France>France</option>
				<option value=French Guiana>French Guiana</option>
				<option value=French Polynesia>French Polynesia</option>
				<option value=Gabon Republic>Gabon Republic</option>
				<option value=Gambia>Gambia</option>
				<option value=Germany>Germany</option>
				<option value=Gibraltar>Gibraltar</option>
				<option value=Greece>Greece</option>
				<option value=Greenland>Greenland</option>
				<option value=Grenada>Grenada</option>
				<option value=Guadeloupe>Guadeloupe</option>
				<option value=Guatemala>Guatemala</option>
				<option value=Guinea>Guinea</option>
				<option value=Guinea Bissau>Guinea Bissau</option>
				<option value=Guyana>Guyana</option>
				<option value=Honduras>Honduras</option>
				<option value=Hong Kong>Hong Kong</option>
				<option value=Hungary>Hungary</option>
				<option value=Iceland>Iceland</option>
				<option value=India>India</option>
				<option value=Indonesia>Indonesia</option>
				<option value=Ireland>Ireland</option>
				<option value=Israel>Israel</option>
				<option value=Italy>Italy</option>
				<option value=Jamaica>Jamaica</option>
				<option value=Japan>Japan</option>
				<option value=Jordan>Jordan</option>
				<option value=Kazakhstan>Kazakhstan</option>
				<option value=Kenya>Kenya</option>
				<option value=Kiribati>Kiribati</option>
				<option value=Kuwait>Kuwait</option>
				<option value=Kyrgyzstan>Kyrgyzstan</option>
				<option value=Laos>Laos</option>
				<option value=Latvia>Latvia</option>
				<option value=Lesotho>Lesotho</option>
				<option value=Liechtenstein>Liechtenstein</option>
				<option value=Lithuania>Lithuania</option>
				<option value=Luxembourg>Luxembourg</option>
				<option value=Madagascar>Madagascar</option>
				<option value=Malawi>Malawi</option>
				<option value=Malaysia>Malaysia</option>
				<option value=Maldives>Maldives</option>
				<option value=Mali>Mali</option>
				<option value=Malta>Malta</option>
				<option value=Marshall Islands>Marshall Islands</option>
				<option value=Martinique>Martinique</option>
				<option value=Mauritania>Mauritania</option>
				<option value=Mauritius>Mauritius</option>
				<option value=Mayotte>Mayotte</option>
				<option value=Mexico>Mexico</option>
				<option value=Mongolia>Mongolia</option>
				<option value=Montserrat>Montserrat</option>
				<option value=Morocco>Morocco</option>
				<option value=Mozambique>Mozambique</option>
				<option value=Namibia>Namibia</option>
				<option value=Nauru>Nauru</option>
				<option value=Nepal>Nepal</option>
				<option value=Netherlands>Netherlands</option>
				<option value=Netherlands Antilles>Netherlands Antilles</option>
				<option value=New Caledonia>New Caledonia</option>
				<option value=New Zealand>New Zealand</option>
				<option value=Nicaragua>Nicaragua</option>
				<option value=Nigeria>Nigeria</option>
				<option value=Niue>Niue</option>
				<option value=Norfolk Island>Norfolk Island</option>
				<option value=Norway>Norway</option>
				<option value=Oman>Oman</option>
				<option value=Palau>Palau</option>
				<option value=Panama>Panama</option>
				<option value=Papua New Guinea>Papua New Guinea</option>
				<option value=Peru>Peru</option>
				<option value=Philippines>Philippines</option>
				<option value=Pitcairn Islands>Pitcairn Islands</option>
				<option value=Poland>Poland</option>
				<option value=Portugal>Portugal</option>
				<option value=Qatar>Qatar</option>
				<option value=Republic of the Congo>Republic of the Congo</option>
				<option value=Reunion>Reunion</option>
				<option value=Romania>Romania</option>
				<option value=Russia>Russia</option>
				<option value=Rwanda>Rwanda</option>
				<option value=Saint Vincent and the Grenadines>Saint Vincent and the Grenadines</option>
				<option value=Samoa>Samoa</option>
				<option value=San Marino>San Marino</option>
				<option value=São Tomé and Príncipe>São Tomé and Príncipe</option>
				<option value=Saudi Arabia>Saudi Arabia</option>
				<option value=Senegal>Senegal</option>
				<option value=Seychelles>Seychelles</option>
				<option value=Sierra Leone>Sierra Leone</option>
				<option value=Singapore>Singapore</option>
				<option value=Slovakia>Slovakia</option>
				<option value=Slovenia>Slovenia</option>
				<option value=Solomon Islands>Solomon Islands</option>
				<option value=Somalia>Somalia</option>
				<option value=South Africa>South Africa</option>
				<option value=South Korea>South Korea</option>
				<option value=Spain<>Spain</option>
				<option value=Sri Lanka>Sri Lanka</option>
				<option value=St. Helena>St. Helena</option>
				<option value=St. Kitts and Nevis>St. Kitts and Nevis</option>
				<option value=St. Lucia>St. Lucia</option>
				<option value=St. Pierre and Miquelon>St. Pierre and Miquelon</option>
				<option value=Suriname>Suriname</option>
				<option value=Svalbard and Jan Mayen Islands>Svalbard and Jan Mayen Islands</option>
				<option value=Swaziland>Swaziland</option>
				<option value=Sweden>Sweden</option>
				<option value=Switzerland>Switzerland</option>
				<option value=Taiwan>Taiwan</option>
				<option value=Tajikistan>Tajikistan</option>
				<option value=Tanzania>Tanzania</option>
				<option value=Thailand>Thailand</option>
				<option value=Togo>Togo</option>
				<option value=Tonga>Tonga</option>
				<option value=Trinidad and Tobago>Trinidad and Tobago</option>
				<option value=Tunisia>Tunisia</option>
				<option value=Turkey>Turkey</option>
				<option value=Turkmenistan>Turkmenistan</option>
				<option value=Turks and Caicos Islands>Turks and Caicos Islands</option>
				<option value=Tuvalu>Tuvalu</option>
				<option value=Uganda>Uganda</option>
				<option value=Ukraine>Ukraine</option>
				<option value=United Arab Emirates>United Arab Emirates</option>
				<option value=United Kingdom>United Kingdom</option>
				<option value=United States>United States</option>
				<option value=Uruguay>Uruguay</option>
				<option value=Vanuatu>Vanuatu</option>
				<option value=Vatican City State>Vatican City State</option>
				<option value=Venezuela>Venezuela</option>
				<option value=Vietnam>Vietnam</option>
				<option value=Wallis and Futana Islands>Wallis and Futuna Islands</option>
				<option value=Yemen>Yemen</option>
				<option value=Zambia>Zambia</option>
			</select><br />
			</label>
			<label><b>Visits:</b>
			<input type="text" name="vistis" value="<?= $registroe["visits"] ?>" tabindex="8" /><br />
			</label>
			<label><b>Referals:</b>
			<input type="text" name="referals" value="<?= $registroe["referals"] ?>" tabindex="9" /><br />
			</label>
			<label><b>Referals visits:</b>
			<input type="text" name="referalvisits" value="<?= $registroe["referalvisits"] ?>" tabindex="9" /><br />
			</label>
			<label><b>Account:</b>
			<select name="account"  tabindex="10" >
								<option value="<?= $registroe["account"] ?>"><?= $registroe["account"] ?></option>
								<option value="standard">Standard Member</option>
								<option value="premium">Premium Member</option>
			</select>
			<br />
			</label>
			<label><b>Money:</b>
			<input type="text" name="money" value="<?= $registroe["money"] ?>" tabindex="11" /><br />
			</label>
			<label><b>Status:</b>
			<select name="user_status"  tabindex="12">
								<option value="<?= $registroe["user_status"] ?>"><?= $registroe["user_status"] ?></option>
								<option value="admin">Administrator</option>
								<option value="user">User</option>
			</select>
			<br />
			</label>


			<label><b>Ip:</b>
			<?= $registroe["ip"] ?><br />
			</label>
			<label><b>Join date:</b>
			<?= $registroe["joindate"] ?><br />
			</label>
			<label><b>Last activity:</b>
			<?= $registroe["lastlogdate"] ?><br />
			</label>
			<label><b>Last ip log:</b>
			<?= $registroe["lastiplog"] ?><br />
			</label>

				<div class="f-submit-wrap">
				<input type="submit" value="Submit" class="f-submit" tabindex="13" /><br />
				</div>
		</fieldset>
		</form>
<? } } if ($_GET["option"]=="delete"){ $myDb->connect(); $queryz = "DELETE FROM yob_users WHERE id='$id'"; mysql_query($queryz) or die(mysql_error()); $myDb->close(); echo "<p class='error'>User deleted.</p>"; } } ?>
<table class="table1">
<tr>
<th>Name</th>
<th>Username</th>
<th>Ip</th>
<th>E-mail</th>
<th>Visits</th>
<th>Money</th>
<th>Multi-Account?</th>
<th>Edit</th>
<th>Delete</th>
</tr>
<? $TAMANO_PAGINA = 50; $pagina = limpiar($_GET["page"]); if (!$pagina) { $inicio = 0; $pagina=1; } else { $inicio = ($pagina - 1) * $TAMANO_PAGINA; } $myDb->connect(); $tabla = mysql_query("SELECT * FROM yob_users ORDER BY id ASC limit $inicio,$TAMANO_PAGINA"); $myDb->close(); while ($registro = mysql_fetch_array($tabla)){ echo "
	<tr>
	<td>". $registro["firstname"] ." ". $registro["surname"] ."</td>
	<td>". $registro["username"] ."</td>
	<td>". $registro["ip"] ."</td>
	<td>". $registro["email"] ."</td>
	<td>". $registro["visits"] ."</td>
	<td>". $registro["money"] ."</td>"; $ip = $registro["lastiplog"]; $myDb->connect(); $checkip = mysql_query("SELECT lastiplog FROM yob_users WHERE lastiplog='$ip'"); $ip_exist = mysql_num_rows($checkip); $myDb->close(); if ($ip_exist>1){ ?>
		<td><blink><font color=red>Yes</font></blink></td>
<? }else{?>
		<td><font color=green>No</font></td><? } ?>
	<td>
	<form method="post" action="user_edit.php?id=<?= $registro["id"] ?>&option=edit">
	<input type="submit" value="Edit" class="f-submit">
	</form>
	</td>
	<td>
	<form method="post" action="user_edit.php?id=<?= $registro["id"] ?>&option=delete">
	<input type="submit" value="Delete" class="f-submit">
	</form>
	</td>
	</tr>
<?php
} ?>
</table><br />
<div class="pagination">
<?php
 $myDb->connect(); $checkpemail = mysql_query("SELECT pemail FROM yob_users"); $pemail_exist = mysql_num_rows($checkpemail); $myDb->close(); $pagination = ceil($pemail_exist/$TAMANO_PAGINA); $uno = limpiar($_GET["page"]); if ($pagination==1){ $uno = 1; echo "<p><span><strong>Previous</strong></span>&nbsp;&nbsp;&nbsp;<span><strong>Next</strong></span></p>"; }else{ if (empty($uno)||$uno==1){ $uno = 1; $mos = $uno + 1; echo "<p><span><strong>Previous</strong></span>&nbsp;&nbsp;&nbsp;<a href='user_edit.php?page=$mos'><strong>Next</strong></a></p>"; } elseif($uno==$pagination){ $prev = $pagination-1; echo "<p><a href='user_edit.php?page=$prev'><strong>Previous</strong></a>&nbsp;&nbsp;&nbsp;<span><strong>Next</strong></span></p>"; }else{ $mos = $uno + 1; for ($z=$mos;$z<=$mos;$z++){ $prev = $z-2; echo "<p><a href='user_edit.php?page=$prev'><strong>Previous</strong></a>&nbsp;&nbsp;&nbsp;<a href='user_edit.php?page=$z'><strong>Next</strong></a></p>"; } } } ?>
<h4>Page <?php echo $uno."&nbsp;&nbsp;of&nbsp;&nbsp;".$pagination; ?></h4>
</div>


<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />
<? include('footer.php');?>