<?php

session_start();

include "db.php";


if(!isset($_SESSION['user'])){
	
	header("Location: index.php");
	exit();
	
}elseif(($_SESSION['admin']) == 0 ){
	
	header("Location: home.php");
	exit();
	
}

	$sql = "DELETE FROM cw";
	$result = mysqli_query($conn, $sql);
	header("Location: ../admin_cw.php?a=deleteall");
	exit();
	

