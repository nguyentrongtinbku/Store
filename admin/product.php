<?php
session_start();
if (!isset($_SESSION["uid"]) || $_SESSION["uid"] != 0)
    header('Location: login.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link type="text/css" rel="stylesheet" href="style/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Products</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <?php include 'leftbar.php'; ?>
            <div class="col-md-10 py-5 px-5 user" style="min-height: 100vh;">
                <div class="container px-5 py-5" style="border-radius: 10px;background-color: rgb(197, 162, 98);">
                    <a href="" data-bs-toggle="modal" data-bs-target="#addproduct" style="color: blue"><i class="fa-solid fa-circle-plus"></i> Thêm sản phẩm</a>
                    <div class="row cart-top mb-2 mt-3">
                        <div class="col-md-1">
                            <strong>ID</strong>
                        </div>
                        <div class="col-md-2">
                            <strong>Tên sản phẩm</strong>
                        </div>
                        <div class="col-md-2">
                            <strong>Thương hiệu</strong>
                        </div>
                        <div class="col-md-2">
                            <strong>Danh mục</strong>
                        </div>
                        <div class="col-md-1">
                            <strong>Giá</strong>
                        </div>
                        <div class="col-md-1">
                            <strong>Hình ảnh</strong>
                        </div>

                    </div>
                    <?php
                    include '../db.php';
                    $category = "SELECT * FROM products";
                    $query = mysqli_query($con, $category);
                    while ($row = mysqli_fetch_array($query)) {
                        $name = $row['product_title'];
                        $pid = $row['product_id'];
                        $price = $row['product_price'];
                        $image = $row['product_image'];
                        $cateid = $row['product_cat'];
                        $brandid = $row['product_brand'];
                        $cate = "SELECT * FROM categories WHERE cat_id = '$cateid'";
                        $brand = "SELECT * FROM brands WHERE brand_id = '$brandid'";
                        $query_cate = mysqli_query($con, $cate);
                        $query_brand = mysqli_query($con, $brand);
                        $row_cate = mysqli_fetch_array($query_cate);
                        $row_brand = mysqli_fetch_array($query_brand);
                        echo '
                            <form action="change_product.php" method="POST">
                            <div class="row mb-2 cart-top">
                                <div class="col-md-1">
                                    <input class="form-control" type = "text" name="pid" value="' . $pid . '" readonly>
                                </div>
                                <div class="col-md-2">
                                    <input type="text" name="pname" value="' . $name . '" class="form-control">
                                </div>
                                <div class="col-md-2">
                                    <select class="form-control" name ="brand">';
                        $allbrand = "SELECT * FROM brands";
                        $query_allbrand = mysqli_query($con, $allbrand);
                        while ($row_allbrand = mysqli_fetch_array($query_allbrand)) {
                            if ($row_allbrand['brand_id'] == $row_brand['brand_id'])
                                echo '<option value="' . $row_allbrand['brand_id'] . '" selected>' . $row_allbrand['brand_title'] . '</option>';
                            else
                                echo '<option value="' . $row_allbrand['brand_id'] . '">' . $row_allbrand['brand_title'] . '</option>';
                        }

                        echo  '</select>
                                </div>
                                <div class="col-md-2">
                                    <select class="form-control" name ="cate">';
                        $allcate = "SELECT * FROM categories";
                        $query_allcate = mysqli_query($con, $allcate);
                        while ($row_allcate = mysqli_fetch_array($query_allcate)) {
                            if ($row_allcate['cat_id'] == $row_cate['cat_id'])
                                echo '<option value="' . $row_allcate['cat_id'] . '" selected>' . $row_allcate['cat_title'] . '</option>';
                            else
                                echo '<option value="' . $row_allcate['cat_id'] . '">' . $row_allcate['cat_title'] . '</option>';
                        }

                        echo  '</select>
                                </div>
                                <div class="col-md-1">
                                    <input type="text" name="price" value="' . $price . '" class="form-control">
                                </div>
                                <div class="col-md-2">
                                    <input type="text" name="image" value="' . $image . '" class="form-control">
                                </div>
                                <div class="col-md-2">
                                    <button type="submit" class="btn btn-success"><i class="fa-solid fa-arrows-rotate"></i></button>
                                    <a pid=' . $pid . ' class="btn btn-danger delete-product"><i class="fa-solid fa-trash-can"></i></a>
                                </div>
                            </div>
                        </form>
                        ';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="addproduct" tabindex="-1" aria-labelledby="addproductlabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addproductlabel">Thêm sản phẩm</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <form id="addproduct-form">
                            <div class="mb-3">
                                <label for="pname"=class="form-label">Tên sản phẩm</label>
                                <input type="text" name="pname" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="brand"=class="form-label">Thương hiệu</label>
                                <select class="form-control" name="brand">';
                                    <?php
                                    $allbrand = "SELECT * FROM brands";
                                    $query_allbrand = mysqli_query($con, $allbrand);
                                    while ($row_allbrand = mysqli_fetch_array($query_allbrand)) {
                                        echo '<option value="' . $row_allbrand['brand_id'] . '">' . $row_allbrand['brand_title'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="cate"=class="form-label">Danh mục </label>
                                <select class="form-control" name="cate">
                                    <?php
                                    $allcate = "SELECT * FROM categories";
                                    $query_allcate = mysqli_query($con, $allcate);
                                    while ($row_allcate = mysqli_fetch_array($query_allcate)) {
                                        echo '<option value="' . $row_allcate['cat_id'] . '">' . $row_allcate['cat_title'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="price"=class="form-label">Giá </label>
                                <input type="text" name="price" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="image"=class="form-label">Hình ảnh</label>
                                <input type="text" name="image" class="form-control">
                            </div>
                            <button type="submit" id="addproduct-btn" class="btn btn-primary">Thêm</button>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js"></script>
    <script src="js/action.js"></script>
</body>

</html>