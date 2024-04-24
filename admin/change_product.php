<?php
include '../db.php';
if (isset($_POST["pname"])) {
	$pid = $_POST["pid"];
	$name = $_POST["pname"];
	$brand = $_POST["brand"];
	$cate = $_POST["cate"];
	$price = $_POST["price"];
	$image = $_POST["image"];
	$sql = "UPDATE products
	SET product_cat ='$cate',product_brand ='$brand', product_title='$name',
	product_price='$price', product_image='$image'  WHERE product_id='$pid'";
	if ($con->query($sql) === TRUE) {
		header('Location: product.php');
	} else {
		echo 0;
	}
}
