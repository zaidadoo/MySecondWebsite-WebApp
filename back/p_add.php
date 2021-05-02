<?php

include "db.php";

if(!isset($_POST['q'])){
	header("Location: ../p_add.php");
	exit();
} else {
	$q = $_POST['q'];
	$a1 = $_POST['a1'];
	$a2 = $_POST['a2'];
	$a3 = $_POST['a3'];
	$aa = $_POST['aa'];
	$cat = $_POST['cat'];
	
	if(empty($q) OR empty($a1) OR empty($a2) OR empty($a3) OR empty ($aa) OR empty ($cat)){
		header("Location: ../p_add.php?a=empty");
		exit();
	} else {
	$sql = "INSERT INTO practice (cat, question, a1, a2, a3, aa) VALUES ('$cat', '$q', '$a1', '$a2', '$a3', '$aa')";
	$result = mysqli_query($conn, $sql);
	header("Location: ../admin_p.php?a=success");
	exit();
}
}
