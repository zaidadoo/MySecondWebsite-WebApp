<?php

include "db.php";

if(!isset($_POST['q'])){
	header("Location: ../hw_edit.php");
	exit();
} else {
	$q = $_POST['q'];
	$a1 = $_POST['a1'];
	$a2 = $_POST['a2'];
	$a3 = $_POST['a3'];
	$aa = $_POST['aa'];
	$id = $_POST['id'];
	
	if(empty($q) OR empty($a1) OR empty($a2) OR empty($a3) OR empty ($aa)){
		header("Location: ../hw_edit.php?a=empty");
		exit();
	} else {
	$sql = "UPDATE hw SET question='$q', a_1='$a1', a_2='$a2', a_3='$a3', a_a='$aa' WHERE id='$id'";
	$result = mysqli_query($conn, $sql);
	header("Location: ../admin_hw.php?a=edit");
	exit();
}
}
