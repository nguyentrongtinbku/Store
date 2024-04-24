<?php
include '../db.php';
if (isset($_POST["brandname"])) {
	$brandid = $_POST["brandid"];
	$name = $_POST["brandname"];
	$sql = "UPDATE brands SET brand_title ='$name'WHERE brand_id='$brandid'";
	if ($con->query($sql) === TRUE) {
		header('Location: brand.php');
	} else {
		echo 0;
	}
}
