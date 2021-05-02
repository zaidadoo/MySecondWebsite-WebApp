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

$sql = "SELECT * FROM cw";
$ex = mysqli_query($conn, $sql);
$rows = mysqli_num_rows($ex);

if($rows > 0){
	while($row = mysqli_fetch_array($ex)){
		$tables .= "<tr>
    <td style='border: 1px solid black'>".$row['question']."</td>
    <td style='border: 1px solid black'>".$row['correct']."</td>
    <td style='border: 1px solid black'>".$row['incorrect']."</td>
    <td style='border: 1px solid black'><a href='cw_del.php?id=".$row['id']."' style='color: green'>Delete</a>
	<br><a href='cw_edit.php?id=".$row['id']."' style='color: green'>Edit</a></td>";
	}
} else {
	
	$tables = "No questions found, <a href='cw_add.php' style='color: green;'>want to add?</a>";
	
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
	
	if($_GET['a'] == "success"){ echo "<p style='color: white;'>Added question successfully</p>"; }
	elseif($_GET['a'] == "deleteall"){ echo "<p style='color: white;'>Emptied question list</p>"; }
	elseif($_GET['a'] == "delete"){ echo "<p style='color: white;'>Deleted question successfully</p>"; }
	elseif($_GET['a'] == "edit"){ echo "<p style='color: white;'>Edit question successfully</p>"; }
}?>
	<div style="max-width:750px; background-color:rgba(255, 255, 255, 0.9)">
	<br>
	<a href="admin.php" style="color: green;">Back</a><br>
	<a href="cw_add.php" style="color: green;">Add Question</a>
	<table style="padding: 5px; border: 1px solid black">
  <tr>
    <th style="border: 1px solid black; background: green; color: white">Question</th>	
    <th style="border: 1px solid black; background: green; color: white">Solved Correctly</th> 
    <th style="border: 1px solid black; background: green; color: white">Got a mistake</th>
    <th style="border: 1px solid black; background: green; color: white">Modify</th>
  </tr>
  <br>
  <?php echo $tables; ?>
</table>
<br>
<a href="cw_empty.php" style="color: green;">Empty List</a>
<br><br>
	</div>
	</div>
</body>
