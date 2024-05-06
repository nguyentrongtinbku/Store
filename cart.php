<?php
ob_start();
include "header.php";
if (isset($_SESSION["uid"])) {
    $sql = "SELECT * FROM cart WHERE user_id='$_SESSION[uid]'";
    $query = mysqli_query($con, $sql);
} else {
    header('Location: index.php');
    exit;
}
?>
<div class="cartpage py-5" style="background-color: #F8852E;">
    <div class="container px-5 pt-5" style="border-radius: 10px;background-color: white;">
        <div class="row cart-top mb-2">
            <div class="col-3 col-sm-3">
                <strong>Sản phẩm</strong>
            </div>
            <div class="col-2 col-sm-2">
                <strong>Giá</strong>
            </div>
            <div class="col-3 col-sm-3">
                <strong>Số lượng</strong>
            </div>
            <div class="col-3 col-sm-2">
                <strong>Tổng giá tiền</strong>
            </div>
            <div class="col-2 col-sm-2">

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
                    <div class="col-3 col-sm-3">
                        <img style="height: 70px; width: auto" src="' . $row_pro['product_image'] . '">
                        <br><span>' . $row_pro['product_title'] . '</span>
                    </div>
                    <div class="col-2 col-sm-2">
                        <span><strong>' . $row_pro['product_price'] . '$</strong></span>
                    </div>
                    <div class="col-3 col-sm-3">
                        <form action="qty_cart.php" method="GET">
                            <input type="number" name="qty" class="form-control mb-2" value="' . $qty . '">
                            <input type="hidden" name="p_id" value="' . $row_pro['product_id'] . '">
                            <button type="submit" class="btn btn-success"><i class="fa-solid fa-arrows-rotate"></i></button>
                        </form>
                    </div>
                    <div class="col-2 col-sm-2"><strong>
                        ' . $qty * $row_pro['product_price'] . '$</strong>
                    </div>
                    <div class="col-2 col-sm-2">
                        <a p_id=' . $row_pro['product_id'] . ' class="btn btn-danger delete-btn"><i class="fa-solid fa-trash-can"></i></a>
                    </div> 
                    </div>
                    
                ';
        }
        echo '<div class="container mb-5"><div class="col-md-4" style="float: right;">
                    <strong>Tổng cộng: ' . $sum . '$</strong>
                    <a href="payment.php" class="btn btn-success ms-3">Thanh toán</a>
                </div></div>';
        ?>

    </div>
</div>
<?php
include "footer.php";
?>