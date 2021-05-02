<?php 

session_start();

$id = $_SESSION['id'];

if(!isset($_SESSION['user'])){
	
	header("Location: index.php");
	exit();
	
}elseif(($_SESSION['admin']) == 1 ){
	
	header("Location: admin.php");
	exit();
	
}

$i = 0;
$questions = "";

include "back/db.php";
$u = $_SESSION['user'];
$sql = "SELECT * FROM hw WHERE correct NOT LIKE '%$u%' AND incorrect NOT LIKE '%$u%'";
$result = mysqli_query($conn, $sql);
$rows = mysqli_num_rows($result);
if($rows < 1){
	$sql = "UPDATE user SET hw='yes' WHERE id='$id'";
	$result = mysqli_query($conn, $sql);
	$questions = "<h2 style='color: white'>No homework for you at the moment!</h2><br>";
} else {
	while($row = mysqli_fetch_array($result)){
		$i = $i + 1;
		$questions .= '<a href="hw_q.php?id='.$row['id'].'"><button style="border-style: none; padding: 15px; background-color: green; color: white;">Question '.$i.'</button></a><br><br>';
	}
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
	<?php if(isset($_GET['a'])){
	
	if($_GET['a'] == "correct"){ echo "<p style='color: white;'>You answered the question correctly!</p>"; }
	elseif($_GET['a'] == "wrong"){ echo "<p style='color: white;'>You answered the question incorrectly, review with your teacher</p>"; }
}?>
	<h1 style="color: white;">Home Work</h1>
	<?php echo $questions; ?>
	<a href="home.php"><button style="border-style: none; padding: 15px; background-color: green; color: white;">Back</button></a><br><br>
	</div>
</body>
