<?php 
include 'dbconnect.php';
include 'common.php';
					
$searchBool =  false;
$noResults = false;
$pageTopic = "Search Here!";
				
if($_SERVER['REQUEST_METHOD'] == "GET"){
	if(empty($_GET['q'])){
		//$pageTopic = "Search Here!";
	}else{
		$q = test_input($_GET['q']);
		//$sql = "SELECT q.question, q.topic, c.comment FROM question q, comment c, category cat WHERE q.question_id = c.question_id AND q.category_id = cat.category_id AND c.status=1 AND q.status=1 AND q.question LIKE '%$q%' OR q.topic LIKE '%$q%' OR cat.category LIKE '%$q%' OR c.comment LIKE '%$q%'";
		$sql = "SELECT q.dressID, q.name, q.image, q.path FROM colthsdetails q WHERE q.name LIKE '%$q%' OR q.type LIKE '%$q%'"; 
		$result = mysqli_query($con,$sql);
		if(mysqli_num_rows($result) > 0){
			$pageTopic = "Search results for '".$q."'"; 
			$searchBool = true;
					
			/*while loop*/
							
		}else{
			$pageTopic = "Search results for '".$q."'";
			$searchBool = false;
			$noResults = true;
			//echo "No results for '".$q."'";
		}
	}
}
				?>

<!DOCTYPE HTML>
<html>

<head>
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<link rel="stylesheet" href="css/responsive.css" />

</head>

<body>
	<?php include'header.php'; ?>
	
	<div id="contents">
		<div class="container">
			<div id="search-results" style="min-height:400px;">
				<h2><?php echo $pageTopic; ?></h2>

				<?php
					if($searchBool && !$noResults){
							while($row = mysqli_fetch_assoc($result)){
								
									 $dress_id = $row['dressID'];?>
									
									<a href="<?php echo $row['path'];?>"><img src="<?php echo $row['image'];?>" width="250" height="400"/></a><br>
									<?php echo substr($row['name'],0,200)."<br><br>";
									
									//echo $row['question_id']."<br>";
							}
					}
					if(!$searchBool && $noResults){
						echo "No results for '".$q."'";
					}

				?>
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