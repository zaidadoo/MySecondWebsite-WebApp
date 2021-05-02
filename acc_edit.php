<?php 

session_start();

include "back/db.php";

$tables = "";

if(!isset($_SESSION['user'])){
	
	header("Location: index.php");
	exit();
	
}elseif(($_SESSION['admin']) == 0 ){
	
	header("Location: home.php");
	exit();
	
}

if(isset($_GET['id'])){$id = $_GET['id'];} else {$id = "";}

$sql = "SELECT * FROM user WHERE id='$id'";
$result = mysqli_query($conn, $sql);
$rows = mysqli_num_rows($result);
if($rows > 0){
	while($row = mysqli_fetch_array($result)){
		$n = $row['name'];
		$s = $row['score'];
		$u = $row['username'];
		$c = $row['class'];
		$e = $row['email'];
	}
} else {
	$n = "";
	$s = "";
	$u = "";
	$c = "";
	$e = "";
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
	
	if($_GET['a'] == "email"){ echo "<p style='color: white;'>Email invalid</p>"; }
}
?>
	<div style="max-width:750px; background-color:rgba(255, 255, 255, 0.9)">
	<br>
	<a href="admin_stats.php" style="color: green;">Back</a>
<div style="max-width: 75%;">
	<form action="back/edit.php" method="POST" enctype="multipart/form-data" name="form" id="form">
		<h3>Edit Account</h3>
		<input class="field" name="user" <?php echo "value='$u'"; ?> type="text" placeholder="USERNAME" required /><br><br>
		<input class="field" name="pass" type="password" placeholder="PASSWORD (KEEP BLANK IF NO NEED TO CHANGE)" /><br><br>
		<input class="field" name="name" <?php echo "value='$n'"; ?> type="text" placeholder="NAME" required /><br><br>
		<input class="field" name="email" <?php echo "value='$e'"; ?> type="text" placeholder="PARENT'S EMAIL" required /><br><br>
		<input class="field" name="class" <?php echo "value='$c'"; ?> type="text" placeholder="CLASS" required /><br><br>
		<input name="id" id="id" type="hidden" <?php echo "value='$id'"; ?> />
		<p>Profile Picture (keep blank if no need to change)</p>
        <input type="file" name="fileField" id="fileField" /><br><br>
		<input class="submit" type="submit" value="SUBMIT" />
	</form>
	<br>
</div>
	</div>
	</div>
</body>
