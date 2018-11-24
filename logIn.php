<?php
	include 'dbconnect.php';
	include 'common.php';
	if(isset($_GET['next'])){
	$next = $_GET['next'];
}else{
	$next = "shop.php";
}
	?>
<html>
<head>
	<meta charset="UTF-8">
	<title>Geeflock</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<link rel="stylesheet" href="css/forms.css"/>	
	<link rel="stylesheet" href="css/responsive.css" />
</head>
<body>
<?php include'header.php'; ?>
<div id="logo">
	
	
	
	
	
	<!--<div id="main-nav">
		<div class="container">
			<div id="left-column">-->
			<!--<h2><?php echo $pageTopic; ?></h2>-->
			<!--</div>
			</div>
			</div>-->

</div>

<div id="contents">
<div id="contact">
<?php
				
				
				if(isLogged()){
					header("Location: $next");
				}

				$loginErr ="";
				if($_SERVER["REQUEST_METHOD"] == "POST"){
					if(empty($_POST["username"]) || empty($_POST["password"])){
							$loginErr = "Username & Password cannot be empty";
					}else{
						$username = $_POST["username"];
						$password = "";
						$sql = "SELECT username,password FROM signup WHERE username LIKE '$username' AND status=1";
						$result = mysqli_query($con, $sql);

						if (mysqli_num_rows($result) == 1) {
							$row = mysqli_fetch_assoc($result);
							$username = $row["username"];
							$password = $row["password"];	
						}
						//mysqli_close($conn);
						
						if($password == md5($_POST["password"].$privatekey)){
							login($username);
							header("Location: $next");
						}else{
							$loginErr = "Incorrect username or password";
						}
					}

				}



				function login($username){
					//$username gets from parameter
					$privatekey = $GLOBALS["privatekey"];
					$session = md5($username.$privatekey);
					
					if(session_id() == '') {
						session_start();
					}
					//$_SESSION['user'] = $username;
					$_SESSION['session'] = $session;
					
					
					setcookie("signup", $username, time() + 21600, "/");  // 21600 = 6 Hours
					//setcookie("session", $session, time() + 21600, "/");
					
					$con = $GLOBALS['con'];
					$sql = "UPDATE signup SET last_login=NOW() WHERE username LIKE '$username'";
					mysqli_query($con, $sql);
				}	
				?>		
	<h2>LOGIN OR CREATE AN ACCOUNT</h2></div>
	<center>
		<table>
			<tr>
				<td>
					<h3>New Customers</h3>
				</td>
				<td>
					<h3>Registered Customers</h3>
				</td>
			</tr>
			<tr>
				<td>
					<p>By creating an account with our store, you will be able to move through<br> the checkout process faster, 
					store multiple shipping addresses, <br>view and track your orders in your account and more.
					</p>
					<div class="form-input">
						<span class="label"></span>
						<span class="input-group">
							<a href="signup.php"><input class="button-submit" type="button" value="Create an account"></a>
						</span>
					</div>
					
				</td>
				<td>
					<p>If you have an account with us, please log in.</p>
					<form name="login" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])."?next=".$next;?>">
					<div class="form-input">
						<span class="label">Username :</span>
						<span class="input-group">
							<input  class="text-field" type="text" name="username">
						</span>
					</div>
					<div class="form-input">
						<span class="label">Password :</span>
						<span class="input-group">
							<input  class="text-field" type="password" name="password">
						</span>
					</div>
					
					<div class="form-input">
						<span class="label"></span>
						<span class="input-group">
							<input class="button-submit" type="submit" value="Login">
						</span>
					</div>
					</form>
				</td>
			</tr>
		</table>
</center>
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