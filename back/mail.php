<?php

if(!isset($_POST['n'])){
	header("Location: forgot.php");
	exit();
} else {
	$msg = "".$_POST['n'].", class ".$_POST['c']." has forgotton their password, their parent's email is ".$_POST['e']."";

	$msg = wordwrap($msg,70);

	mail("musbah@example.com","Forgot Password",$msg);
}

echo $msg;