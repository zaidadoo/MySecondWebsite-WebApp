<?php 

include "back/db.php";

session_start();

if(!isset($_SESSION['user'])){
	
	header("Location: index.php");
	exit();
	
}

$i = 0;
$scores = "";

$sql = "SELECT * FROM user WHERE admin=0 ORDER BY score DESC LIMIT 4";
$ex = mysqli_query($conn, $sql);
$rows = mysqli_num_rows($ex);

if($rows > 0){
	while($row = mysqli_fetch_array($ex)){
		$i = $i + 1;
		if($i == 1){
			$scores .= '<div style="background: green; float: left;"><h4 style="color:white"><a href="profile.php?id='.$row['id'].'" style="color: white">'.$row['name'].'</a></h4><p style="color:white">Score: '.$row['score'].'</p><p style="color:white">1st Place</p><div style="background-image:url(&apos;/profile/'.$row['id'].'.jpg&apos;); border: 2px solid black; background-size: cover;" class="profile"></div></div>&nbsp;';
		}elseif($i == 2){
			$scores .= '<div style="background: lightgreen; float: right;"><h4 style="color:white"><a href="profile.php?id='.$row['id'].'" style="color: white">'.$row['name'].'</a></h4><p style="color:white">Score: '.$row['score'].'</p><p style="color:white">2nd Place</p><div style="background-image:url(&apos;/profile/'.$row['id'].'.jpg&apos;); border: 2px solid black; background-size: cover;" class="profile"></div></div>
		<br>';
		}elseif($i == 3){
			$scores .= '<div style="background: lightgreen; float: left;"><h4 style="color:white"><a href="profile.php?id='.$row['id'].'" style="color: white">'.$row['name'].'</a></h4><p style="color:white">Score: '.$row['score'].'</p><p style="color:white">3rd Place</p><div style="background-image:url(&apos;/profile/'.$row['id'].'.jpg&apos;); border: 2px solid black; background-size: cover;" class="profile"></div></div>&nbsp;';
		}else{
			$scores .= '<div style="background: green; float: right;"><h4 style="color:white"><a href="profile.php?id='.$row['id'].'" style="color: white">'.$row['name'].'</a></h4><p style="color:white">Score: '.$row['score'].'</p><p style="color:white">4th Place</p><div style="background-image:url(&apos;/profile/'.$row['id'].'.jpg&apos;); border: 2px solid black; background-size: cover;" class="profile"></div></div>';
		}
	}
} else {
	
	$tables = "No students found, <a href='admin_acc.php' style='color: green;'>want to add?</a>";
	
}

?>

<head>
	<title>Profile Page</title>
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="style.css">
</head>

<body>
	<div class="bg">
	<center>
	<br>
	<div style="max-width:750px; background-color:rgba(255, 255, 255, 0.9); overflow: auto">
		<br>
		<a href="admin.php" style="color: green;">Back</a><br>
		<h3>Top 4 Students!</h3><div style="display: inline-block">
		<?php echo $scores; ?>
		<br>
		</div>
		<br>
	<br>
	</div>
</body>
