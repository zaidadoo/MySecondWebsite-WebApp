<?php

include "db.php";

if(!isset($_POST['q'])){
	header("Location: ../edit_p.php");
	exit();
} else {
	$cat = $_POST['cat'];
	$q = $_POST['q'];
	$a1 = $_POST['a1'];
	$a2 = $_POST['a2'];
	$a3 = $_POST['a3'];
	$aa = $_POST['aa'];
	$id = $_POST['id'];
	
	if(empty($q) OR empty($a1) OR empty($a2) OR empty($a3) OR empty ($aa) OR empty ($cat)){
		header("Location: ../admin_p.php?a=empty");
		exit();
	} else {
	$sql = "UPDATE practice SET cat='$cat', question='$q', a1='$a1', a2='$a2', a3='$a3', aa='$aa' WHERE id='$id'";
	$result = mysqli_query($conn, $sql);
	header("Location: ../admin_p.php?a=edit");
	exit();
}
}
