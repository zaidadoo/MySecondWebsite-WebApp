<?php 

session_start();

if(isset($_SESSION['user'])){
	
	header("Location: home.php");
	exit();
	
}

?>

<head>
<title>Forgot Password?</title>
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
</head>

<body>
<div class="bg">
<center style="padding-top: 150px; z-index: 5">
<div class="form" style="max-width:750px; background-color:rgba(255, 255, 255, 0.9)">
	<form action="/back/mail.php" method="POST">
		<h3>Forgot Password</h3>
		<input class="field" type="text" name="n" placeholder="NAME" required /><br><br>
		<input class="field" type="text" name="c" placeholder="CLASS" required /><br><br>
		<input class="field" type="text" name="e" placeholder="PARENT'S EMAIL"required /><br><br>
		<input class="submit" type="submit" value="SEND" />
		<p>log in? click <a href="index.php" class="link">here</a></p>
	</form>
</div>
</div>

</body>
