
	
	<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "as2013244";


$shipping_cost      = 1.50; //shipping cost
$taxes              = array( //List your Taxes percent here.
                            'VAT' => 12, 
                            'Service Tax' => 5
                            ); 
							
// Create connection
$con = mysqli_connect($servername, $username, $password, $dbname);


// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
?>