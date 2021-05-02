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
	$id = $_POST['id'];
	if(filter_var($e, FILTER_VALIDATE_EMAIL)){
		$sql = "SELECT * FROM user WHERE (username='$u' OR email='$e') AND id<>'$id'";
		$check = mysqli_query($conn, $sql);
		$rows = mysqli_num_rows($check);
		if($rows > 0){
		echo "email or username already in use, <a href='../acc_edit.php?id=$id'>go back?</a>";
			} else {
				if(empty($p)){
					$sql = "UPDATE user SET username='$u', email='$e', name='$n', class='$c' WHERE id='$id'";
					$result = mysqli_query($conn, $sql);
					if($_FILES['fileField']['tmp_name'] != ""){
						echo $id;
						$img = "$id.jpg";
						move_uploaded_file( $_FILES['fileField']['tmp_name'], "../profile/$img");
						echo "<pre>"; 
						print_r($_FILES);
						header("Location: ../admin_stats.php?a=success");
						exit();
					} else {
						header("Location: ../admin_stats.php?a=success");
						exit();
					}
					
				} else {
					$hash = password_hash($p, PASSWORD_DEFAULT);
					$sql = "UPDATE user SET username='$u', email='$e', name='$n', class='$c', password='$hash' WHERE id='$id'";
					$result = mysqli_query($conn, $sql);
					if($_FILES['fileField']['tmp_name'] != ""){
						echo $id;
						$img = "$id.jpg";
						move_uploaded_file( $_FILES['fileField']['tmp_name'], "../profile/$img");
						echo "<pre>"; 
						print_r($_FILES);
						header("Location: ../admin_stats.php?a=success");
						exit();
					} else {
						header("Location: ../admin_stats.php?a=success");
						exit();
					}
				}
				
				
			}
	} else {
		header("Location: ../admin_acc.php?a=email");
		exit();
	}
	
}
