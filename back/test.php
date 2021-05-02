<?php

include "db.php";

$hash = password_hash("123", PASSWORD_DEFAULT);

echo $hash;

$sql = "INSERT INTO user (username, password, name, email, class, admin) VALUES ('musbah', '$hash', 'musbah', 'example@gmail.com', 'none', '1')";
$result = mysqli_query($conn, $sql);