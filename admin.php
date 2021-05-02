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
	<center>
	<br>
	<div style="background-image:url('<?php echo "/profile/$id.jpg"; ?>'); border: 2px solid black; background-size: cover;" class="profile">
	</div>
	<p style="color:white" >Welcome <?php echo $_SESSION['name']; ?></p>
	<a href="admin_stats.php"><button style="border-style: none; padding: 15px; background-color: green; color: white;">Student Stats</button></a><br><br>		
	<a href="score.php"><button style="border-style: none; padding: 15px; background-color: green; color: white;">Score Board</button></a><br><br>
	<a href="admin_hw.php"><button style="border-style: none; padding: 15px; background-color: green; color: white;">Home Work</button></a><br><br>
	<a href="admin_cw.php"><button style="border-style: none; padding: 15px; background-color: green; color: white;">Class Work</button></a><br><br>
	<a href="admin_p.php"><button style="border-style: none; padding: 15px; background-color: green; color: white;">Practice<br> Questions</button></a><br><br>	
	<a href="back/logout.php"><button style="border-style: none; padding: 15px; background-color: green; color: white;">Log Out</button></a><br><br>
	</div>
</body>
