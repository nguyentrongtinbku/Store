<?php
$current_page = basename($_SERVER['PHP_SELF']);
?>

<style>
    <?php if ($current_page == 'user.php') : ?>.user-container {
        background-color: #6c4703;
    }

    <?php elseif ($current_page == 'brand.php') : ?>.brand-container {
        background-color: #6c4703;
    }

    <?php elseif ($current_page == 'category.php') : ?>.category-container {
        background-color: #6c4703;
    }

    <?php elseif ($current_page == 'product.php') : ?>.product-container {
        background-color: #6c4703;
    }

    <?php endif;
    ?>.user-container:hover,
    .brand-container:hover,
    .category-container:hover,
    .product-container:hover {
        background-color: #6c4703;
        transition: background-color 0.3s ease;
    }
</style>

<div class="col-md-2 leftbar" style="background-color: orange;">
    <div class="text-center topbar my-3">
        <h2><i class="fa-solid fa-user-secret fa-3x"></i></h2>
    </div>
    <div class="part" style="font-size: 1.5em;">
        <div class="container user-container py-4">
            <a href="user.php"><i class="fa-solid fa-user "></i> Khách hàng</a>
        </div>
        <div class="container brand-container py-4">
            <a href="brand.php"><i class="fa-solid fa-bandage "></i> Thương hiệu</a>
        </div>
        <div class="container category-container py-4">
            <a href="category.php"><i class="fa-solid fa-bars "></i> Danh mục</a>
        </div>
        <div class="container product-container py-4">
            <a href="product.php"> <i class="fa-solid fa-store "></i> Sản phẩm</a>
        </div>
        <div class="container py-4">
            <a href="../logout.php"><i class="fa fa-sign-in" aria-hidden="true"></i> Đăng xuất</a>
        </div>
    </div>
</div>