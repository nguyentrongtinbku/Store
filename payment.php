<?php
ob_start();
include "header.php";
if (isset($_SESSION["uid"])) {
    $sql = "SELECT * FROM cart WHERE user_id='$_SESSION[uid]'";
    $query = mysqli_query($con, $sql);
    $result = mysqli_fetch_array($query);
    $u_sql = "SELECT * FROM user_info WHERE user_id = '$_SESSION[uid]'";
    $u_result = mysqli_query($con, $u_sql);
    $row = mysqli_fetch_assoc($u_result);
    $f_name = $row['first_name'];
    $l_name = $row['last_name'];
    $email = $row['email'];
    $phone = $row['mobile'];
} else {
    header('Location: index.php');
    exit;
}
$location = null;
$name_err= $phone_err= $location_err=null;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (empty($f_name) || empty($l_name)) {
        echo "<script>alert('Vui lòng nhập tên.');</script>";
        $name_err="Lỗi";
    }
    if (strlen($phone) !== 10 || !ctype_digit($phone)) {
        echo "<script>alert('Vui lòng nhập số điện thoại hợp lệ.');</script>";
        $phone_err="Lỗi";
    }
    $Province = $_POST['Province'];
    $District = $_POST['District'];
    $Street = $_POST['Street'];
    $location = $Province . ', ' . $District . ', ' . $Street;
    if (empty($Province) || empty($District) || empty($Street)) {
        echo "<script>alert('Vui lòng nhập địa chỉ.');</script>";
        $location_err="Lỗi";
    }
    if(empty($name_err) && empty($phone_err) && empty($location_err)){
    echo "<script>
    alert('Xác nhận đơn hàng');
    // Redirect to another PHP page
    window.location.href = 'index.php';

                </script>";
    
    exit;
    }
}
?>

<div class="cartpage py-5" style="background-color: #F8852E;">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <div class="container px-5 pt-5" style="border-radius: 4px;background-color: white;">
            <div class="fs-4 mb-3 text-danger">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                    class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                    <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6" />
                </svg>
                Địa chỉ nhận hàng
            </div>
            <div class="row">
                <div class="col-6 col-sm-3">

                    Tỉnh/Thành phố:
                    <select name="Province">
                        <option value="HCM">Hồ Chí Minh</option>
                    </select>
                </div>
                <div class="col-6 col-sm-3">
                    Quận/huyện:
                    <select name="District">
                        <option value="Bình Chánh">Bình Chánh</option>
                        <option value="Bình Tân">Bình Tân</option>
                        <option value="Bình Thạnh">Bình Thạnh</option>
                        <option value="Cần Giờ">Cần Giờ</option>
                        <option value="Củ Chi">Củ Chi</option>
                        <option value="Gò Vấp">Gò Vấp</option>
                        <option value="Hóc Môn">Hóc Môn</option>
                        <option value="Nhà Bè">Nhà Bè</option>
                        <option value="Phú Nhuận">Phú Nhuận</option>
                        <option value="Quận 1">Quận 1</option>
                        <option value="Quận 3">Quận 3</option>
                        <option value="Quận 4">Quận 4</option>
                        <option value="Quận 5">Quận 5</option>
                        <option value="Quận 6">Quận 6</option>
                        <option value="Quận 7">Quận 7</option>
                        <option value="Quận 8">Quận 8</option>
                        <option value="Quận 10">Quận 10</option>
                        <option value="Quận 11">Quận 11</option>
                        <option value="Quận 12">Quận 12</option>
                        <option value="Tân Bình">Tân Bình</option>
                        <option value="Tân Phú">Tân Phú</option>
                        <option value="Thủ Đức">Thủ Đức</option>
                    </select>
                </div>
            </div>
            <div class="col-6 col-sm-3 mt-2">
                Địa chỉ cụ thể:
                <input type="text" name="Street">
            </div>
            <div class = "py-3 mb-3">
                <h1 class="text-danger">Thông tin người nhận</h1>
                <div class="mb-3">
                    <label for="pfirstname" class="form-label">Họ</label>
                    <input type="text" name="pfirstname" value="<?php echo $f_name ?>" class="form-control"
                        placeholder="Họ">
                </div>
                <div class="mb-3">
                    <label for="plastname" class="form-label">Tên</label>
                    <input type="text" name="plastname" value="<?php echo $l_name ?>" class="form-control"
                        placeholder="Tên">
                </div>
                <div class="mb-3">
                    <label for="pemail" class="form-label">Email</label>
                    <input type="email" name="pemail" value="<?php echo $email ?>" class="form-control"
                        placeholder="Email" readonly>
                </div>
                <div class="mb-3">
                    <label for="pphone" class="form-label">Số điện thoại</label>
                    <input type="text" name="pphone" value="<?php echo $phone ?>" class="form-control"
                        placeholder="Số điện thoại">
                </div>
            </div>


        </div>
        <div class="container px-5 py-5" style="border-radius: 10px;background-color: white;">
            <div class="row cart-top mb-2">
                <div class="col-md-3">
                    <strong>Sản phẩm</strong>
                </div>
                <div class="col-md-2">
                    <strong>Đơn Giá</strong>
                </div>
                <div class="col-md-3">
                    <strong>Số lượng</strong>
                </div>
                <div class="col-md-2">
                    <strong>Thành tiền</strong>
                </div>
                <div class="col-md-2">

                </div>
            </div>
            <?php
            if (isset($_SESSION["uid"]))
                $sum = 0;
            while ($row = mysqli_fetch_array($query)) {
                $p_id = $row['p_id'];
                $qty = $row['qty'];
                $product = "SELECT * FROM products WHERE product_id='$p_id'";
                $query_pro = mysqli_query($con, $product);
                $row_pro = mysqli_fetch_array($query_pro);
                $sum += $row_pro['product_price'] * $qty;
                echo '
                    <div class="row mb-2 pb-2 cart-top">
                    <div class="col-md-3">
                        <img style="height: 70px; width: auto" src="' . $row_pro['product_image'] . '">
                        <br><span>' . $row_pro['product_title'] . '</span>
                    </div>
                    <div class="col-md-2">
                        <span><strong>' . $row_pro['product_price'] . '$</strong></span>
                    </div>
                    <div class="col-md-3">
                        <span><strong>' . $qty . '</strong></span>
                    </div>
                    <div class="col-md-2"><strong>
                        ' . $qty * $row_pro['product_price'] . '$</strong>
                    </div>
                    
                    </div>
                    
                ';
            }
            ?>

            <div class="row">
                <div class="col-4">
                    Lời nhắn:
                    <input type="text" name="nhan">
                </div>
                <div class="col-8">
                    Phương thức thanh toán:
                    <select name="method">
                        <option value="cash">Thanh toán khi nhận hàng</option>
                        <option value="card">Thẻ tín dụng/Ghi nợ</option>
                    </select>
                </div>
            </div>

            <div class="container">
                <div class="col-md-4" style="float: right;">
                    <strong>Tổng cộng:<?php echo "  $sum " ?>$</strong>
                    <button type="submit" class="btn btn-success ms-3">Xác nhận thanh toán</a>
                </div>
            </div>


        </div>

    </form>
</div>

<?php
include 'footer.php';
?>