<?php
include "db.php";
session_start();
if (isset($_GET['p_id']) && isset($_GET['qty'])) {
    if (isset($_SESSION["uid"])) {
        $user_id = $_SESSION["uid"];
        $p_id = $_GET['p_id'];
        $qty = $_GET['qty'];
        $sql = "UPDATE cart SET qty = '$qty' WHERE user_id = '$user_id' AND p_id = '$p_id'";
        if (mysqli_query($con, $sql)) {
            echo "Cập nhật số lượng thành công";
            $BackToMyPage = $_SERVER['HTTP_REFERER'];
            if (!isset($BackToMyPage)) {
                header('Location: ' . $BackToMyPage);
                echo "<script type='text/javascript'>
                </script>";
            } else {
                echo "<script> location.href='cart.php'; </script>";
            }
        } else {
            echo "Lỗi: " . mysqli_error($conn);
        }
    }
}
