<?php
	include 'dbconnect.php';
	include 'common.php';
	?>
<html>
<head>


	<link rel="stylesheet" href="css/style.css" type="text/css">
	<link rel="stylesheet" href="css/forms.css"/>
	<!--<link rel="stylesheet" href="css/layout.css" />	-->
	<link rel="stylesheet" href="css/responsive.css" />
</head>
<body>

<?php include'header.php';?>
<div id="logo">
	
	
	<div id="content">
	
	
	<div id="main-nav">
		<div class="container">
			<div id="left-column">
			
			<!--<h2><?php echo $pageTopic; ?></h2>-->
			</div>
			</div>
			</div>
</div>
</div>
<div id="contents">
<div id="contact">
		<!--<div id="blog">
			<div id="main">
			
			/*
				if(isset($_POST["firstname"])&& isset($_POST["lastname"])&& isset($_POST["address"])&& isset($_POST["username"])&& isset($_POST["password"])&& isset($_POST["confirm_password"]))
				{
					$fname = $_POST["firstname"];
					$lname= $_POST["lastname"];
					$addres= $_POST["address"];
					$uname = $_POST["username"];
					$pwordd = $_POST["password"];
					$conpword = $_POST["confirm_password"];
				}
				else
				{
					$error = "One or More Filled are not filled";
					echo $error;
				}
				if(isset($_POST["insert"]))
				{
					$insertString = "INSERT INTO signup VALUES('$fname','$lname','$addres','$uname','$pwordd','$conpword')";
					
					if(!mysqli_query($insertString)){
						die('Error : ' .mysql_error());
					}
					else{
						echo '<br/>';
						echo ' record added';
					}
				}
				?>	*/
					
			</div>
			
		</div>
	</div>-->
	
	<!-- ----------------------------------------------------------------- -->
	
	<?php
							
							
							/*if(isLogged()){
								header("Location: about.php");
							}
*/
							$fnameErr = $lnameErr = $genderErr = $emailErr = $usernameErr = $passwordErr = $cpasswordErr = "";
							$fname = $lname = $gender = $email = $username = $password = $cpassword = "";
							$fnameBool = $lnameBool = $genderBool = $emailBool = $usernameBool = $passwordBool = $cpasswordBool = false;

							if($_SERVER["REQUEST_METHOD"] == "POST"){
								
								
								if(empty($_POST["fname"])){
									$fnameErr = "Name is required";
								}else{
									$fname = test_input($_POST["fname"]);
									if (!preg_match("/^[a-zA-Z ]*$/",$fname)){
										$fnameErr = "Only letters and white space allowed"; 
									}else{
										$fnameBool = true;
									}
								}
								
									
								if(empty($_POST["lname"])){
									$lnameErr = "Name is required";
								}else{
									$lname = test_input($_POST["lname"]);
									if (!preg_match("/^[a-zA-Z ]*$/",$lname)){ 
										$lnameErr = "Only letters and white space allowed"; 
									}else{
										$lnameBool = true;
									}
								}
									
								if (empty($_POST["gender"])) {
									$genderErr = "Gender is required";
								}else{
									$gender = test_input($_POST["gender"]);
									$genderBool = true;
								}
							   
								if(empty($_POST["email"])) {
									$emailErr = "Email is required";
								}else{
									$email= test_input($_POST["email"]);
									if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
										$emailErr = "Invalid email format"; 
									}else{
										$sql = "SELECT email FROM signup WHERE email='$email'";
										$result = mysqli_query($con, $sql);
										if (mysqli_num_rows($result) == 1) {
											$emailErr = "Cannot use same email for two accounts";
											$emailBool = false;
										}else{
											$emailBool = true;
										}
									}
								}

								if(empty($_POST["username"])) {
									$usernameErr = "Username is required";
								}else{
									$username = test_input($_POST["username"]);
									if (!preg_match("/^[a-zA-Z ]*$/",$username)) {
										$usernameErr = "Only letters and white space allowed"; 	
									}else{
										$sql = "SELECT username FROM signup WHERE username='$username'";
										$result = mysqli_query($con, $sql);
										if (mysqli_num_rows($result) == 1) {
											$usernameErr = "Username $username is already taken";
											$usernameBool = false;
										}else{
											$usernameBool = true;
										}
									}
								}
								 
								if(empty($_POST["password"])){
									$passwordErr = "Password is required";
								}else{
									$password = test_input($_POST["password"]);
									if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/', $password)) {
										//$passwordErr = 'The password does not meet the requirements!';
										$passwordErr = "Password must be 8 to 12 characters long & at least one number included.";
									}else{
										$passwordBool = true;
									}
								}

								if(empty($_POST["cpassword"])){
									$cpasswordErr = "Confirm password is required";
								}else{
									$cpassword = test_input($_POST["cpassword"]);
									if($cpassword != $password) {
										$cpasswordErr = 'Password does not match.';
									}else{
										$cpasswordBool = true;
									}
								}
								
								/*if (empty($_POST["profile-pic"])) {
									$imageErr = "Profile Image is required";
								}else{
									$image = test_input($_POST["profile-pic"]);
									$imageBool = true;
								}
								*/
								if($fnameBool && $lnameBool && $genderBool && $emailBool && $usernameBool && $passwordBool && $cpasswordBool ){
									
									$password = md5($password.$privatekey);
									$sql = "INSERT INTO signup( username, firstname, lastname, gender, email, password, confirm_password, status)
									
											VALUES('$username', '$fname', '$lname', '$gender', '$email', '$password', '$cpassword' , 1)";
											
											
											
											$db_result= mysqli_query($con,$sql);
											if($db_result)
	{
		echo "Records added successfully.";
	} 
	else
	{
		echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
	}
									
									/*if(mysqli_query($conn,$sql)){
										header("Location: logIn.php");
									}*/
								
										
									
									/*
									echo "fname: ".$fname."<br>";
									echo "lname: ".$lname."<br>";
									echo "gender: ".$gender."<br>";
									echo "email: ".$email."<br>";
									echo "username: ".$username."<br>";
									echo "password: ".$password."<br>";
									echo "cpassword: ".$cpassword."<br>";
									echo "image: ".$image."<br>";
									*/

									
									
									$fname = $lname = $gender = $email = $username = $password = $cpassword = "";
								}
								
								
								
							}
							
							 ?>
							 
							 <!---------------- -->
	<h3>Create an Account</h3>
	<p></p>
	<div id="shop">
<form id="signup-form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	
					<div class="form-input">
						<span class="label">First Name :</span>
						<span class="input-group">
							<span class="error"><?php echo $fnameErr;?>*</span><br>
							<input class="text-field" type="text" name="fname">
						</span>
					</div>
					
					<div class="form-input">
						<span class="label">Last Name :</span>
						<span class="input-group">
							<span class="error"><?php echo $lnameErr;?>*</span><br>
							<input class="text-field" type="text" name="lname">
						</span>
					</div>
				   
					<div class="form-input">
						<span class="label">Gender :</span>
						<span class="input-group">
							<span class="error"><?php echo $genderErr;?>*</span><br>
							<div class="radio"><input type="radio" name="gender" value="Male">Male</div>
							<div class="radio"><input type="radio" name="gender" value="Female">Female</div>
						</span>
					</div>
				   
					<div class="form-input">
						<span class="label">E-mail :</span>
						<span class="input-group">
							<span class="error">*<?php echo $emailErr;?></span><br>
							<input class="text-field" type="text" name="email">
						</span>
					</div>
					
					<div class="form-input">
						<span class="label">Username :</span>
						<span class="input-group">
							<span class="error"><?php echo $usernameErr;?>*</span><br>
							<input class="text-field" type="text" name="username">
						</span>
					</div>
					
					<div class="form-input">
						<span class="label">Password :</span>
						<span class="input-group">
							<span class="error"><?php echo $passwordErr; ?>*</span><br>
							<input class="text-field" type="password" name="password">
						</span>
					</div>
					
					<div class="form-input">
						<span class="label">Confirm Password :</span>
						<span class="input-group">
						<span class="error"><?php echo $cpasswordErr; ?>*</span><br>
							<input class="text-field" type="password" name="cpassword">
						</span>
					</div>
					<div class="form-input">
						<span class="label"></span>
						<span class="input-group">
							<input class="button-submit"  type="submit" value="Submit">
						</span>
					</div>
					</form>
					</div>
					</div>
					</div>
					<?php mysqli_close($con); ?>	
	<div id="footer1">
		<div id="connect">
			<a href="" target="_blank" class="facebook"></a><a href="" target="_blank" class="email"></a><a href="" target="_blank" class="twitter"></a><a href="" target="_blank" class="googleplus"></a>
		</div>
		<p>
			© 2023 Geeflock. All Rights Reserved.
		</p>
	</div>
</body>
</html>