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
	header("Location: p.php");
	exit();
} else {
	
	$id = $_GET['id'];
}

include "back/db.php";
$question = "";
$i = 0;

$sql = "SELECT * FROM practice WHERE id='$id'";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_array($result)){
	$question .= '<h3>'.$row['question'].'</h3><a href="back/p_q.php?id='.$row['id'].'&a='.$row['a1'].'"><button style="border-style: none; padding: 15px; background-color: green; color: white;">'.$row['a1'].'</button></a>&nbsp;<a href="back/p_q.php?id='.$row['id'].'&a='.$row['a2'].'"><button style="border-style: none; padding: 15px; background-color: green; color: white;">'.$row['a2'].'</button></a>&nbsp;<a href="back/p_q.php?id='.$row['id'].'&a='.$row['a3'].'"><button style="border-style: none; padding: 15px; background-color: green; color: white;">'.$row['a3'].'</button></a>&nbsp;';
}

?>

<head>
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
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
	<a href="p.php"><button style="border-style: none; padding: 15px; background-color: green; color: white;">Back</button></a><br><br>
	</div>
</body>
