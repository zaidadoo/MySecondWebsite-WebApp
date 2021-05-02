<?php 

session_start();
include "db.php";


if(!isset($_SESSION['user'])){
	
	header("Location: index.php");
	exit();
	
}elseif(($_SESSION['admin']) == 1 ){
	
	header("Location: admin.php");
	exit();
	
}

if((!isset($_GET['id'])) OR  (!isset($_POST['a']))){
	header("Location: ../cw.php");
	exit();
} else {
	$id = $_GET['id'];
	$a = $_POST['a'];
}

$u = $_SESSION['user'];

$sql = "SELECT * FROM cw WHERE id='$id'";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_array($result)){
	if(($row['a']) == $a){
		$c = $row['correct'] . "$u<br>";
		$sql = "UPDATE cw SET correct='$c' WHERE id='$id'";
		$result = mysqli_query($conn, $sql);
		header("Location: ../cw.php?a=correct");
		exit();
	} else {
		$sql = "SELECT * FROM cw WHERE incorrect LIKE '%$u%' AND id='$id'";
		$result = mysqli_query($conn, $sql);
		$rows = mysqli_num_rows($result);
		if($rows < 1){
			$i = $row['incorrect'] . "$u<br>";
			$sql = "UPDATE cw SET incorrect='$i' WHERE id='$id'";
			$result = mysqli_query($conn, $sql);
		}
		header("Location: ../cw_q.php?id=$id&a=wrong");
		exit();
	}
}