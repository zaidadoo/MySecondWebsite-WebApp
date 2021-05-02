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

$sql = "SELECT * FROM user WHERE admin=0 ORDER BY score DESC";
$ex = mysqli_query($conn, $sql);
$rows = mysqli_num_rows($ex);

if($rows > 0){
	while($row = mysqli_fetch_array($ex)){
		$tables .= "<tr>
    <td style='border: 1px solid black'>".$row['id']."</td>
    <td style='border: 1px solid black'><a style='color: green;' href='profile.php?id=".$row['id']."'>".$row['username']."</a></td>
    <td style='border: 1px solid black'>".$row['name']."</td>
	<td style='border: 1px solid black'>".$row['email']."</td>
	<td style='border: 1px solid black'>".$row['score']."</td>
	<td style='border: 1px solid black'>".$row['cw']."</td>
	<td style='border: 1px solid black'>".$row['hw']."</td>
	<td style='border: 1px solid black'>".$row['class']."</td>
  </tr>";
	}
} else {
	
	$tables = "No students found, <a href='admin_acc.php' style='color: green;'>want to add?</a>";
	
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
	
	if($_GET['a'] == "success"){ echo "<p style='color: white;'>Edited account successfully</p>"; }	
	elseif($_GET['a'] == "delete"){ echo "<p style='color: white;'>Deleted account successfully</p>"; }
}?>
	<div style="max-width:750px; background-color:rgba(255, 255, 255, 0.9); overflow: scroll;">
	<br>
	<a href="admin.php" style="color: green;">Back</a><br>
	<a href="admin_acc.php" style="color: green;">Add Student</a>
	<table style="padding: 5px; border: 1px solid black">
  <tr>
    <th style="border: 1px solid black; background: green; color: white">ID</th>	
    <th style="border: 1px solid black; background: green; color: white">Username</th> 
    <th style="border: 1px solid black; background: green; color: white">Name</th>
	<th style="border: 1px solid black; background: green; color: white">Parent Email</th>
	<th style="border: 1px solid black; background: green; color: white">Score</th>
	<th style="border: 1px solid black; background: green; color: white">CW</th>
	<th style="border: 1px solid black; background: green; color: white">HW</th>
	<th style="border: 1px solid black; background: green; color: white">Class</th>
  </tr>
  <br>
  <?php echo $tables; ?>
</table>
<br>
	</div>
	</div>
</body>
