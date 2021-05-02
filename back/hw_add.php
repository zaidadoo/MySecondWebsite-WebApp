<?php

include "db.php";

if(!isset($_POST['q'])){
	header("Location: ../hw_add.php");
	exit();
} else {
	$q = $_POST['q'];
	$a1 = $_POST['a1'];
	$a2 = $_POST['a2'];
	$a3 = $_POST['a3'];
	$aa = $_POST['aa'];
	
	if(empty($q) OR empty($a1) OR empty($a2) OR empty($a3) OR empty ($aa)){
		header("Location: ../hw_add.php?a=empty");
		exit();
	} else {
	$sql = "INSERT INTO hw (question, a_1, a_2, a_3, a_a) VALUES ('$q', '$a1', '$a2', '$a3', '$aa')";
	$result = mysqli_query($conn, $sql);
	$sql = "UPDATE user SET hw='no'";
	$result = mysqli_query($conn, $sql);
	header("Location: ../admin_hw.php?a=success");
	exit();
}
}
