<?php
session_start();
include "../db.php";

//login
if (isset($_POST["email"]) && isset($_POST["loginpassword"])) {
    $email = mysqli_real_escape_string($con, $_POST["email"]);
    $password = md5($_POST["loginpassword"]);
    $sql = "SELECT * FROM admin_info WHERE admin_email = '$email' AND admin_password = '$password'";
    $run_query = mysqli_query($con, $sql);
    $count = mysqli_num_rows($run_query);
    if ($count == 1) {
        $row = mysqli_fetch_array($run_query);
        $_SESSION["uid"] = $row["admin_id"];
        $_SESSION["name"] = $row["admin_name"];
        echo 1;
        exit;
    } else {
        echo 0;
        exit();
    }
}
//Delete user
if (isset($_POST["user_delete"])) {
    $uid = $_POST["user_delete"];
    $sql = "DELETE FROM user_info WHERE user_id = '$uid'";
    if (mysqli_query($con, $sql)) {
        $sql = "DELETE FROM cart WHERE user_id = '$uid'";
        if (mysqli_query($con, $sql))
            echo 1;
    } else {
        echo 0;
    }
}
//Add user
if (isset($_POST["afirstname"])) {
    $f_name = $_POST["afirstname"];
    $l_name = $_POST["alastname"];
    $email = $_POST['aemail'];
    $password = $_POST['apassword'];
    $mobile = $_POST['aphone'];
    $sql = "SELECT user_id FROM user_info WHERE email = '$email' LIMIT 1";
    $check_query = mysqli_query($con, $sql);
    $count_email = mysqli_num_rows($check_query);
    if ($count_email > 0) {
        echo 0;
        exit();
    } else {
        $sql = "INSERT INTO `user_info` 
		(`user_id`, `first_name`, `last_name`, `email`, 
		`password`, `mobile`) 
		VALUES (NULL, '$f_name', '$l_name', '$email', 
		'$password', '$mobile')";
        $run_query = mysqli_query($con, $sql);
        echo 1;
    }
}
//Delete brand
if (isset($_POST["brand_delete"])) {
    $brandid = $_POST["brand_delete"];
    $sql = "DELETE FROM brands WHERE brand_id = '$brandid'";
    if (mysqli_query($con, $sql)) {
        $sql = "DELETE FROM products WHERE product_brand = '$brandid'";
        if (mysqli_query($con, $sql))
            echo 1;
    } else {
        echo 0;
    }
}
//Add brand
if (isset($_POST["brandname"])) {
    $name = $_POST["brandname"];
    $sql = "INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES (NULL, '$name')";
    $run_query = mysqli_query($con, $sql);
    echo 1;
}

//Delete category
if (isset($_POST["cate_delete"])) {
    $cateid = $_POST["cate_delete"];
    $sql = "DELETE FROM categories WHERE cat_id = '$cateid'";
    if (mysqli_query($con, $sql)) {
        $sql = "DELETE FROM products WHERE product_cat = '$cateid'";
        if (mysqli_query($con, $sql))
            echo 1;
    } else {
        echo 0;
    }
}
//Add category
if (isset($_POST["catename"])) {
    $name = $_POST["catename"];
    $sql = "INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES (NULL, '$name')";
    $run_query = mysqli_query($con, $sql);
    echo 1;
}

//Delete product
if (isset($_POST["delete_product"])) {
    $pid = $_POST["delete_product"];
    $sql = "DELETE FROM products WHERE product_id = '$pid'";
    if (mysqli_query($con, $sql)) {
        $sql = "DELETE FROM cart WHERE p_id = '$pid'";
        if (mysqli_query($con, $sql))
            echo 1;
    } else {
        echo 0;
    }
}
//Add product
if (isset($_POST["pname"])) {
    $name = $_POST["pname"];
    $brand = $_POST["brand"];
    $cate = $_POST["cate"];
    $price = $_POST["price"];
    $image = $_POST["image"];
    $sql = "INSERT 
    INTO `products` (`product_id`, `product_title`, `product_cat`, `product_brand`, `product_price`, `product_image`)
     VALUES (NULL, '$name','$cate', '$brand', '$price', '$image')";
    $run_query = mysqli_query($con, $sql);
    echo 1;
}
