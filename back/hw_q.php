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

if(!isset($_GET['id'])){
	header("Location: ../hw.php");
	exit();
} else {
	$id = $_GET['id'];
	$a = $_GET['a'];
}

$u = $_SESSION['user'];

$sql = "SELECT * FROM hw WHERE id='$id'";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_array($result)){
	if(($row['a_a']) == $a){
		$c = $row['correct'] . "$u<br>";
		$sql = "UPDATE hw SET correct='$c' WHERE id='$id'";
		$result = mysqli_query($conn, $sql);
		header("Location: ../hw.php?a=correct");
		exit();
	} else {
		$i = $row['incorrect'] . "$u<br>";
		$sql = "UPDATE hw SET incorrect='$i' WHERE id='$id'";
		$result = mysqli_query($conn, $sql);
		header("Location: ../hw.php?a=wrong");
		exit();
	}
}