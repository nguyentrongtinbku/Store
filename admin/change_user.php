<?php
include '../db.php';
if (isset($_POST["fname"])) {
	$uid = $_POST["uid"];
	$f_name = $_POST["fname"];
	$l_name = $_POST["lname"];
	$phone = $_POST["phone"];
	$email = $_POST["email"];
	$pass = $_POST["password"];
	$sql = "UPDATE user_info SET first_name ='$f_name', last_name='$l_name', mobile='$phone', email = '$email', password = '$pass' WHERE user_id='$uid'";
	if ($con->query($sql) === TRUE) {
		header('Location: user.php');
	} else {
		echo 0;
	}
}
