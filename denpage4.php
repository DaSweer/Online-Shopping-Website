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
<div id="shop">
	<div>
	<table>
	<tr>
	<td>
		<img src="images/denim4.jpg" alt="Img" width="200" height="500"/></td>
		<td><h2>Sleek WW Pant </h2>
		<p>Rs.2100.00<br>UK Size<br>
		<select name="UKSize">
<option value=6>6</option>
<option value=8 >8</option>
<option value=10 >10</option>
<option value=12>12</option>
</select>
<div class="form-input">
						<!--<span class="label"></span>
						<span class="input-group">-->
						<input type="hidden" name="type" value="GD004" />
							<input class="button-submit"  type="submit" value="Add to cart">
						<!--</span>-->
					</div></p>
		</td>
		
		</tr>
		</table>
		</form>
		</div>
		</div>
</div>
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