<?php	session_start();
	if(isset($_COOKIE["usNick"]) && isset($_COOKIE["usPass"])){ ?>
	<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=myaccount.php">
<?php 
	exit();} 

	if ($_POST['username']){
		$username = $_POST['username'];
		if( strtolower($_POST['code'])!= strtolower($_SESSION['texto'])){ 
			$display_error = "* Security Code Error"; // error language
			include ('error.php');
			exit();
		}else{
			include('includes/config.inc.php');

			$firstname = $_POST["firstname"];
			$surname = $_POST["surname"];
			$username = $_POST["username"];
			$password = $_POST["password"];
			$cpassword = $_POST["cpassword"];
			$email = $_POST["email"];
			$cemail = $_POST["cemail"];
			$pemail = $_POST["pemail"];
			$address1 = $_POST["address1"];
			$address2 = $_POST["address2"];
			$city = $_POST["city"];
			$state = $_POST["state"];
			$zip = $_POST["zip"];
			$country = $_POST["country"];

			if ($firstname==NULL|$surname==NULL|$username==NULL|$password==NULL|$cpassword==NULL|$email==NULL|$cemail==NULL|$pemail==NULL|$country==NULL){
				$display_error = "* All fields are required"; // error language
				include ('error.php');
				exit();
			}else{
				$firstname = uc($firstname);
				$surname = uc($surname);
				$username = uc($username);
				$password = uc($password);
				$cpassword = uc($cpassword);
				$email = limpiar($email);
				$cemail = limpiar($cemail);
				$pemail = limpiar($pemail);
				$address1 = limpiar($address1);
				$address2 = limpiar($address2);
				$city = limpiar($city);
				$state = limpiar($state);
				$zip = limpiar($zip);
				$country = limpiar($country);

				$username=limitatexto($username,15);
				$password=limitatexto($password,15);
				$cpassword=limitatexto($cpassword,15);
				$email=limitatexto($email,100);
				$cemail=limitatexto($cemail,100);
				$pemail=limitatexto($pemail,100);
				$country=limitatexto($country,150);

				minimo($username);
				minimopass($password);

				if ($password!=$cpassword) {
					$display_error = "* Passwords Do Not Match"; // error language
					include ('error.php');
					exit();
				}else{
					if ($email!=$cemail) {
						$display_error = "* Emails Do not Match"; // error language
						include ('error.php');
						exit();
					}else{
						ValidaMail($email);
						ValidaMail($pemail);

						$laip = getRealIP();
						if($laip!="127.0.0.1"){
							$myDb->connect();
								$checkip = mysql_query("SELECT ip FROM yob_users WHERE ip='$laip'");
								$ip_exist = mysql_num_rows($checkip);
							$myDb->close();
						}
						if ($ip_exist>0) {
							include ('header.php');
							$display_error = "* You have already created an account"; // error language
							include ('error.php');
							exit();
						}else{
							$myDb->connect();
								$checkuser = mysql_query("SELECT username FROM yob_users WHERE username='$username'");
								$username_exist = mysql_num_rows($checkuser);
								$checkemail = mysql_query("SELECT email FROM yob_users WHERE email='$email'");
								$email_exist = mysql_num_rows($checkemail);
								$checkpemail = mysql_query("SELECT pemail FROM yob_users WHERE pemail='$pemail'");
								$pemail_exist = mysql_num_rows($checkpemail);
							$myDb->close();
							if ($email_exist>0|$username_exist>0) {
								$display_error = "* Username or Email Already in Use"; // error language
								include ('error.php');
								exit();
							}else{
								if ($pemail_exist>0) {
									$display_error = "* Your Payment Email is Already in Use"; // error language
									include ('error.php');
									exit();
								}else{
									if ($_POST["referer"] != "") {
										$referer = limpiar($_POST["referer"]);
										$referer=limitatexto($referer,15);
										$myDb->connect();	
											$checkref = mysql_query("SELECT username FROM yob_users WHERE username='$referer'");
											$referer_exist = mysql_num_rows($checkref);
										$myDb->close();
										if ($referer_exist<1) {
											$display_error = "* The referrer you entered doesn't exist"; // error language
											include ('error.php');
											exit();
										}else{
											$myDb->connect();
												$sqlz = "SELECT * FROM yob_users WHERE username='$referer'";
												$resultz = mysql_query($sqlz);        
												$myrowz = mysql_fetch_array($resultz);
											$myDb->close();
											$numero=$myrowz["referals"];
											$myDb->connect();
												$sqlex = "UPDATE yob_users SET referals='$numero' +1 WHERE username='$referer'";
												$resultex = mysql_query($sqlex);
											$myDb->close();
										}
									}
									$joindate = date("F j, Y");
									$pass = sha1($password);
									$myDb->connect();
										$query = "INSERT INTO yob_users (firstname, surname, username, password, ip, email, pemail, referer, address1, address2, city, state, zip, country, joindate, paymentmethod) VALUES('$firstname','$surname','$username','$pass','$laip','$email','$pemail','$referer','$address1','$address2','$city','$state','$zip','$country','$joindate', 'Alertpay')";
										mysql_query($query) or die(mysql_error());
									$myDb->close();
									$display_error = "* You have been registered correctly <b>$username</b>. Now you can <a href=\"login.php\">login</a>."; // error language
									include ('error.php');
									exit();
									}
								}
							}
						}
					}
				}
			}
		}else{

include ('header.php'); ?>
		<div id="content">
  <form action="signup.php" method="post" class="f-wrap-1">
  		  <div class="req">All Fields Required</div>
		  <fieldset>
  
  <h3>Member Signup</h3>
<label for=""><b>First Name:</b>
<input type="text" name="firstname" class="f-name" autocomplete="off" tabindex="1" /><br />
			</label>
  
	<label for=""><b>Last Name:</b>
	<input type="text" name="surname" class="f-name" autocomplete="off" tabindex="2" /><br />
			</label>
  
	<label for=""><b>Username:</b>
	<input type="text" name="username" class="f-name" autocomplete="off" tabindex="3" /><br />
			</label>
  
  
	<label for=""><b>Password:</b>
	<input type="password" name="password" class="f-name" autocomplete="off" tabindex="4" /><br />
			</label>
  
	<label for=""><b>Confirm Pass:</b>
	<input type="password" name="cpassword" class="f-name" autocomplete="off" tabindex="5" /><br />
			</label>
  
  
	<label for=""><b>Email:</b>
	<input type="text" name="email" class="f-name" autocomplete="off" tabindex="6" /><br />
			</label>
  
  
	<label for=""><b>Confirm Email:</b>
	<input type="text" name="cemail" class="f-name" autocomplete="off" tabindex="7" /><br />
			</label>
  
  
	<label for=""><b>Payment E-mail:</b>
	<input type="text" name="pemail" class="f-name" autocomplete="off" tabindex="8" /><br />
			</label>
  
  
	<label for=""><b>Address Line 1:</b>
	<input type="text" name="address1" class="f-name" autocomplete="off" tabindex="9" /><br />
			</label>
  
  
	<label for=""><b>Address Line 2:</b>
	<input type="text" name="address2" class="f-name" autocomplete="off" tabindex="10" /><br />
			</label>
  
  
	<label for=""><b>City:</b>
	<input type="text" name="city" class="f-name" autocomplete="off" tabindex="11" /><br />
			</label>
  
  
	<label for=""><b>State/County:</b>
	<input type="text" name="state" class="f-name" autocomplete="off" tabindex="12" /><br />
			</label>
  
  
	<label for=""><b>ZIP/Postal Code:</b>
	<input type="text" name="zip" class="f-name" autocomplete="off" tabindex="13" /><br />
			</label>
  
  
	<label for=""><b>Country:</b>
	<select name="country" class="f-name" autocomplete="off" tabindex="14" >
				<option value="">Select One</option>
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
	<label for=""><b>Referrer:</b>
	<input type="text" name="referer" value="<? echo $_COOKIE["usReferrer"]?>" class="f-name" autocomplete="off" tabindex="16" /><br />
			</label>

	<label for=""><b>Security code:</b>
	<input type="text" name="code" class="f-name" autocomplete="off" tabindex="17" /><br />
			</label>
      
  
			<label for="code2"><b>&nbsp;</b>
	<img src="image.php?<?php echo $res; ?>" /><br />
			</label>
  
 			<div class="f-submit-wrap">
			<input type="submit" value="Submit" class="f-submit" tabindex="18" /><br />
			</div>
			</fieldset>
			</form>



<?php }
include ('footer.php'); ?>