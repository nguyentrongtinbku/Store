<?php
include '../db.php';
if (isset($_POST["catename"])) {
	$cateid = $_POST["cateid"];
	$name = $_POST["catename"];
	$sql = "UPDATE categories SET cat_title ='$name' WHERE cat_id='$cateid'";
	if ($con->query($sql) === TRUE) {
		header('Location: category.php');
	} else {
		echo 0;
	}
}
