<?php

session_start();

include "db.php";

$id = $_SESSION['id'];

if(!isset($_SESSION['user'])){
	
	header("Location: index.php");
	exit();
	
}elseif(($_SESSION['admin']) == 0 ){
	
	header("Location: home.php");
	exit();
	
}

if(!isset($_GET['id'])){
	header("Location: ../admin.php");
	exit();
} else {
	$id = $_GET['id'];
	$sql = "DELETE FROM user WHERE id='$id'";
	$result = mysqli_query($conn, $sql);
	header("Location: ../admin_stats.php?a=delete");
	exit();
}
