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
	header("Location: ../p.php");
	exit();
} else {
	$id = $_GET['id'];
	$a = $_GET['a'];
}

$u = $_SESSION['user'];

$sql = "SELECT * FROM practice WHERE id='$id'";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_array($result)){
	$cat = $row['cat'];
	if(($row['aa']) == $a){
		$c = $row['correct'] . "$u<br>";
		$sql = "UPDATE practice SET correct='$c' WHERE id='$id'";
		$result = mysqli_query($conn, $sql);
		$sql = "UPDATE user SET score = score + 2 WHERE username='$u'";
		$result = mysqli_query($conn, $sql);
		$sql = "UPDATE user SET $cat = $cat + 1 WHERE username='$u'";
		$result = mysqli_query($conn, $sql);
		header("Location: ../p.php?a=correct");
		exit();
	} else {
		$i = $row['incorrect'] . "$u<br>";
		$sql = "UPDATE practice SET incorrect='$i' WHERE id='$id'";
		$result = mysqli_query($conn, $sql);
		$sql = "UPDATE user SET mistake = mistake + 1 WHERE username='$u'";
		$result = mysqli_query($conn, $sql);
		header("Location: ../p.php?a=wrong");
		exit();
	}
}