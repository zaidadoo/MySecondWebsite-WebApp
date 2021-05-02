<?php 

include "back/db.php";

session_start();

if(!isset($_GET['id'])){
	header("Location: home.php");
	exit();
} else {
	
	$id = $_GET['id'];
	$sql = "SELECT * FROM user WHERE id='$id'";
	$result = mysqli_query($conn, $sql);
	while($row = mysqli_fetch_array($result)){
		$n = $row['name'];
		$s = $row['score'];
		$u = $row['username'];
		$c = $row['class'];
		$m = $row['mistake'];
	}
	$sql = "SELECT * FROM user WHERE id='$id'";
	$result = mysqli_query($conn, $sql);
	while($row = mysqli_fetch_array($result)){
		$thinker = $row['thinker'];
		$knowledgeable = $row['knowledgeable'];
		$inquirer = $row['inquirer'];
		$open_minded = $row['open-minded'];
		$reflective = $row['reflective'];
		$communicator = $row['communicator'];
		$caring = $row['caring'];
		$principled = $row['principled'];
		$balanced = $row['balanced'];
		$risk_taker = $row['risk-taker'];
	}
	$array = array($thinker, $knowledgeable, $inquirer, $open_minded, $reflective, $communicator, $caring, $principled, $balanced, $risk_taker);
	if((max($array)) == $thinker){ $cat = "Thinker"; }
	elseif((max($array)) == $knowledgeable){ $cat = "Knowledgeable"; }
	elseif((max($array)) == $inquirer){ $cat = "Inquirer"; }
	elseif((max($array)) == $open_minded){ $cat = "Open Minded"; }
	elseif((max($array)) == $reflective){ $cat = "Reflective"; }
	elseif((max($array)) == $communicator){ $cat = "Communicator"; }
	elseif((max($array)) == $caring){ $cat = "Caring"; }
	elseif((max($array)) == $principled){ $cat = "Principled"; }
	elseif((max($array)) == $balanced){ $cat = "Balanced"; }
	elseif((max($array)) == $risk_taker){ $cat = "Risk Taker"; }
}

if(!isset($_SESSION['user'])){
	
	header("Location: index.php");
	exit();
	
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
	<div style="max-width:750px; background-color:rgba(255, 255, 255, 0.9)">
		<br>
		<a href="admin_stats.php" style="color: green;">Back</a><br>
		<h3>Welcome to <?php echo "$u's"; ?> Page!</h3>
		<div style="background-image:url('<?php echo "/profile/$id.jpg"; ?>'); border: 2px solid black; background-size: cover;" class="profile">
		</div>
		<p>Name: <?php echo "$n"; ?></p>
		<p>Class: <?php echo "$c"; ?></p>
		<p>Score: <?php echo "$s"; ?></p>
		<p>No. of Mistakes: <?php echo "$m"; ?></p>
		<p>Most Played Category: <?php echo "$cat"; ?></p>
		<?php if(($_SESSION['admin']) == 1){
			echo '<a href="acc_edit.php?id='.$id.'" style="color: green;">Edit</a><br><a href="acc_delete.php?id='.$id.'" style="color: green;">Delete</a><br>';
		}?>
	<br>
	</div>
</body>
