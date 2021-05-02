<?php

include "db.php";

if(!isset($_POST['user'])){
	header("Location: ../admin_stats.php");
	exit();
} else {
	$u = $_POST['user'];
	$p = $_POST['pass'];
	$n = $_POST['name'];
	$e = $_POST['email'];
	$c = $_POST['class'];
	if(empty($u) OR empty($p) OR empty($n) OR empty($e) OR empty($c)){
		header("Location: ../admin_acc.php?a=empty");
		exit();
	} else {
	if(filter_var($e, FILTER_VALIDATE_EMAIL)){
		$sql = "SELECT * FROM user WHERE username='$u' OR email='$e'";
		$check = mysqli_query($conn, $sql);
		$rows = mysqli_num_rows($check);
		if($rows > 0){
		header("Location: ../admin_acc.php?a=already");
		exit();
			} else {
		
				$hash = password_hash($p, PASSWORD_DEFAULT);
				$sql = "INSERT INTO user (username, password, name, email, class) VALUES ('$u', '$hash', '$n', '$e', '$c')";
				$result = mysqli_query($conn, $sql);
				$id = mysqli_insert_id($conn);
				echo $id;
				$img = "$id.jpg";
				move_uploaded_file( $_FILES['fileField']['tmp_name'], "../profile/$img");
				echo "<pre>"; 
				print_r($_FILES);
				header("Location: ../admin_acc.php?a=success");
				exit();
		}
	} else {
		header("Location: ../admin_acc.php?a=email");
		exit();
	}
}
}
