<? 
session_start();
include('header.php');
if(isset($_COOKIE["usNick"]) && isset($_COOKIE["usPass"])){
	if (isset($_POST["password"])){
		if( strtolower($_POST['code'])!= strtolower($_SESSION['texto'])){ 
			include ('header.php');
			echo"<div id='content'>";
			$display_error = "* Security Code Error"; // error language
			include ('error.php');
			exit();
		}

		$firstname = $_POST["firstname"];
		$surname = $_POST["surname"];
		$password = $_POST["password"];
		$cpassword = $_POST["cpassword"];
		$email = $_POST["email"];
		$pemail = $_POST["pemail"];
		$address1 = $_POST["address1"];
		$address2 = $_POST["address2"];
		$city = $_POST["city"];
		$state = $_POST["state"];
		$zip = $_POST["zip"];
		$country = $_POST["country"];
		$theme = $_POST["theme"];
		if($firstname==NULL|$surname==NULL|$password==NULL|$cpassword==NULL|$email==NULL|$pemail==NULL|$country==NULL){
			$display_error = "* All Fields Required"; // error language
			include ('error.php');
			exit();
		}else{
			$password = uc($password);
			$cpassword = uc($cpassword);
			$email = limpiar($email);
			$pemail = limpiar($pemail);
			$address1 = limpiar($address1);
			$address2 = limpiar($address2);
			$city = limpiar($city);
			$state = limpiar($state);
			$zip = limpiar($zip);
			$country = limpiar($country);

			$password=limitatexto($password,15);
			$cpassword=limitatexto($cpassword,15);
			$email=limitatexto($email,100);
			$pemail=limitatexto($pemail,100);
			$country=limitatexto($country,150);

			minimopass($password);

			if($password!=$cpassword) {
					include ('header.php');
					echo"<div id='content'>";
					$display_error = "* Passwords doesn't match"; // error language
					include ('error.php');
					exit();
			}else{
				ValidaMail($email);
				ValidaMail($pemail);
				$laip = getRealIP();
				$trok=uc($_COOKIE["usNick"]);
				$pass = sha1($password);

			$myDb->connect();
				$queryb = "UPDATE yob_users SET firstname='$firstname', surname='$surname', password='$pass', ip='$laip', email='$email', pemail='$pemail', address1='$address1', address2='$address2', city='$city', state='$state', zip='$zip', country='$country', paymentmethod='Alertpay' WHERE username='$trok'";
				mysql_query($queryb) or die(mysql_error());
			$myDb->close();
				echo"<div id='content'>";
				$display_error = "* Profile updated, please login again.<br>If you are not redirected in 5 seconds click <a href=\"logout.php\">here</a>"; // error language
				include ('error.php'); ?>
				<META HTTP-EQUIV="REFRESH" CONTENT="2;URL=logoutp.php">
<?				exit();
			}
		}
	}else{
		$uzer=$_COOKIE["usNick"];
		$pazz=$_COOKIE["usPass"];
			$myDb->connect();
				$sql = "SELECT * FROM yob_users WHERE username='$uzer'";
				$result = mysql_query($sql);        
				$row = mysql_fetch_array($result);
			$myDb->close();
		if ($pazz != $row["password"]){
			exit();
		}
?>
		<div id="content">
			<p class="error"><?php echo $display_error;?></p>
		  
		  <form action="profile.php" method="post" class="f-wrap-1">
		  <div class="req"><b>*</b> All Fields Are Required</div>
		  <fieldset>

		  <h3>My Profile</h3>

			<label for="firstname"><b>First Name:</b>
			<input id="firstname" name="firstname" type="text" class="f-name" value="<? echo $row["firstname"]; ?>" tabindex="1" /><br />
			</label>
			<label for="surname"><b>Last Name:</b>
			<input id="surname" name="surname" type="text" class="f-name" value="<? echo $row["surname"]; ?>" tabindex="2" /><br />
			</label>
			<label for="password"><b>Password:</b>
			<input id="password" name="password" type="password" class="f-name" tabindex="3" /><br />
			</label>
			<label for="cpassword"><b>Password:</b>
			<input id="cpassword" name="cpassword" type="password" class="f-name" tabindex="4" /><br />
			</label>
			<label for="email"><b>Email Address:</b>
			<input id="email" name="email" type="text" class="f-name" value="<? echo $row["email"]; ?>" tabindex="5" /><br />
			</label>
			<label for="pemail"><b>Payment E-mail:</b>
			<input id="pemail" name="pemail" type="text" class="f-name" value="<? echo $row["pemail"]; ?>" tabindex="6" /><br />
			</label>
			<label for="address1"><b>Address Line 1:</b>
			<input id="address1" name="address1" type="text" class="f-name" value="<? echo $row["address1"]; ?>" tabindex="7" /><br />
			</label>
			<label for="address2"><b>Address Line 2:</b>
			<input id="address2" name="address2" type="text" class="f-name" value="<? echo $row["address2"]; ?>" tabindex="8" /><br />
			</label>
			<label for="city"><b>City:</b>
			<input id="city" name="city" type="text" class="f-name" value="<? echo $row["city"]; ?>" tabindex="9" /><br />
			</label>
			<label for="state"><b>State/County:</b>
			<input id="state" name="state" type="text" class="f-name" value="<? echo $row["state"]; ?>" tabindex="10" /><br />
			</label>
			<label for="zip"><b>ZIP Code:</b>
			<input id="zip" name="zip" type="text" class="f-name" value="<? echo $row["zip"]; ?>" tabindex="11" /><br />
			</label>

			<label for="country"><b>Country:</b>
			<td><select name="country"  tabindex="12" />
				<option value="<? echo $row["country"]; ?>"><? echo $row["country"]; ?></option>
				<option value=Albania>Albania</option>
				<option value=Algeria>Algeria</option>
				<option value=Andorra>Andorra</option>
				<option value=Angola>Angola</option>
				<option value=Anguilla>Anguilla</option>
				<option value=Argentina>Argentina</option>
				<option value=Armenia>Armenia</option>
				<option value=Aruba>Aruba</option>
				<option value=Australia>Australia</option>
				<option value=Austria>Austria</option>
				<option value=Bahamas>Bahamas</option>
				<option value=Bahrain>Bahrain</option>
				<option value=Barbados>Barbados</option>
				<option value=Belgium>Belgium</option>
				<option value=Belize>Belize</option>
				<option value=Benin>Benin</option>
				<option value=Bermuda>Bermuda</option>
				<option value=Bhutan>Bhutan</option>
				<option value=Bolivia>Bolivia</option>
				<option value=Botswana>Botswana</option>
				<option value=Brazil>Brazil</option>
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
				<option value=Reunion>Reunion</option>
				<option value=Romania>Romania</option>
				<option value=Russia>Russia</option>
				<option value=Rwanda>Rwanda</option>
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
				<option value=Suriname>Suriname</option>
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
				<option value=Tuvalu>Tuvalu</option>
				<option value=Uganda>Uganda</option>
				<option value=Ukraine>Ukraine</option>
				<option value=United Kingdom>United Kingdom</option>
				<option value=United States>United States</option>
				<option value=Uruguay>Uruguay</option>
				<option value=Vanuatu>Vanuatu</option>
				<option value=Vatican City State>Vatican City State</option>
				<option value=Venezuela>Venezuela</option>
				<option value=Vietnam>Vietnam</option>
				<option value=Yemen>Yemen</option>
				<option value=Zambia>Zambia</option>
				</select><br />
			</label>
			<label for="code"><b>Security Code:</b>
			<input id="code" name="code" type="text" class="f-name" tabindex="13" /><br />
			</label>
			<label for="code2"><b>&nbsp;</b>
			<img src="image.php?<?php echo $res; ?>" /><br />
			</label>
			<div class="f-submit-wrap">
			<input type="submit" value="Submit" class="f-submit" tabindex="14" /><br />
			</div>
			</fieldset>
			</form>


<?php }
	include ('footer.php');
}else{
	$display_error = "* You must login to access this page."; // error language
	include ('error.php');
	exit();	
}?>