<?php
session_start();
include "db.php";
//Add product to cart
if (isset($_POST["addToCart"])) {
	$p_id = $_POST["proId"];
	if (isset($_SESSION["uid"])) {
		$user_id = $_SESSION["uid"];
		$sql = "SELECT * FROM cart WHERE p_id = '$p_id' AND user_id = '$user_id'";
		$run_query = mysqli_query($con, $sql);
		$count = mysqli_num_rows($run_query);
		if ($count > 0) {
			echo "ĐÃ THÊM VÀO GIỎ HÀNG";
		} else {
			$sql = "INSERT INTO `cart`
			(`p_id`, `user_id`, `qty`) 
			VALUES ('$p_id','$user_id','1')";
			if (mysqli_query($con, $sql)) {
				echo "ĐÃ THÊM VÀO GIỎ HÀNG";
			}
		}
	} else {
		echo "BẠN CẦN PHẢI ĐĂNG NHẬP";
	}
}
//Returns the product quantity in cart
if (isset($_POST["count_item"])) {
	if (isset($_SESSION["uid"])) {
		$sql = "SELECT COUNT(*) AS count_item FROM cart WHERE user_id = $_SESSION[uid]";
	}
	$query = mysqli_query($con, $sql);
	$row = mysqli_fetch_array($query);
	echo $row["count_item"];
	exit();
}

//Update profile
if (isset($_POST["pfirstname"])) {
	$uid = $_SESSION["uid"];
	$f_name = $_POST["pfirstname"];
	$l_name = $_POST["plastname"];
	$phone = $_POST["pphone"];
	$sql = "UPDATE user_info SET first_name ='$f_name', last_name='$l_name', mobile='$phone' WHERE user_id='$uid'";
	if ($con->query($sql) === TRUE) {
		echo '1';
	} else {
		echo "0";
	}
}
//Change password
if (isset($_POST["newpassword"])) {
	$uid = $_SESSION["uid"];
	$c_pass = $_POST["currentpassword"];
	$n_pass = $_POST["newpassword"];
	$user = "SELECT * FROM user_info WHERE user_id = '$uid'";
	$user_result = mysqli_query($con, $user);
	$user_row = mysqli_fetch_array($user_result);
	$pass = $user_row['password'];
	if ($c_pass == $pass) {
		$sql = "UPDATE user_info SET password ='$n_pass' WHERE user_id='$uid'";
		if ($con->query($sql) === TRUE)
			echo "CẬP NHẬT MẬT KHẨU THÀNH CÔNG";
	} else {
		echo "MẬT KHẨU HIỆN TẠI KHÔNG ĐÚNG";
	}
}
//login
if (isset($_POST["lemail"]) && isset($_POST["loginpassword"])) {
	$email = mysqli_real_escape_string($con, $_POST["lemail"]);
	$password = $_POST["loginpassword"];
	$sql = "SELECT * FROM user_info WHERE email = '$email' AND password = '$password'";
	$run_query = mysqli_query($con, $sql);
	$count = mysqli_num_rows($run_query);
	$row = mysqli_fetch_array($run_query);
	if ($count == 1) {
		$_SESSION["uid"] = $row["user_id"];
		$_SESSION["name"] = $row["first_name"];
		echo 1;
	} else {
		echo 0;
		exit();
	}
}
//register
if (isset($_POST["remail"])) {
	$f_name = $_POST["rfirstname"];
	$l_name = $_POST["rlastname"];
	$email = $_POST['remail'];
	$password = $_POST['rpassword'];
	$repassword = $_POST['repassword'];
	$mobile = $_POST['rphone'];
	$sql = "SELECT user_id FROM user_info WHERE email = '$email' LIMIT 1";
	$check_query = mysqli_query($con, $sql);
	$count_email = mysqli_num_rows($check_query);
	if ($count_email > 0) {
		echo -1;
		exit();
	} else if ($password != $repassword) {
		echo 0;
		exit();
	} else {
		$sql = "INSERT INTO `user_info` 
		(`user_id`, `first_name`, `last_name`, `email`, 
		`password`, `mobile`) 
		VALUES (NULL, '$f_name', '$l_name', '$email', 
		'$password', '$mobile')";
		$run_query = mysqli_query($con, $sql);
		$_SESSION["uid"] = mysqli_insert_id($con);
		$_SESSION["name"] = $f_name;
		echo 1;
	}
}
//Delete product from cart

if (isset($_POST["proId_delete"])) {
	if (isset($_SESSION["uid"])) {
		$user_id = $_SESSION["uid"];
		$p_id = $_POST['proId_delete'];
		$sql = "DELETE FROM cart WHERE user_id = '$user_id' AND p_id = '$p_id'";
		if (mysqli_query($con, $sql)) {
			echo 1;
		} else {
			echo 0;
		}
	}
}
