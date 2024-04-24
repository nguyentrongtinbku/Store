<?php
include 'header.php';
include 'db.php';
if ($_GET['search_query']) {
    $search_query = $_GET['search_query'];
    $sql = "SELECT * FROM products WHERE product_title LIKE '%$search_query%'";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div class="container">';
            echo '<div class="row my-3">';
            for ($i = 1; $i <= 3; $i++) {
                $pro_id    = $row['product_id'];
                $pro_cat   = $row['product_cat'];
                $pro_brand = $row['product_brand'];
                $pro_title = $row['product_title'];
                $pro_price = $row['product_price'];
                $pro_image = $row['product_image'];
                $cate = "SELECT * FROM categories WHERE cat_id = '$pro_cat'";
                $cate_result = mysqli_query($con, $cate);
                $category = mysqli_fetch_assoc($cate_result);
                $category_name = $category['cat_title'];
                echo '
                <div class="col-md-4">
                    <div class="card text-center py-2 cardcustom style="width: 18rem;">
                    <a href="product.php?p=' . $pro_id . '"><img style="height: 180px; width: auto;" src="' . $pro_image . '" class="card-img-top" alt="card"></a>
                        <div class="card-body">
                            <p class="product-category">' . $category_name . '</p>
                            <h5 class="card-title"><a href="product.php?p=' . $pro_id . '"><span class="truncate">' . $pro_title . '</span></a></h5>
                            <h5 style="color: red;">' . $pro_price . '$</h5>
                            <button pid="' . $pro_id . '" id="product" class="add-to-cart-btn btn btn-danger" href="#"><i class="fa-solid fa-cart-shopping"></i> Thêm vào giỏ hàng</button>
                        </div>
                    </div>
                </div>
                ';
                if ($i != 3) {
                    if (!$row = mysqli_fetch_assoc($result))
                        break;
                }
            }
            echo '</div>';
            echo '</div>';
        }
    } else {
        echo '<div class="container" style="height: 500px;">Không tìm thấy sản phẩm nào phù hợp.</div>';
    }
}
?>
<?php
include 'footer.php';
?>