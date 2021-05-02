<?php 

include "db.php";

session_start();

if(!isset($_POST['user'])){
	header("Location: ../index.php");
	exit();
} else {
	$u = mysqli_real_escape_string($conn, ($_POST['user']));
	$p = mysqli_real_escape_string($conn, ($_POST['pass']));
	$sql = "SELECT * FROM user WHERE username='$u'";
	$check = mysqli_query($conn, $sql);
	$rows = mysqli_num_rows($check);
	if($rows > 0){
		while($row = mysqli_fetch_array($check)){
			$hash = $row['password'];
			$user = $row['username'];
			$id = $row['id'];
			$name = $row['name'];
			$email = $row['email'];
			$score = $row['score'];
			$class = $row['class'];
			$admin = $row['admin'];
			if(password_verify($p, $hash)){
				$_SESSION['user'] = $user;
				$_SESSION['pass'] = $pass;
				$_SESSION['id'] = $id;
				$_SESSION['name'] = $name;
				$_SESSION['email'] = $email;
				$_SESSION['score'] = $score;
				$_SESSION['class'] = $class;
				$_SESSION['admin'] = $admin;
				header("Location: ../home.php");
				exit();
			} else {
				header("Location: ../index.php?index=wrong");
				exit();
			}
		}
	} else {
		header("Location: ../index.php?index=wrong");
		exit();
	}
}