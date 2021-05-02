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

if(!isset($_GET['cat'])){
	header("Location: q.php");
	exit();
} else {
	$cat = $_GET['cat'];
}

include "back/db.php";
$u = $_SESSION['user'];
$sql = "SELECT * FROM practice WHERE correct NOT LIKE '%$u%' AND incorrect NOT LIKE '%$u%' AND cat='$cat'";
$result = mysqli_query($conn, $sql);
$rows = mysqli_num_rows($result);
if($rows < 1){
	$result = mysqli_query($conn, $sql);
	$questions = "<h2 style='color: white'>No practice questions within this category for you at the moment!</h2><br>";
} else {
	while($row = mysqli_fetch_array($result)){
		$i = $i + 1;
		$questions .= '<a href="p_q_c.php?id='.$row['id'].'"><button style="border-style: none; padding: 15px; background-color: green; color: white;">Question '.$i.'</button></a><br><br>';
	}
}

?>

<head>
	<title><?php echo $_GET['cat'];?></title>
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="style.css">
</head>

<body>
	<div class="bg">
	<center>
	<br>
	<h1 style="color: white;"><?php echo $_GET['cat'];?></h1>
	<?php echo $questions; ?>
	<a href="p.php"><button style="border-style: none; padding: 15px; background-color: green; color: white;">Back</button></a><br><br>
	</div>
</body>
