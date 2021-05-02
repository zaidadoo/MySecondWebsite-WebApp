<?php 

session_start();

if(!isset($_SESSION['user'])){
	
	header("Location: index.php");
	exit();
	
}elseif(($_SESSION['admin']) == 1 ){
	
	header("Location: admin.php");
	exit();
	
}

if(!isset($_GET['id'])){
	header("Location: hw.php");
	exit();
} else {
	
	$id = $_GET['id'];
}

include "back/db.php";
$question = "";
$i = 0;

$sql = "SELECT * FROM hw WHERE id='$id'";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_array($result)){
	$question .= '<h3>'.$row['question'].'</h3><a href="back/hw_q.php?id='.$row['id'].'&a='.$row['a_1'].'"><button style="border-style: none; padding: 15px; background-color: green; color: white;">'.$row['a_1'].'</button></a>&nbsp;<a href="back/hw_q.php?id='.$row['id'].'&a='.$row['a_2'].'"><button style="border-style: none; padding: 15px; background-color: green; color: white;">'.$row['a_2'].'</button></a>&nbsp;<a href="back/hw_q.php?id='.$row['id'].'&a='.$row['a_3'].'"><button style="border-style: none; padding: 15px; background-color: green; color: white;">'.$row['a_3'].'</button></a>&nbsp;';
}

?>

<head>
	<title>Home Work</title>
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="style.css">
</head>

<body>
	<div class="bg">
	<center>
	<br>
	<h1 style="color: white;">Home Work</h1>
	<div style="max-width:750px; background-color:rgba(255, 255, 255, 0.9)">
	<br>
	<?php echo $question; ?>
	<br><br>
	</div>
	<br>
	<a href="hw.php"><button style="border-style: none; padding: 15px; background-color: green; color: white;">Back</button></a><br><br>
	</div>
</body>
