<?php

include "db.php";

if(!isset($_POST['q'])){
	header("Location: ../hw_add.php");
	exit();
} else {
	$q = $_POST['q'];
	$aa = $_POST['aa'];
	
	if(empty($q) OR empty ($aa)){
		header("Location: ../cw_add.php?a=empty");
		exit();
	} else {
	$sql = "INSERT INTO cw (question, a) VALUES ('$q', '$aa')";
	$result = mysqli_query($conn, $sql);
	header("Location: ../admin_cw.php?a=success");
	exit();
}
}
