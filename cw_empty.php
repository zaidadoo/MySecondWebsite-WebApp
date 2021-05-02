<?php 

session_start();

$id = $_SESSION['id'];

if(!isset($_SESSION['user'])){
	
	header("Location: index.php");
	exit();
	
}elseif(($_SESSION['admin']) == 0 ){
	
	header("Location: home.php");
	exit();
	
}
?>

<head>
	<title>Admin Page</title>
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="style.css">
</head>

<body>
	<div class="bg">
	<br>
	<center>
		<div style="max-width:750px; background-color:rgba(255, 255, 255, 0.9)">
		<br>
			Are you sure you want to empty the question list?
			<p><a style="color: green" href="back/cw_empty.php">Yes</a> - <a style="color: green" href="admin_cw.php">No</a></p>
		<br>
		</div>
	</div>
</body>
