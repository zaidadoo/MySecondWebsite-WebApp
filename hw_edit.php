<?php 

session_start();

include "back/db.php";


if(!isset($_SESSION['user'])){
	
	header("Location: index.php");
	exit();
	
}elseif(($_SESSION['admin']) == 0 ){
	
	header("Location: home.php");
	exit();
	
}

if(isset($_GET['id'])){$id = $_GET['id'];} else {$id = "";}

$sql = "SELECT * FROM hw WHERE id='$id'";
$result = mysqli_query($conn, $sql);
$rows = mysqli_num_rows($result);
if($rows > 0){
	while($row = mysqli_fetch_array($result)){
		$q = $row['question'];
		$a1 = $row['a_1'];
		$a2 = $row['a_2'];
		$a3 = $row['a_3'];
		$aa = $row['a_a'];
	}
} else {
	$q = "";
	$a1 = "";
	$a2 = "";
	$a3 = "";
	$aa = "";
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
	<?php if(isset($_GET['a'])){
	
	if($_GET['a'] == "empty"){ echo "<p style='color: white;'>Field(s) Empty</p>"; }
}
?>
	<div style="max-width:750px; background-color:rgba(255, 255, 255, 0.9)">
	<br>
	<a href="admin_hw.php" style="color: green;">Back</a>
<div style="max-width: 75%;">
	<form action="back/hw_edit.php" method="POST">
		<h3>Add Question</h3>
		<input class="field" name="q" type="text" <?php echo 'value="'.$q.'"'; ?> placeholder="QUESTION" required /><br><br>
		<input class="field" name="a1" type="text" <?php echo 'value="'.$a1.'"'; ?> placeholder="FIRST ANSWER" required /><br><br>
		<input class="field" name="a2" type="text" <?php echo 'value="'.$a2.'"'; ?> placeholder="SECOND ANSWER" required /><br><br>
		<input class="field" name="a3" type="text" <?php echo 'value="'.$a3.'"'; ?> placeholder="THIRD ANSWER" required /><br><br>
		<input class="field" name="aa" type="text" <?php echo 'value="'.$aa.'"'; ?> placeholder="CORRECT ANSWER (make sure it matches one of the answers above)" required /><br><br>
		<input type="hidden" name="id" <?php echo 'value="'.$id.'"'; ?> />
		<input class="submit" type="submit" value="SUBMIT" />
	</form>
	<br>
</div>
	</div>
	</div>
</body>
