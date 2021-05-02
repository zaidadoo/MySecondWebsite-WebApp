<?php 

session_start();

if(isset($_SESSION['user'])){
	
	header("Location: home.php");
	exit();
	
}

?>

<head>
<title>Login</title>
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
</head>

<body>
<div class="bg">
<center style="padding-top: 150px; z-index: 5">
<?php if(isset($_GET['index'])){
	
	if($_GET['index'] == "wrong"){ echo "<p style='color: white;'>Username or password is wrong</p>"; }
	elseif($_GET['index'] == "logout"){ echo "<p style='color: white;'>Logged out successfully</p>"; }
	
}
?>
<div class="form" style="max-width:750px; background-color:rgba(255, 255, 255, 0.9)">
	<form action="back/login.php" method="POST">
		<h3>Login</h3>
		<input class="field" name="user" type="text" placeholder="USERNAME" required /><br><br>
		<input class="field" name="pass" type="password" placeholder="PASSWORD" required /><br><br>
		<input class="submit" type="submit" value="LOGIN" />
		<p>forgot password? click <a href="forgot.php" class="link">here</a></p>
	</form>
</div>
</div>

</body>
