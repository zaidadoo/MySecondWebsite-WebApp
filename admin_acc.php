<?php 

session_start();

include "back/db.php";

$id = $_SESSION['id'];
$tables = "";

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
	<?php if(isset($_GET['a'])){
	
	if($_GET['a'] == "already"){ echo "<p style='color: white;'>Username or Email already taken</p>"; }
	elseif($_GET['a'] == "success"){ echo "<p style='color: white;'>Added account successfully</p>"; }	
	elseif($_GET['a'] == "email"){ echo "<p style='color: white;'>Email invalid</p>"; }
	elseif($_GET['a'] == "empty"){ echo "<p style='color: white;'>Field(s) Empty</p>"; }
}
?>
	<div style="max-width:750px; background-color:rgba(255, 255, 255, 0.9)">
	<br>
	<a href="admin_stats.php" style="color: green;">Back</a>
<div style="max-width: 75%;">
	<form action="back/account.php" method="POST" enctype="multipart/form-data" name="form" id="form">
		<h3>Add Account</h3>
		<input class="field" name="user" type="text" placeholder="USERNAME" required /><br><br>
		<input class="field" name="pass" type="password" placeholder="PASSWORD" required /><br><br>
		<input class="field" name="name" type="text" placeholder="NAME" required /><br><br>
		<input class="field" name="email" type="text" placeholder="PARENT'S EMAIL" required /><br><br>
		<input class="field" name="class" type="text" placeholder="CLASS" required /><br><br>
		<p>Profile Picture</p>
        <input type="file" name="fileField" id="fileField" /><br><br>
		<input class="submit" type="submit" value="SUBMIT" />
	</form>
	<br>
</div>
	</div>
	</div>
</body>
