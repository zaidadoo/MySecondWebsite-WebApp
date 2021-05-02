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
	
	if($_GET['a'] == "empty"){ echo "<p style='color: white;'>Field(s) Empty</p>"; }
}
?>
	<div style="max-width:750px; background-color:rgba(255, 255, 255, 0.9)">
	<br>
	<a href="admin_p.php" style="color: green;">Back</a>
<div style="max-width: 75%;">
	<form action="back/p_add.php" method="POST">
		<h3>Add Question</h3>
		Category:&nbsp;
		<select name="cat" style="padding: 10px;" required>
		<option selected disabled>Choose one</option>
		<option value="thinker">Thinker</option>
		<option value="knowledgeable">Knowledgeable</option>
		<option value="inquirer">Inquirer</option>
		<option value="open-minded">Open Minded</option>
		<option value="reflective">Reflective</option>
		<option value="communicator">Communicator</option>
		<option value="caring">Caring</option>
		<option value="principled">Principled</option>
		<option value="balanced">Balanced</option>
		<option value="risk-taker">Risk Taker</option>
		</select><br><br>
		<input class="field" name="q" type="text" placeholder="QUESTION" required /><br><br>
		<input class="field" name="a1" type="text" placeholder="FIRST ANSWER" required /><br><br>
		<input class="field" name="a2" type="text" placeholder="SECOND ANSWER" required /><br><br>
		<input class="field" name="a3" type="text" placeholder="THIRD ANSWER" required /><br><br>
		<input class="field" name="aa" type="text" placeholder="CORRECT ANSWER (make sure it matches one of the answers above)" required /><br><br>
		<input class="submit" type="submit" value="SUBMIT" />
	</form>
	<br>
</div>
	</div>
	</div>
</body>
