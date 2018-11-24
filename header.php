<div id="header">
		<div class="container">
		<div id="search">
		
			<form action="search.php" method="GET">
			
				<!--<a href="logIn.php"><font color="#D8DC0B">LogIn</font></a>-->
				<!--<span class="menu-right">-->
					<?php if(!isLogged()){?>
						<a href="logIn.php"><font color="#D8DC0B">Login</font></a>
						<!--<a href="signup.php"><font color="#D8DC0B">Sign Up</font></a>-->
					<?php }else{?>
						<a href="logout.php"><font color="#D8DC0B">Logout</font></a>
					<?php }?>
					
				<input type="text" name="q" placeholder="Search..."/>
				<button type="submit"><img alt="Search" src="images/search-icon.png" height="20px"></button>
				</form>
				</div>
				
				<div id="logo">
				<img src="images/0a0a14ee-53b3-450b-ba7b-6f675140dd9e.png" width="10px" height="200px" alt="LOGO">
			</div>
		<div id="main-nav">
			<ul id="navigation">
					<li><a href="home.php">Home</a></li>
					<li class="dropdown"><a href="shop.php" class="dropbtn">Dress Shop</a>
					<div class="dropdown-content">
					<a href="denims.php">Denims</a>
					<a href="frocks.php">Frocks</a>
					<a href="saree.php">Saree</a>
					<a href="tshirt.php">Tshirts</a>
					<a href="skirt.php">Skirt</a>
					</div>
					
					</li>
					<li><a href="about.php">My Cart</a></li>
					<?php if(!isLogged()){?>
						<li><a href="signup.php">Sign Up</a></li>
					<?php } ?>
					<li><a href="contact.php">Contact Us</a></li>
					
					
					
					</ul>
					</div>
			</div>
			</div>