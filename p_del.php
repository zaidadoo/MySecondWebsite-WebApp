<?php 

session_start();

if(!isset($_SESSION['user'])){
	
	header("Location: index.php");
	exit();
	
}elseif(($_SESSION['admin']) == 0 ){
	
	header("Location: home.php");
	exit();
	
}

if(!isset($_GET['id'])){
	header("Location: admin_p.php");
	exit();
} else {
	$id = $_GET['id'];
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
			Are you sure you want to delete this question?
			<p><a style="color: green" href="back/p_del.php?id=<?php echo $id; ?>">Yes</a> - <a style="color: green" href="admin_p.php">No</a></p>
		<br>
		</div>
	</div>
</body>
