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
<?php
if(!isLogged()){
	echo  "You have to log your account";
}
else{
	function search_cloths(){
	
$st=$_POST["type"];
	$sql_quary="SELECT name,price from colthsdetails where dressID='$st'";
	$db_result = mysqli_query($GLOBALS['con'],$sql_quary);
	return $db_result;
	}
?>

<div id="contents">
<table>
	<tr>
		<td>Name</td>
		<td>Price(Rs./=)</td>
		</tr>
		<?php
$result = search_cloths();

while($row=mysqli_fetch_assoc($result)){
?>
	<tr>
		<td><?php echo $row['name'];?></td>
		<td><?php echo $row['price'];?></td>
		</tr>
<?php }?>
<tr>
		<td>Total</td>
		<td>Price</td>
		</tr>
</table>
<?php
}

?>
<div id="contents">
<?php
 $cnumberErr=$passwordErr="";
 $cnumberBool =$passwordBool= false;
 if($_SERVER["REQUEST_METHOD"] == "POST"){
	 if(empty($_POST["cnumber"])){
									$cnumberErr = "This is required";
								}
								else{
										$cnumberBool = true;
									}
									if(empty($_POST["password"])){
									$passwordErr = "This is required";
								}
								else{
										$passwordBool = true;
									}
									if($cnumberBool && $passwordBool){
										$password = md5($password.$privatekey);
								$cnumber=$_POST["cnumber"];
								$password=$_POST["password"];
								
								$sql = "INSERT INTO creditcarddetails( creditcardnumber, password)
									
											VALUES('$cnumber', '$password')";
											
											
											
											$db_result= mysqli_query($con,$sql);
											if($db_result)
	{
		echo "Sucsessfull transaction.";
	} 
	else
	{
		echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
	}
}
 }
 ?>
 <form id="credit-form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
 <div class="form-input">
						<span class="label">Credit card number :</span>
						<span class="input-group">
							<span class="error"><?php echo $cnumberErr;?>*</span><br>
							<input class="text-field" type="text" name="cnumber">
						</span>
					</div>
					<div class="form-input">
						<span class="label">password :</span>
						<span class="input-group">
							<span class="error"><?php echo $passwordErr;?>*</span><br>
							<input class="text-field" type="text" name="password">
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
 <?php
 mysqli_close($con);
 ?>
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
