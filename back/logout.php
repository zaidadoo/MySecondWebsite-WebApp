<?php 

session_start();

if(!isset($_SESSION['user'])){
	header("Location: ../index.php");
	exit();
} else {
	session_unset();
	session_destroy();
	header("Location: ../index.php?index=logout");
	exit();
}