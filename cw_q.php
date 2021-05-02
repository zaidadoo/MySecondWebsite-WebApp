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
	header("Location: cw.php");
	exit();
} else {
	
	$id = $_GET['id'];
}

include "back/db.php";
$question = "";
$i = 0;

$sql = "SELECT * FROM cw WHERE id='$id'";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_array($result)){
	$question .= '<form action="back/cw_q.php?id='.$row['id'].'" method="POST"><h3>'.$row['question'].'</h3><input style="width: 75%" class="field" name="a" type="text" placeholder="ANSWER" required /><br><br>
	<input style="width: 75%" class="submit" type="submit" value="SUBMIT ANSWER" /></form>';
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
	<?php 
	if(isset($_GET['a'])){
		if($_GET['a'] == "wrong"){ echo "<p style='color: white;'>You answered the question incorrectly, try again!</p>"; } 
	}
	?>
	<div style="max-width:750px; background-color:rgba(255, 255, 255, 0.9)">
	<br>
	<?php echo $question; ?>
	<br><br>
	</div>
	<br>
	<a href="cw.php"><button style="border-style: none; padding: 15px; background-color: green; color: white;">Back</button></a><br><br>
	</div>
</body>
