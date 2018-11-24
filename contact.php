<?php
include 'dbconnect.php';
include 'common.php';
?>
<html>
<head>
	<meta charset="UTF-8">
	<title>Geeflock</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<link rel="stylesheet" href="css/responsive.css" />
	<link rel="stylesheet" href="css/forms.css"/>
</head>
<body>
<?php include'header.php'; ?>
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
<?php 
$fnameErr = $emailErr = $commentErr = $tnoErr = "";
$fnameBool = $emailBool = $tnoBool = $commentBool = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
								if(empty($_POST["fname"])){
									$fnameErr = "Name is required";
								}
								else{
										$fnameBool = true;
									}
								if(empty($_POST["email"])){
									$emailErr = "email is required";
								}
								else{
										$emailBool = true;
									}
								if(empty($_POST["tno"])){
									$tnoErr = "Telephone number is required";
								}
								else{
										$tnoBool = true;
									}
								if(empty($_POST["comment"])){
									$commentErr = "comment is required";
								}
								else{
										$commentBool = true;
									}
									if($fnameBool && $emailBool && $tnoBool && $commentBool){
								$fname=$_POST["fname"];
								$email=$_POST["email"];
								$tno=$_POST["tno"];
								$comment=$_POST["comment"];
								$sql = "INSERT INTO contactinfo( name, email, telephonenumber, comment)
									
											VALUES('$fname', '$email', '$tno','$comment')";
											
											
											
											$db_result= mysqli_query($con,$sql);
											if($db_result)
	{
		echo "Thank you for your feedback.";
	} 
	else
	{
		echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
	}
}
}
?>


	
	
			<h2>CONTACT US</h2>
			<h3>GEEFLOCK</h3>
			<p>
				Please direct your any concern to krish@geeflock.com 
			</p>
			<p>
			Customer Care No:
			</p>
			<p class="numbers">
				Colombo 03 Store - +94 76 985 5330 <br>

				Colombo 07 - +94 76 985 5331 <br>

				Kandy store - +94 11 7221400<br>

				Online store - +94 77 422 6227<br>
				</p>
			<h4>Corporate Name: Tranzlife Retail Pvt Ltd </h4> 
			<p class="address">
				Address: 117, Dharmapala Mawatha, Colombo 07, Sri Lanka. 
			</p>
			<h3>Contact Information</h3>
			<form id="contact-form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			<div class="form-input">
						<span class="label">Name :</span>
						<span class="input-group">
							<span class="error"><?php echo $fnameErr;?>*</span><br>
							<input class="text-field" type="text" name="fname">
						</span>
					</div>
					
					<div class="form-input">
						<span class="label">Email :</span>
						<span class="input-group">
							<span class="error"><?php echo $emailErr;?>*</span><br>
							<input class="text-field" type="text" name="email">
						</span>
					</div>
					<div class="form-input">
						<span class="label">Telephone Number :</span>
						<span class="input-group">
							<span class="error"><?php echo $tnoErr;?>*</span><br>
							<input class="text-field" type="text" name="tno">
						</span>
					</div>
					
					<div class="form-input">
						<span class="label">Comment :</span>
						<span class="input-group">
							<span class="error"><?php echo $commentErr;?>*</span><br>
							<textarea rows="4" cols="50" name="comment"></textarea>
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